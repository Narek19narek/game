<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    private $player;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->player = new PlayerController();
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Session::has('savePoints'))
            Session::forget('savePoints');
        $user = Auth::user();
        if ($user) {
            $oldLevel = $user->level;
            $level  = $this->player->CalculateLevel($user->total_points);
            $level  = $level > 1 ? $level : 1;

            $user->update([
                'level' => $level,
                'coins' => $user->coins + $this->player->CalculateCoins($oldLevel, $level)
            ]);
        }
        return view('player.index', compact('user'));
    }

    public function profile(Request $request)
    {
        if ($request->route('id') == Auth::id()) {
            $transactions = Transaction::query()
                ->where('receiver_id', '=', Auth::id())
                ->with('coin')
                ->orderBy('created_at', 'DESC')
                ->get();

            return view('player.profile', ['user' => Auth::user(), 'transactions' => $transactions]);
        }

        return redirect()->to('404');
    }

    public function settings () {
        return view('player.settings');
    }

    public function gameMode (Request $request) {
        $checked = $request->checked;

        if (Auth::user()) {
            User::query()
                ->where('id', '=', Auth::id())
                ->update(['game_mode' => $checked]);
            return response()->json(['message' => 1]);
        } else {

            return response()->json(['message' => 0]);
        }
    }
    public function hideProperty (Request $request) {

        $checked = $request->checked;
        $name = $request->name;

        if (Auth::user()) {
            User::query()
                ->where('id', '=', Auth::id())
                ->update([$name => $checked]);
            return response()->json(['message' => 1]);
        }
        return response()->json(['message' => 0]);
    }

    public function help () {
        return view('player.help');
    }

    public function terms () {
        return view('player.termAndConditions');
    }
    public function privacyPolicy () {
        return view('player.privacy');
    }
}
