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
    Route::group(['prefix' => 'user'], function () {
        Route::get('getOpenid', 'UserController@getOpenid');
        Route::post('saveUserInfo', 'UserController@saveUserInfo');
        Route::post('saveUserFullInfo', 'UserController@saveUserFullInfo');
        Route::get('getUserInfo', 'UserController@getUserInfo');
        Route::get('report/list', 'UserController@getUserReport');
        Route::get('book/pub', 'UserController@getUserPubBook');
        Route::get('course/list', 'UserController@userCourseList');   //创建课程列表
//        Route::get('course/pub/list', 'UserController@userPubCourseList');   //购买课程列表
        Route::get('book/store/list', 'UserController@getUserStoredBook');   //收藏图书列表
        Route::get('book/store/delete', 'UserController@deleteUserStoredBook');   //收藏图书列表
    });
    Route::group(['prefix' => 'report'], function () {
        Route::get('list', 'ReportController@index');
        Route::post('store', 'ReportController@store');
        Route::post('comment/store', 'ReportController@storeComment');
        Route::get('comment/list', 'ReportController@commentList');
        Route::get('changeAgree', 'ReportController@changeAgree');
        Route::get('detail', 'ReportController@detail');
    });
    Route::group(['prefix' => 'teacher'], function () {
        Route::post('store', 'TeacherController@store');
        Route::get('show', 'TeacherController@show');
    });
    Route::group(['prefix' => 'system'], function () {
        Route::post('upload', 'SystemController@upload');
        Route::post('saveFormId', 'SystemController@saveFormId');
        Route::get('slider/list', 'SystemController@sliderList');
    });
    Route::group(['prefix' => 'book'], function () {
        Route::post('store', 'BookController@store');
        Route::get('detail', 'BookController@detail');
        Route::get('list', 'BookController@index');
        Route::get('report/list', 'BookController@reportList');
    });

    Route::group(['prefix' => 'course'], function () {
        Route::post('store', 'CourseController@store');
        Route::get('detail', 'CourseController@detail');
        Route::get('delete', 'CourseController@delete');
        Route::post('update', 'CourseController@update');
    });

    Route::group(['prefix'=>'courseGroup'],function (){
        Route::post('store','CourseGroupController@store');
        Route::post('joinIn','CourseGroupController@joinIn');
    });

});


Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::group(['prefix' => 'book'], function () {
        Route::get('/', 'BookController@index');
        Route::get('/add', 'BookController@add');
        Route::post('/store', 'BookController@store');
        Route::get('/show/id/{id}', 'BookController@show');
        Route::post('/detail', 'BookController@getOneBook');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'UserController@index');
        Route::get('/show/id/{id}', 'UserController@show');
        Route::get('/modify/id/{id}', 'UserController@modify');
        Route::post('/update', 'UserController@update');
    });
    Route::group(['prefix' => 'account'], function () {
        Route::get('/', 'AccountController@index');
        Route::get('/show/id/{id}', 'AccountController@show');
        Route::get('/modify/id/{id}', 'AccountController@modify');
        Route::post('/update', 'AccountController@update');
    });
    Route::group(['prefix' => 'commodity'], function () {
        Route::get('/', 'CommodityController@index');
        Route::get('/show/id/{id}', 'CommodityController@show');
        Route::get('/add', 'CommodityController@add');
        Route::post('/store', 'CommodityController@store');
    });
    Route::group(['prefix' => 'order'], function () {

        Route::get('/', 'OrderController@index');

    });
});



