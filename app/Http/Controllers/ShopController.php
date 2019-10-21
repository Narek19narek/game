<?php

namespace App\Http\Controllers;

use App\Boost;
use App\Coin;
use App\Jobs\UpdateGetBoosts;
use App\Skin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $coins  = Coin::all();
        $boosts = Boost::all();
        $skins  = Skin::all();
        return view('player.shop.index', compact('coins', 'boosts', 'skins'));
    }

    public function skin()
    {
        $arrSkins   = [];
        $skins      = Skin::all();
        $user_skins = User::query()->findOrFail(Auth::id())->skins()->get(['skin_id']);
        foreach ($skins as $skin) {
            foreach ($user_skins as $user_skin) {
                if ($user_skin->skin_id === $skin->id) {
                    $arrSkins[] = $skin->id;
                }
            }
        }
        return view('player.shop.skin.index', compact('skins','arrSkins'));
    }

    public function selectSkin(Request $request, $id)
    {
        $err            = [];
        $selected_skin  = Skin::query()->findOrFail($id);
        $user           = User::query()->findOrFail(Auth::id());
        $user_skins     = $user->skins;
        foreach ($user_skins as $skin) {
            if ((int)$id === (int)$skin->id) {
                $err[] = $skin->id;
            }
        }

        if (count($err)) {
            $user->update(['skeen_id' => $id]);
            return response()->json(['status' => 1], 200);
        } else {
            if ($selected_skin->coin <= $user->coins) {
                $coin = $user->coins - $selected_skin->coin;
                $user->update(['coins' => $coin, 'skeen_id' => $selected_skin->id]);
                $selected_skin->user_skins()->attach(Auth::id());
                return response()->json(["status" => 2, "title" => 'Congratulations!', 'message' => 'you have purchased a skin', 'id' => $id], 200);
            } else {
                return response()->json(["status" => 3, "title" => 'Oops', 'message' => 'You don\'t have enough coins for this, visit the store', 'id' => $id], 200);
            }
        }
    }

    public function boosts()
    {
        $boosts = Boost::all()->groupBy('name');
        return view('player.shop.boosts.index', compact('boosts'));
    }

    public function getSwitches(Request $request) {

        $name       = $request->name;
        $amount     = $request->amount;
        $coin       = $request->coin;
        $duration   = $request->duration;
        $boosts     = Boost::query()
            ->where('name', $name)
            ->where('amount', $amount)
            ->where('duration', $duration)
            ->where('coin', $coin)
            ->firstOrFail();

        $user       = User::query()->findOrFail(Auth::id());
        $user_boost = $boosts->amount;
        if ($user->coins >= $coin) {
            if ($name === "switch") {
                $user->update(['coins' => $user->coins - $boosts->coin, 'switch' => $user->switch + $boosts->amount]);
            } elseif ($name === "push") {
                $user->update(['coins' => $user->coins - $boosts->coin, 'push' => $user->push + $boosts->amount]);
            } else {
                $user->update(['coins' => $user->coins - $boosts->coin, 'teleport' => $user->teleport + $boosts->amount]);
            }
            dispatch(new UpdateGetBoosts($user, $name, $user_boost))->delay($duration * 3600);
            return response()->json(['title' => 'Congratulations!', 'message' => 'you have purchased a boost'], 200);
        } else {
            return response()->json(['title' => 'Oops', 'message' => 'You don\'t have enough coins for this, visit the store'], 200);
        }
//        php artisan queue:work --tries=1
    }
}
