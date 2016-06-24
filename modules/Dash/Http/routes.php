<?php

Route::group(['prefix' => 'dash', 'namespace' => 'Modules\Dash\Http\Controllers'], function()
{
	Route::get('/', 'DashController@index');
	Route::get('/analytical-designer', 'DashController@getAnalyticalDesigner');
	Route::get('/team-structure', 'DashController@getTeamStructure');
	Route::get('/profile/{id}', 'EmployeeController@getProfile');

	Route::get('/team-builder', 'ProjectController@getTeamBuilder');
	Route::get('/team-builder/phases', 'ProjectController@getTeamBuilderProjectPhases');

	Route::get('/projects', 'ProjectController@getList');
	Route::get('/project/new', 'ProjectController@getNew');
	Route::post('/project/new', 'ProjectController@postNew');

	Route::get('/project-phases', 'PrphaseController@getList');
	Route::get('/project-phases/new', 'PrphaseController@getNew');
	Route::post('/project-phases/new', 'PrphaseController@postNew');
	Route::get('/project-phases/edit', 'PrphaseController@getEdit');
	Route::post('/project-phases/edit', 'PrphaseController@postEdit');
	Route::get('/project-phases/delete', 'PrphaseController@getDelete');

	Route::get('/technologies', 'TechnologyController@getList');
	Route::get('/technology/new', 'TechnologyController@getNew');
	Route::post('/technology/new', 'TechnologyController@postNew');
	Route::get('/technology/edit', 'TechnologyController@getEdit');
	Route::post('/technology/edit', 'TechnologyController@postEdit');
	Route::get('/technology/delete', 'TechnologyController@getDelete');

	Route::get('/general-setting/edit', 'SettingController@getEdit');
	Route::post('/general-setting/edit', 'SettingController@postEdit');

	Route::get('/team-structure-apparel', 'DashController@getTeamStructureApparel');
	Route::get('/profile-apparel/{id}', 'EmployeeController@getProfileApparel');
});