<?php

Route::group(['prefix' => 'dash', 'namespace' => 'Modules\Dash\Http\Controllers'], function()
{
	Route::get('/', 'DashController@index');
});