<?php

namespace App\Http\Controllers;

use App\Boost;
use App\Coin;
use App\Skin;
use App\User;
use Illuminate\Support\Facades\DB;
use Session;
use Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
//        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
//        $events = \Stripe\Event::all([
//            'type' => 'checkout.session.completed',
//            'created' => [
//                // Check for events created in the last 24 hours.
//                'gte' => time() - 24 * 60 * 60,
//            ],
//        ]);
//        dd($events);
        $coins = Coin::all();
        $boosts = Boost::all();
        $skins = Skin::all();
        return view('player.shop.index', compact('coins', 'boosts', 'skins'));
    }
    public function skin() {
        $skins = Skin::all();
        $user_skins = User::query()->findOrFail(Auth::id())->skins()->get();
        return view('player.shop.skin.index', compact('skins', 'user_skins'));
    }
    public function selectSkin(Request $request, $id) {
        $skins = Skin::all();
        User::query()->where('id', Auth::id())->update(['skeen_id' => $id]);
        return response()->json(["id" => $id], 200);
    }

    public function boosts() {
        $boosts = Boost::all()->groupBy('name');
        return view('player.shop.boosts.index', compact('boosts'));
    }
}
