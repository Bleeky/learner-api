<?php

Route::group(['prefix' => 'api'], function () {
    Route::resource('modules', 'ModuleController', ['only' => ['index', 'show']]);
    Route::get('diapos/{diapoId}/next', 'DiapoController@next');
    Route::get('diapos/{diapoId}/prev', 'DiapoController@prev');
    Route::get('diapos/{moduleId}', 'DiapoController@first');
});

Route::controllers([
	'/admin/diapos/edit' => 'DiapoEditAdminController',
	'/admin/diapos/insert' => 'DiapoInsertAdminController',
	'/admin/diapos' => 'DiapoAdminController',
	'/admin/modules' => 'ModuleAdminController',
	'/admin/users' => 'UserAdminController',
	'/admin/patients' => 'PatientAdminController',
	'/admin' => 'AdminController',
	'/' => 'AuthenticationController',
]);