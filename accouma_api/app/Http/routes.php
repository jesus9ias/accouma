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

Route::get('api/v1/login', 'api\v1\loginController@isLogued');
Route::post('api/v1/login', 'api\v1\loginController@login');
Route::delete('api/v1/login', 'api\v1\loginController@close');

Route::post('api/v1/recove/send_recove_token', 'api\v1\recoveController@sendRecoveToken');
Route::put('api/v1/recove/complete_recove/{email}/{token}', 'api\v1\recoveController@completeRecove');

Route::get('api/v1/users', 'api\v1\usersController@index');
Route::post('api/v1/users/create', 'api\v1\usersController@create');
Route::get('api/v1/users/{id}', 'api\v1\usersController@edit');
Route::put('api/v1/users/{id}', 'api\v1\usersController@update');
Route::delete('api/v1/users/{id}', 'api\v1\usersController@disable');
Route::patch('api/v1/users/{id}', 'api\v1\usersController@activate');
Route::put('api/v1/users/{id}/update_pass', 'api\v1\usersController@updatePass');

Route::get('api/v1/accounts', 'api\v1\accountsController@index');
Route::post('api/v1/accounts/create', 'api\v1\accountsController@create');
Route::get('api/v1/accounts/{id}', 'api\v1\accountsController@edit');
Route::put('api/v1/accounts/{id}', 'api\v1\accountsController@update');
Route::delete('api/v1/accounts/{id}', 'api\v1\accountsController@disable');
Route::patch('api/v1/accounts/{id}', 'api\v1\accountsController@activate');

Route::get('api/v1/concepts', 'api\v1\conceptsController@index');
Route::post('api/v1/concepts/create', 'api\v1\conceptsController@create');
Route::get('api/v1/concepts/{id}', 'api\v1\conceptsController@edit');
Route::put('api/v1/concepts/{id}', 'api\v1\conceptsController@update');

Route::put('api/v1/user_roles/{user_id}/{role_slug}', 'api\v1\userRolesController@asign');
Route::delete('api/v1/user_roles/{user_id}/{role_slug}', 'api\v1\userRolesController@remove');

Route::group(['middleware' => ['web']], function () {
    //
});
