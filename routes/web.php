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


Auth::routes();

Route::get('/', 'DashboardController@index')->name('dashboard');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/admin/user', 'UsersController@index')->name('admin.user.index');
Route::get('/admin/user/create', 'UsersController@create')->name('admin.user.create');
Route::post('/admin/user/create', 'UsersController@store')->name('admin.user.store');
Route::get('/admin/user/{id}', 'UsersController@show')->name('admin.user.show');
Route::get('/admin/user/{id}/edit', 'UsersController@edit')->name('admin.user.edit');
Route::patch('/admin/user/{id}', 'UsersController@update')->name('admin.user.update');
Route::delete('/admin/user/{id}', 'UsersController@destroy')->name('admin.user.destroy');