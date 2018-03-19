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
Route::get('index', function (){


    return view('index');
});
Route::get('music', function (){


    return view('music');
});
Route::get('one', function (){


    return view('one');
});




Route::get('finder', 'Publics\OperationController@finder');




//Route::get('result', function (){
//
//
//    return view('result');
//}) -> name('finder');


Route::get('result/{name?}', 'Publics\OperationController@result') -> name('result');

