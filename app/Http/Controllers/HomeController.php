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
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        if(Session::has('savePoints'))
            Session::forget('savePoints');
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
