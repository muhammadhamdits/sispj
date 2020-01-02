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

// Route for organisasi kegiatan
Route::get('/kegiatan/create', 'KegiatanController@create');
Route::get('admin/kegiatan/{kegiatan}', 'KegiatanController@show')->name('admin.kegiatan.show');
Route::post('/kegiatan', 'KegiatanController@store');
Route::delete('/kegiatan/{kegiatan}', 'KegiatanController@destroy');
Route::get('/kegiatan/{kegiatan}/edit', 'KegiatanController@edit');
Route::patch('/kegiatan/{kegiatan}', 'KegiatanController@update');