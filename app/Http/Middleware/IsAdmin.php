<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
//    public function handle($request, Closure $next)
//    {
//        $user = Auth::user();
//        if(!$user || $user->isAdmin()) {
//            return redirect('/game-dash/login');
//        }
//        return $next($request);
//    }
    public function handle($request, Closure $next)
    {
        $user = Auth::guard('admin')->user();
        if($user && Auth::guard('admin')->user()->isAdmin()) {

            return $next($request);
        }
        return redirect('/game-dash/login');
    }
}
