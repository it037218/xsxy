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


Route::prefix('app')->group(function () {
    Route::group(['prefix'=>'user'],function (){
        Route::get('getOpenid','UserController@getOpenid');
        Route::get('saveUserInfo','UserController@saveUserInfo');
        Route::get('saveUserFullInfo','UserController@saveUserFullInfo');
        Route::get('getUserInfo','UserController@getUserInfo');
    });
});


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
