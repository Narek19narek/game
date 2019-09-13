<?php

Route::get('/login', 'AuthController@loginView')->name('admin.loginView');
Route::post('/login', 'AuthController@login')->name('admin.login');
Route::group(['middleware' => 'admin'],function ($route) {
    $route->get('/', 'AdminController@index')->name('admin.index');
    $route->post('/logout', 'AuthController@logout')->name('admin.logout');
    $route->get('/user', 'UserController@index')->name('admin.user');

    $route->resource('/boosts','BoostsController');
    $route->resource('/coins','CoinsController');
    $route->resource('/skins','SkinsController');
//    $route->group(['prefix' => 'boosts'], function ($boosts) {
//    });
});
