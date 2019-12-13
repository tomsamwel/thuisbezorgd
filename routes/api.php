<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::group(['middleware' => ['web']], function () {
// 	Route::get('/session/products', 'SessionController@products');
//
// 	Route::post('/session/products', 'SessionController@storeProducts');
//
// 	// Route::get('/session/{key}', 'SessionController@store');
//
// });
