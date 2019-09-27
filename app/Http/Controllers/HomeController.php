<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
//        if(Session::has('is_playing') && Session::get('is_playing')) {
//            Session::put('is_playing', false);
//        }
        $user = Auth::user();
        if(Session::has('savePoints'))
            Session::forget('savePoints');
        return view('player.index', compact('user'));
    }

    public function profile(Request $request) {
        $user = Auth::user();
        if ($request->segment(2) == $user->id) {
            return view('player.profile', compact('user'));
        } else {
            return redirect()->route('home');
        }
    }

    public function settings () {
        return view('player.settings');
    }

    public function help () {
        return view('player.help');
    }
}
