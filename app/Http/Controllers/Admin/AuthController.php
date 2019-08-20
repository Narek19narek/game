<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Login;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/game-dash');
    }

    public function loginView()
    {
        if(Auth::guard('admin')->user()){
            return redirect()->to('/game-dash');
        }
        return view('admin.login');
    }

    public function login(Login $request)
    {
        $credentials = $request->only(['email', 'password']);
        $credentials = $credentials + ['role_id' => 1];
        if(!Auth::guard('admin')->attempt($credentials))
            return redirect()->back()->withErrors(['email' => 'Email or password incorrect.']);
        return redirect()->to('/game-dash');
    }

}
