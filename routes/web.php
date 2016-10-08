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

Route::get('/', function () {
    //return view('login');
    return redirect('/login');
});

Auth::routes();


Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::get('/users', 'AdminController@users')->name('users');
    Route::get('/groups', 'AdminController@groups')->name('groups');
    Route::get('/media', 'AdminController@media')->name('media');
});
