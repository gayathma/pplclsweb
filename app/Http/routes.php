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

Route::get('/', 'Auth\AuthController@getLogin');

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function()
{
    Route::get('/login', 'AuthController@getLogin');
    Route::post('/login', 'AuthController@postLogin');
    Route::get('/logout', 'AuthController@getLogout');
    Route::get('/change-password', 'PasswordController@getChangePassword');
    Route::post('/change-password', 'PasswordController@postChangePassword');
});
