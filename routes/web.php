<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'UrlController@index');
Route::get('/ajax', function(){
    return view('home-vue');
});

Route::post('/', 'UrlController@store');

Route::get('/{code}', 'UrlController@show');

Route::post('api/url', 'UrlController@apiStore');
