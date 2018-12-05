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
        Route::get('/','UserController@index');
        Route::get('/show/id/{id}','UserController@show');
        Route::get('/modify/id/{id}','UserController@modify');
        Route::post('/update','UserController@update');
    });
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
