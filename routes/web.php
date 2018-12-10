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

Route::prefix('app')->group(function () {
    Route::group(['prefix'=>'user'],function (){
        Route::get('getOpenid','UserController@getOpenid');
        Route::post('saveUserInfo','UserController@saveUserInfo');
        Route::post('saveUserFullInfo','UserController@saveUserFullInfo');
        Route::get('getUserInfo','UserController@getUserInfo');
        Route::get('report/list','UserController@getUserReport');
        Route::get('book/pub','UserController@getUserPubBook');
    });
    Route::group(['prefix'=>'report'],function (){
        Route::get('list','ReportController@index');
        Route::post('store','ReportController@store');
        Route::post('comment/store','ReportController@storeComment');
        Route::get('comment/list','ReportController@commentList');
        Route::get('changeAgree','ReportController@changeAgree');
        Route::get('detail','ReportController@detail');
    });
    Route::group(['prefix'=>'teacher'],function (){
        Route::post('store','TeacherController@store');
        Route::get('show','TeacherController@show');
    });
    Route::group(['prefix'=>'system'],function (){
        Route::post('upload','SystemController@upload');
        Route::post('saveFormId','SystemController@saveFormId');
    });
    Route::group(['prefix'=>'book'],function (){
        Route::post('store','BookController@store');
        Route::get('detail','BookController@detail');
        Route::get('list','BookController@index');
        Route::get('report/list','BookController@reportList');
    });

});



Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::group(['prefix' => 'book'], function () {
        Route::get('/','BookController@index');
        Route::get('/add','BookController@add');
        Route::post('/store','BookController@store');
        Route::get('/show/id/{id}','BookController@show');
        Route::post('/detail','BookController@getOneBook');
    });
    Route::group(['prefix'=>'user'],function (){
        Route::get('/','UserController@index');
        Route::get('/show/id/{id}','UserController@show');
        Route::get('/modify/id/{id}','UserController@modify');
        Route::post('/update','UserController@update');
    });
    Route::group(['prefix'=>'account'],function (){
        Route::get('/','AccountController@index');
        Route::get('/show/id/{id}','AccountController@show');
        Route::get('/modify/id/{id}','AccountController@modify');
        Route::post('/update','AccountController@update');
    });
    Route::group(['prefix'=>'commodity'],function (){
        Route::get('/','CommodityController@index');
        Route::get('/show/id/{id}','CommodityController@show');
        Route::get('/add','CommodityController@add');
        Route::post('/store','CommodityController@store');
    });
    Route::group(['prefix'=>'order'],function (){

        Route::get('/','OrderController@index');

    });
});



