<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->get('/modules/by_project/{id}', 'API\ModulesController@getByProject')->name('getByProject');

Route::apiResources([
    'users' => 'API\UsersController',
    'privilege_groups' => 'API\PrivilegeGroupsController',
    'modules' => 'API\ModulesController',
]);
