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

// Route for user management
Route::get('/admin/user', 'UsersController@index')->name('admin.user.index');
Route::get('/admin/user/create', 'UsersController@create')->name('admin.user.create');
Route::post('/admin/user/create', 'UsersController@store')->name('admin.user.store');
Route::get('/admin/user/{id}', 'UsersController@show')->name('admin.user.show');
Route::get('/admin/user/{id}/edit', 'UsersController@edit')->name('admin.user.edit');
Route::patch('/admin/user/{id}', 'UsersController@update')->name('admin.user.update');
Route::delete('/admin/user/{id}', 'UsersController@destroy')->name('admin.user.destroy');

// Route for organisasi management
Route::get('/admin/organisasi', 'OrganisasiController@index')->name('admin.organisasi.index');
Route::get('/admin/organisasi/create', 'OrganisasiController@create')->name('admin.organisasi.create');
Route::post('/admin/organisasi/create', 'OrganisasiController@store')->name('admin.organisasi.store');
Route::get('/admin/organisasi/{id}', 'OrganisasiController@show')->name('admin.organisasi.show');
Route::get('/admin/organisasi/{id}/edit', 'OrganisasiController@edit')->name('admin.organisasi.edit');
Route::patch('/admin/organisasi/{id}', 'OrganisasiController@update')->name('admin.organisasi.update');
Route::delete('/admin/organisasi/{id}', 'OrganisasiController@destroy')->name('admin.organisasi.destroy');

// Route for uraian
Route::get('/admin/uraian', 'UraianController@index')->name('admin.uraian.index');
Route::get('/admin/uraian/create', 'UraianController@create')->name('admin.uraian.create');
Route::post('/admin/uraian/create', 'UraianController@store')->name('admin.uraian.store');
Route::get('/admin/uraian/{id}', 'UraianController@show')->name('admin.uraian.show');
Route::get('/admin/uraian/{id}/edit', 'UraianController@edit')->name('admin.uraian.edit');
Route::patch('/admin/uraian/{id}', 'UraianController@update')->name('admin.uraian.update');
Route::delete('/admin/uraian/{id}', 'UraianController@destroy')->name('admin.uraian.destroy');

// Route for urusan
Route::get('/admin/urusan/create', 'UrusanController@create')->name('admin.urusan.create');
Route::post('/admin/urusan/create', 'UrusanController@store')->name('admin.urusan.store');
Route::get('/admin/urusan/{id}', 'UrusanController@show')->name('admin.urusan.show');
Route::get('/admin/urusan/{id}/edit', 'UrusanController@edit')->name('admin.urusan.edit');
Route::patch('/admin/urusan/{id}', 'UrusanController@update')->name('admin.urusan.update');
Route::delete('/admin/urusan/{id}', 'UrusanController@destroy')->name('admin.urusan.destroy');

