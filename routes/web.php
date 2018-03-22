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


Route::get('contact', 'Publics\ContactController@index');

Route::get('index', 'Publics\HomeController@index');


Route::get('music/{id}', 'Publics\AlbumController@one');

Route::get('category/{id}', 'Publics\CategoryController@show');

Route::get('one', function (){


    return view('one');
});




//Route::get('finder', 'Publics\OperationController@finder'); if you want activate cool finder

Route::get('finder/{name?}', 'Publics\OperationController@finder');


//Route::get('result', function (){
//
//
//    return view('result');
//}) -> name('finder');


Route::get('result/{name?}', 'Publics\OperationController@result') -> name('result');


Route::get('htmlParse', 'TestController@testHtmlParse');
