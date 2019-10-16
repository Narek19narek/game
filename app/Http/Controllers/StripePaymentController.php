<?php

namespace App\Http\Controllers;

use App\Coin;
use Illuminate\Http\Request;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        Stripe\Stripe::setApiKey(config('services.stripe.key'));
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'name' => 'Coin',
                'description' => 'get coin',
                'amount' => 100,
                'currency' => 'usd',
                'quantity' => 1,
            ]],
            'success_url' => 'https://example.com/success',
            'cancel_url' => 'https://example.com/cancel',
        ]);
        return view('stripe', compact('session'));
    }



    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
//        dd($request->stripeToken);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            "amount" => 100 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);

//        Session::flash('success', 'Payment successful!');

        return back();
    }

    public function payment($id) {
        $coin = Coin::findOrFail($id);
        dd($coin);
    }
}
