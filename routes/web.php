<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('index');


// Auth Routes
Auth::routes();
Route::resource('user', 'UsersController');
Route::patch('/user/{id}/account', 'UsersController@updateAccount')->name('updateAccount');

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
