<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', function () {
    return view('front.index');
});
Route::get('/home', function () {
    return view('front.index');
});

Route::get('users/register', 'UserController@getRegister');
Route::post('users/register', 'UserController@postSignUp');

Route::get('users/logout', 'UserController@logout');

Route::get('users/login', 'UserController@getLogin')->name("login");
Route::post('users/login', 'UserController@postSignIn');

Route::group(['middleware' => ['web']], function () {
    Route::get('users/upload-video', ['uses' => 'UploadVideoController@getView', 'middleware' => 'auth'])->name('upload_video');
    Route::post('users/upload-video', ['uses' => 'UploadVideoController@postVideos', 'middleware' => 'auth']);
});

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'), function () {
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin');
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin');
    Route::get('users', 'UsersController@index');
    Route::get('roles', 'RolesController@index');
    Route::get('roles/create', 'RolesController@create');
    Route::post('roles/create', 'RolesController@store');
});


//Route::auth();
//
//Route::get('/home', 'HomeController@index');
