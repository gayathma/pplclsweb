<?php

Route::group(['prefix' => 'dash', 'namespace' => 'Modules\Dash\Http\Controllers'], function()
{
	Route::get('/', 'DashController@index');
	Route::get('/analytical-designer', 'DashController@getAnalyticalDesigner');
	Route::get('/team-structure', 'DashController@getTeamStructure');
	Route::get('/profile/{id}', 'EmployeeController@getProfile');
});