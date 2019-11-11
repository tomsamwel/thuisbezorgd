<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/', function () {
    return view('admin.home');
})->name('admin');

Route::resource('users', 'UserController');
Route::resource('products', 'ProductController');
Route::resource('restaurants', 'RestaurantController');
