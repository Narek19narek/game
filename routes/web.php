<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;

//Auth::routes();

Route::get('/play', function () {
    return view('game.start');
});

//Route::get('/play', function () {
//    return view('game.start');
//});

//Route::get('/', function () {
//    return view('game.home');
//});

Route::post('game/login', 'HomeController@login')->name('game.login');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function() {
  return view('player.index');
});
