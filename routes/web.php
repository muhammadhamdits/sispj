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

Route::get('/admin/main', 'OrganisasiController@index')->name('admin.utama.index');

// Route for periode
Route::get('/admin/periode/create', 'PeriodeController@create')->name('admin.periode.create');
Route::post('/admin/periode/create', 'PeriodeController@store')->name('admin.periode.store');
Route::patch('/admin/periode/{id}', 'PeriodeController@update')->name('admin.periode.update');
Route::delete('/admin/periode/{periode}', 'PeriodeController@destroy')->name('admin.periode.destroy');

// Route for organisasi management
Route::get('/admin/organisasi/create', 'OrganisasiController@create')->name('admin.organisasi.create');
Route::post('/admin/organisasi/create', 'OrganisasiController@store')->name('admin.organisasi.store');
Route::get('/admin/organisasi/{id}', 'OrganisasiController@show')->name('admin.organisasi.show');
Route::get('/admin/organisasi/{id}/edit', 'OrganisasiController@edit')->name('admin.organisasi.edit');
Route::patch('/admin/organisasi/{id}', 'OrganisasiController@update')->name('admin.organisasi.update');
Route::delete('/admin/organisasi/{id}', 'OrganisasiController@destroy')->name('admin.organisasi.destroy');

// Route for urusan
Route::get('/admin/urusan/create', 'UrusanController@create')->name('admin.urusan.create');
Route::post('/admin/urusan/create', 'UrusanController@store')->name('admin.urusan.store');
Route::get('/admin/urusan/{id}', 'UrusanController@show')->name('admin.urusan.show');
Route::get('/admin/urusan/{id}/edit', 'UrusanController@edit')->name('admin.urusan.edit');
Route::patch('/admin/urusan/{id}', 'UrusanController@update')->name('admin.urusan.update');
Route::delete('/admin/urusan/{id}', 'UrusanController@destroy')->name('admin.urusan.destroy');

// Route for program
Route::get('/admin/program/create', 'ProgramController@create')->name('admin.program.create');
Route::post('/admin/program/create', 'ProgramController@store')->name('admin.program.store');
Route::get('/admin/program/{id}', 'ProgramController@show')->name('admin.program.show');
Route::get('/admin/program/{id}/edit', 'ProgramController@edit')->name('admin.program.edit');
Route::patch('/admin/program/{id}', 'ProgramController@update')->name('admin.program.update');
Route::delete('/admin/program/{id}', 'ProgramController@destroy')->name('admin.program.destroy');

// Route for kegiatan
Route::get('/admin/kegiatan/create', 'KegiatanController@create')->name('admin.kegiatan.create');
Route::get('/admin/kegiatan/{kegiatan}', 'KegiatanController@show')->name('admin.kegiatan.show');
Route::post('/admin/kegiatan', 'KegiatanController@store')->name('admin.kegiatan.store');
Route::delete('/admin/kegiatan/{kegiatan}', 'KegiatanController@destroy')->name('admin.kegiatan.destroy');
Route::get('/admin/kegiatan/{kegiatan}/edit', 'KegiatanController@edit')->name('admin.kegiatan.edit');
Route::patch('/admin/kegiatan/{id}', 'KegiatanController@update')->name('admin.kegiatan.update');

// Route for uraian
Route::get('/admin/uraian', 'UraianController@index')->name('admin.uraian.index');
Route::get('/admin/uraian/create', 'UraianController@create')->name('admin.uraian.create');
Route::post('/admin/uraian/create', 'UraianController@store')->name('admin.uraian.store');
Route::get('/admin/uraian/{id}', 'UraianController@show')->name('admin.uraian.show');
Route::get('/admin/uraian/{id}/edit', 'UraianController@edit')->name('admin.uraian.edit');
Route::patch('/admin/uraian/{id}', 'UraianController@update')->name('admin.uraian.update');
Route::delete('/admin/uraian/{id}', 'UraianController@destroy')->name('admin.uraian.destroy');

// Route for sub uraian
Route::get('/admin/sub_uraian/create', 'SubUraianController@create')->name('admin.sub_uraian.create');
Route::post('/admin/sub_uraian/create', 'SubUraianController@store')->name('admin.sub_uraian.store');
Route::get('/admin/sub_uraian/{id}', 'SubUraianController@show')->name('admin.sub_uraian.show');
Route::get('/admin/sub_uraian/{id}/edit', 'SubUraianController@edit')->name('admin.sub_uraian.edit');
Route::patch('/admin/sub_uraian/{id}', 'SubUraianController@update')->name('admin.sub_uraian.update');
Route::delete('/admin/sub_uraian/{id}', 'SubUraianController@destroy')->name('admin.sub_uraian.destroy');

