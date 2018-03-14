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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', 'TestController@index');

Route::get('finderName', 'Publics\AlbumController@finderName');
Route::get('finderName/{id}', 'Publics\AlbumController@finderName');

Route::get('curl_test', 'ParserController@index');


Route::get('contact', function (){


    return view('contact');
});

