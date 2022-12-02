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

Route::group(['middleware'>'auth:api'], function(){


    Route::post('/login', [
       'uses' => 'apiController@postLogin'
    ]);

    Route::post('/register', [
       'uses' => 'apiController@postRegister'
    ]);

    Route::get('/vip_packages', [
        'uses' => 'apiController@getVIP'
    ]);

    Route::get('/free_tips', [
        'uses' => 'apiController@getFreeTips'
    ]);

    Route::get('/free_category', [
        'uses' => 'apiController@getFreeCategory'
    ]);

    Route::get('/vip_category', [
        'uses' => 'apiController@getVIPCategory'
    ]);

    Route::get('/profile', [
        'uses' => 'apiController@getProfile'
    ]);

    Route::post('/profile', [
        'uses' => 'apiController@postProfile'
    ]);

    Route::get('/pay', [
        'uses' => 'apiController@getPay'
    ]);

    Route::get('/investment_today_odd', [
        'uses' => 'apiController@getInvestment'
    ]);


});
