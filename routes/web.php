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

Route::post('game-over', 'PlayerController@index');

Route::post('/play', 'PlayerController@start')->name('play');


//Route::post('game/login', 'HomeController@login')->name('game.login');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/profile/{id}', 'HomeController@profile')->name('profile')->middleware('auth');

Route::get('/shop', 'ShopController@index')->name('shop');

Route::get('/get-coin', 'CoinsController@index')->name('get-coin')->middleware('auth');
Route::get('/get-coin/success', 'CoinsController@success')->name('get-success');
Route::get('/payment/{id}', 'CoinsController@payment')->name('payment');
//Route::get('/payment/success/', 'CoinsController@success2');

Route::get('/get-skin', 'ShopController@skin')->name('get-skin')->middleware('auth');

Route::get('/get-boosts', 'ShopController@boosts')->name('get-boosts')->middleware('auth');

Route::get('/settings', 'HomeController@settings')->name('settings');
Route::get('/help', 'HomeController@help')->name('help');


//Route::get('stripe', 'StripePaymentController@stripe')->name('stripe');
//Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');

Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

Route::get('google', function () {
    return view('googleAuth');
});

Route::get('auth/google', 'SocialController@redirectToGoogle');
Route::get('auth/google/callback', 'SocialController@handleGoogleCallback');
