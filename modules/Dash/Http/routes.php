<?php

Route::group(['prefix' => 'dash', 'namespace' => 'Modules\Dash\Http\Controllers'], function()
{
	Route::get('/', 'DashController@index');

	Route::get('/team-structure', 'DashController@getTeamStructure');

	Route::get('/team-builder', 'ProjectController@getTeamBuilder');
	Route::get('/team-builder/phases', 'ProjectController@getTeamBuilderProjectPhases');
	Route::post('/team-builder/predict-team', 'ProjectController@postPredictTeam');
	Route::get('/team-builder/team/{id}', 'ProjectController@getTeam');
	Route::get('/team-builder/algorithm-accuracy', 'ProjectController@getAlgorithmAccuracy');

	Route::get('/projects', 'ProjectController@getList');
	Route::get('/project/new', 'ProjectController@getNew');
	Route::post('/project/new', 'ProjectController@postNew');
	Route::get('/project/get-project', 'ProjectController@getProjectDetails');

	Route::get('/roles', 'RoleController@getList');

	Route::get('/technologies', 'TechnologyController@getList');
	Route::get('/technology/new', 'TechnologyController@getNew');
	Route::post('/technology/new', 'TechnologyController@postNew');
	Route::get('/technology/edit', 'TechnologyController@getEdit');
	Route::post('/technology/edit', 'TechnologyController@postEdit');
	Route::get('/technology/delete', 'TechnologyController@getDelete');

	Route::get('/analytics/analytical-designer', 'AnalyticsController@getList');
	Route::get('/analytics/project-gender', 'AnalyticsController@getProjectGender');
	Route::get('/analytics/project-role', 'AnalyticsController@getProjectRole');
	Route::get('/analytics/project-technology', 'AnalyticsController@getProjectTechnology');

	Route::get('/human-resources', 'EmployeeController@getList');
	Route::get('/profile/{id}', 'EmployeeController@getProfile');

	Route::get('/general-setting/edit', 'SettingController@getEdit');
	Route::post('/general-setting/edit', 'SettingController@postEdit');
	Route::get('/general-setting/translate', 'SettingController@getTranslate');


	Route::get('/team-structure-apparel', 'DashController@getTeamStructureApparel');
});