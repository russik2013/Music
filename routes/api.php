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

Route::post('auth', 'HomeController@auth');

Route::group(['middleware' => 'user'], function () {

    Route::group(['middleware' => 'administrator', 'prefix' => 'admin'], function () {

        Route::post('store', 'Admin\AdminController@store');
        Route::post('read', 'Admin\AdminController@read');
        Route::post('update', 'Admin\AdminController@update');
        Route::post('delete', 'Admin\AdminController@delete');

    });

    Route::group(['middleware' => 'album', 'prefix' => 'album'], function () {

         Route::post('store', 'Admin\AlbumController@store');
         Route::post('update', 'Admin\AlbumController@update');
         Route::post('list', 'Admin\AlbumController@show');
         Route::post('сategory', 'Admin\CategoryController@show');

    });

    Route::group(['middleware' => 'album', 'prefix' => 'category'], function () {

        Route::post('store', 'Admin\CategoryController@store');
        Route::post('update', 'Admin\CategoryController@update');
        Route::post('delete', 'Admin\CategoryController@delete');

    });

});