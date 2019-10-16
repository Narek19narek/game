<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
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
//        if (url()->previous() === route('play') && Session::has('is_playing')) {
//            Session::put('is_playing', false);
//        }
        $user = Auth::user();
//        if(Session::has('savePoints'))
//            Session::forget('savePoints');
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

    public function help () {
        return view('player.help');
    }

    public function terms () {
        return view('player.termAndConditions');
    }
}
