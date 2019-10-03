<?php

namespace App\Http\Controllers;

use App\Coin;
use App\Skin;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Stripe;
use Illuminate\Http\Request;

class CoinsController extends Controller
{
    public function index()
    {
        $coins = Coin::all();
        return view('player.shop.coin.index', compact('coins'));
    }

    public function success(Request $request)
    {
        $id = Session::get('have_coin') ? Session::get('have_coin') : null;
        if (Session::get('have_coin') === (int)$request->session_id) {
//            Session::forget('have_coin');
            $coin = Coin::query()->findOrFail($id);
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $events = \Stripe\Event::all([
                'type' => 'checkout.session.completed',
                'created' => [
                    // Check for events created in the last 24 hours.
                    'gte' => time() - 24 * 60 * 60,
                ],
            ]);
            $this->addCoinStripe($events);
            return view('player.shop.coin.confirm', compact('coin'));
        } else return abort(404);
    }

    public function success2(Request $request)
    {
        Skin::query()->create([
            'skin' => 'asdasdasd',
            'coin' => 546
        ]);
    }

    public function payment($id, Request $request)
    {
        $coin = Coin::query()->findOrFail($id);
        Session::put('have_coin', $coin->id);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'name' => 'Coin',
                'description' => 'get ' . $coin->coin . '  coin',
                'amount' => $coin->price * 100,
                'currency' => 'usd',
                'quantity' => 1,
            ]],
            'success_url' => route('get-success', ['session_id' => $coin->id]),
            'cancel_url' => route('home'),
        ]);

        if ($session) return response($session->id);
    }

    public function shop()
    {
        return view();
    }

    public function addCoinStripe(object $events)
    {
        $amountStripe = $events->autoPagingIterator()->current()->data->object->display_items[0]->amount / 100;
        $getCoin = Coin::query()->where('price', $amountStripe)->first()->coin;
        User::query()->where('id', Auth::id())->update(['coins' => DB::raw("coins + $getCoin")]);
    }
}
