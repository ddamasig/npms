<?php

Route::get('/', function() {
    return redirect('/dashboard');
});


// Auth Routes
Auth::routes();
Route::resource('user', 'UsersController');
Route::patch('/user/{id}/account', 'UsersController@updateAccount')->name('updateAccount');
Route::put('/user/{id}/privileges', 'UsersController@updatePrivileges')->name('updatePrivileges');

// Web Routes
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
