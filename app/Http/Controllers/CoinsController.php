<?php

namespace App\Http\Controllers;

use App\Coin;
use App\Http\Requests\Payment\PaymentInfoRequest;
use App\Models\OneTimeToken;
use App\Models\Transaction;
use App\Skin;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Str;
use Stripe;
use Illuminate\Http\Request;

class CoinsController extends Controller
{
    public function index()
    {
        $coins = Coin::all();
        return view('player.shop.coin.index', compact('coins'));
    }

    /**
     * @param PaymentInfoRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function paymentInfo(PaymentInfoRequest $request)
    {
        $sessionID = Session::get('payment_session_id');

        $coin  = Coin::query()->findOrFail($request->input('coin'));
        $token = OneTimeToken::query()
            ->where('user_id', '=', Auth::id())
            ->where('created_at', '>=', Carbon::now()->subMinutes(30))
            ->first();

        if(empty($token)) {
            OneTimeToken::query()->where('user_id', '=', Auth::id())->delete();
            $responseData = ['headline' => 'Payment Failed', 'message' => 'Token Expired!', 'success' => false];
        } else {
            $tokenID = $token->token;
            $token->delete();
            if(!empty($sessionID)) {
                if($sessionID === $tokenID) {
                    $transaction = Transaction::query()->create([
                        'receiver_id' => Auth::id(),
                        'coin_id' => $request->input('coin'),
                        'status'  => $request->input('status'),
                        'type'    => $request->input('type')
                    ]);

                    if($transaction) {
                        User::query()
                            ->where('id', '=', Auth::id())
                            ->update(['coins' => DB::raw("coins + {$coin->coin}" )]);
                    }

                    $responseData = ['headline' => 'Payment Success', 'message' => 'Congratulations!', 'success' => true];
                } else {
                    $responseData = ['headline' => 'Payment Failed', 'message' => 'Token Invalid!', 'success' => false];
                }
            } else {
                $responseData = ['headline' => 'Payment Failed.', 'message' => 'Token Not provided!', 'success' => false];
            }
        }

            return redirect()->route('purchase-info', $responseData + ['coin' => $coin]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function purchaseInfo(Request $request)
    {
        if(!Session::has('payment_session_id'))
            return redirect()->to('404');

        Session::remove('payment_session_id');
        $data = $request->all();

        $data['coin'] = Coin::query()->findOrFail($data['coin']);
        if($request->has(['coin', 'success', 'message', 'headline'])) {
            return view('player.shop.coin.confirm', $data);
        }

        return redirect()->to('404');
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws Stripe\Exception\ApiErrorException
     */
    public function payment($id)
    {
        $coin = Coin::query()
            ->findOrFail($id);

        Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'name'        => 'Coin',
                    'description' => "get {$coin->coin} coin",
                    'amount'      => $coin->price * 100,
                    'currency'    => 'usd',
                    'quantity'    => 1,
                ]
            ],
            'success_url' => route('payment-info', ['coin' => $coin->id, 'status' => Transaction::APPROVED, 'type' => Transaction::STRIPE]),
            'cancel_url'  => route('payment-info', ['coin' => $coin->id, 'status' => Transaction::REJECTED, 'type' => Transaction::STRIPE]),
        ]);

        if ($session) {
            OneTimeToken::query()->updateOrCreate(
                ['user_id' => Auth::id()],
                ['token'   => $session->id]
            );

            Session::put('payment_session_id', $session->id);
            return response()->json(['message' => 'Payment Success', 'session_id' => $session->id], 200);
        }

        return response()->json(['message' => 'Payment Error'], 400);
    }

    public function paypalPayment($id, $status)
    {
        $coin = Coin::query()
            ->findOrFail($id);

        $token = Str::random(120);
        if($status) {
            OneTimeToken::query()->updateOrCreate(
                ['user_id' => Auth::id()],
                ['token'   => $token]
            );

            Session::put('payment_session_id', $token);
            return response()->json(['url'  => route('payment-info', [
                'coin' => $coin->id,
                'status' => ($status ? Transaction::APPROVED : Transaction::REJECTED),
                'type' => Transaction::PAYPAL
            ])]);
        }

        return response()->json(['message' => 'Payment Error'], 400);
    }

//    public function shop()
//    {
//        return view();
//    }

}
