<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->get('/modules/by_project/{id}', 'API\ModulesController@getByProject')->name('getByProject');
Route::middleware('api')->get('/tasks/by_module/{id}', 'API\TasksController@getByModule')->name('getByModule');
Route::middleware('api')->get('/tasks/mark_as_finished/{id}', 'API\TasksController@markAsFinished')->name('markAsFinished');

Route::apiResources([
    'users' => 'API\UsersController',
    'privilege_groups' => 'API\PrivilegeGroupsController',
    'modules' => 'API\ModulesController',
    'tasks' => 'API\TasksController',
]);
