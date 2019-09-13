<?php

namespace App\Http\Controllers;

use App\Coin;
use App\Skin;
use Stripe;
use Illuminate\Http\Request;

class CoinsController extends Controller
{
    public function index() {
        $coins = Coin::all();
        return view('player.shop.coin.index', compact('coins'));
    }

    public function success(Request $request) {
        $coins = Coin::all();
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $events = \Stripe\Event::all([
            'type' => 'checkout.session.completed',
            'created' => [
                // Check for events created in the last 24 hours.
                'gte' => time() - 24 * 60 * 60,
            ],
        ]);
        $iterator = 0;
        foreach ($events->autoPagingIterator() as $event) {
            $iterator++;
//            dd($event->data->object);
        }
        dd($iterator);
        dd($request->all());
        return view('player.shop.coin.index', compact('coins'));
    }

    public function success2(Request $request) {
        Skin::query()->create([
            'skin' => 'asdasdasd',
            'coin' => 546
        ]);
    }

    public function payment($id, Request $request) {
        $coin = Coin::query()->findOrFail($id);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'name' => 'Coin',
                'description' => 'get '.$coin->coin.'  coin',
                'amount' => $coin->price * 100,
                'currency' => 'usd',
                'quantity' => 1,
            ]],
            'success_url' => route('get-success', ['session_id' => '']),
            'cancel_url' => 'https://example.com/cancel',
        ]);





        if($session) return response($session->id);
    }
}
