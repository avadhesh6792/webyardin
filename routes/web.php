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
    //Route::get('/', 'AdminController@index')->name('dashboard');
    Route::get('/', 'AdminController@users')->name('dashboard');
    Route::get('/users', 'AdminController@users')->name('users');
    Route::get('/groups', 'AdminController@groups')->name('groups');
    Route::get('/group-media', 'AdminController@groupMedia')->name('group-media');
    Route::delete('/delete-group-media/{id}/{fileName}/{fileType}', 'AdminController@deleteGroupMedia')->name('delete-group-media');
    Route::delete('/delete-direct-media/{id}', 'AdminController@deleteDirectMedia')->name('delete-direct-media');
    Route::get('/direct-media', 'AdminController@directMedia')->name('direct-media');
    Route::get('/delete-direct-media/{id}', 'AdminController@deleteDirectMedia')->name('delete-direct-media');
    
    Route::delete('/delete-user/{user_id}/{profile_image}/{bg_image}', 'AdminController@deleteUser')->name('delete-user');
    Route::delete('/delete-group/{group_id}', 'AdminController@deleteGroup')->name('delete-group');
});