// Route for sub2 uraian
Route::get('/admin/sub2_uraian/create', 'Sub2UraianController@create')->name('admin.sub2_uraian.create');
Route::post('/admin/sub2_uraian/create', 'Sub2UraianController@store')->name('admin.sub2_uraian.store');
Route::get('/admin/sub2_uraian/{sub2Uraian}', 'Sub2UraianController@show')->name('admin.sub2_uraian.show');
Route::get('/admin/sub2_uraian/{sub2Uraian}/edit', 'Sub2UraianController@edit')->name('admin.sub2_uraian.edit');
Route::patch('/admin/sub2_uraian/{sub2Uraian}', 'Sub2UraianController@update')->name('admin.sub2_uraian.update');
Route::delete('/admin/sub2_uraian/{sub2Uraian}', 'Sub2UraianController@destroy')->name('admin.sub2_uraian.destroy');

// Route for sub3 uraian
Route::get('/admin/sub3_uraian/create', 'Sub3UraianController@create')->name('admin.sub3_uraian.create');
Route::post('/admin/sub3_uraian/create', 'Sub3UraianController@store')->name('admin.sub3_uraian.store');
Route::get('/admin/sub3_uraian/{sub3Uraian}', 'Sub3UraianController@show')->name('admin.sub3_uraian.show');
Route::get('/admin/sub3_uraian/{sub3Uraian}/edit', 'Sub3UraianController@edit')->name('admin.sub3_uraian.edit');
Route::patch('/admin/sub3_uraian/{id}', 'Sub3UraianController@update')->name('admin.sub3_uraian.update');
Route::delete('/admin/sub3_uraian/{sub3Uraian}', 'Sub3UraianController@destroy')->name('admin.sub3_uraian.destroy');

// Route for sub 4 uraian
Route::get('/admin/sub4uraian/create', 'Sub4UraianController@create')->name('admin.sub4uraian.create');
Route::post('/admin/sub4uraian/create', 'Sub4UraianController@store')->name('admin.sub4uraian.store');
Route::get('/admin/sub4uraian/{id}', 'Sub4UraianController@show')->name('admin.sub4uraian.show');
Route::get('/admin/sub4uraian/{id}/edit', 'Sub4UraianController@edit')->name('admin.sub4uraian.edit');
Route::patch('/admin/sub4uraian/{id}', 'Sub4UraianController@update')->name('admin.sub4uraian.update');
Route::delete('/admin/sub4uraian/{id}', 'Sub4UraianController@destroy')->name('admin.sub4uraian.destroy');

// Route for item
Route::get('/admin/item/create', 'ItemController@create')->name('admin.item.create');
Route::post('/admin/item/create', 'ItemController@store')->name('admin.item.store');
Route::get('/admin/item/{item}', 'ItemController@show')->name('admin.item.show');
Route::get('/admin/item/{item}/edit', 'ItemController@edit')->name('admin.item.edit');
Route::patch('/admin/item/{item}', 'ItemController@update')->name('admin.item.update');
Route::delete('/admin/item/{item}', 'ItemController@destroy')->name('admin.item.destroy');

// Route for anggaran
Route::get('/anggaran', 'DetailKegiatanController@index')->name('anggaran.index');
Route::get('/anggaran/create', 'DetailKegiatanController@create')->name('anggaran.create');
Route::post('/anggaran/create', 'DetailKegiatanController@store')->name('anggaran.store');
Route::get('/anggaran/{id}', 'DetailKegiatanController@show')->name('anggaran.show');
Route::get('/anggaran/{detailKegiatan}/edit', 'DetailKegiatanController@edit')->name('anggaran.edit');
Route::patch('/anggaran/{detailKegiatan}', 'DetailKegiatanController@update')->name('anggaran.update');
Route::delete('/anggaran/{id}', 'DetailKegiatanController@destroy')->name('anggaran.destroy');
Route::post('/anggaran/fetch', 'DetailKegiatanController@fetch')->name('anggaran.fetch');

// Route for detail item
Route::get('/anggaran/item', 'DetailItemController@index')->name('anggaran.item.index');
Route::get('/anggaran/item/create', 'DetailItemController@create')->name('anggaran.item.create');
Route::post('/anggaran/item/create', 'DetailItemController@store')->name('anggaran.item.store');
Route::get('/anggaran/item/{id}', 'DetailItemController@show')->name('anggaran.item.show');
Route::get('/anggaran/item/{detailKegiatan}/edit', 'DetailItemController@edit')->name('anggaran.item.edit');
Route::patch('/anggaran/item/{detailKegiatan}', 'DetailItemController@update')->name('anggaran.item.update');
Route::delete('/anggaran/item/{id}', 'DetailItemController@destroy')->name('anggaran.item.destroy');

// Route for ajax
Route::post('/anggaran/item/fetch', 'DetailItemController@fetch')->name('anggaran.item.fetch');
Route::get('/anggaran/item/fetch/{id}', 'DetailItemController@get')->name('anggaran.item.get');

// Route for kuitansi
Route::post('/kuitansi', 'KuitansiController@store')->name('kuitansi.print');