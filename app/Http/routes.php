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
    return view('welcome');
});

Route::group(['middleware' => 'cors'], function () {
  Route::get('auth/google',  'AuthController@login');
  Route::get('logout',  'AuthController@logout');
});

Route::group(['middleware' => ['cors','auth:api'],'prefix'=>'api/v1'], function (){
  Route::resource('posts','PostController');
  Route::resource('comments','CommentController');
});
