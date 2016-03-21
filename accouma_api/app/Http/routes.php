<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::get('api/v1/login', 'api\v1\loginController@is_logued');
Route::post('api/v1/login', 'api\v1\loginController@login');
Route::delete('api/v1/login', 'api\v1\loginController@close');

Route::get('api/v1/users', 'api\v1\usersController@index');
Route::post('api/v1/users/create', 'api\v1\usersController@create');
Route::get('api/v1/users/{id}', 'api\v1\usersController@edit');
Route::put('api/v1/users/{id}', 'api\v1\usersController@update');
Route::delete('api/v1/users/{id}', 'api\v1\usersController@unactive');
Route::patch('api/v1/users/{id}', 'api\v1\usersController@active');
Route::put('api/v1/users/{id}/update_pass', 'api\v1\usersController@update_pass');

Route::group(['middleware' => ['web']], function () {
    //
});
