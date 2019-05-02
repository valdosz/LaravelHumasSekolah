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

Route::get('/', function () {
    return view('user.userinput');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/simpan', 'HumasController@save')->name('save');
Route::get('/hapustamu/{id}', 'HumasController@hapus');
Route::get('/tamukeluar/{id}', 'HumasController@keluar');
Route::get('/ubah_pass/{id}', 'HomeController@ubah');
Route::patch('/update_pass/{id}', 'HomeController@update');
Route::get('/inputtamu', function () {
    return view('pages.input');
});

Route::get('/tampildata', 'HumasController@tampil');
Route::get('/filter_orangtua', 'FilterController@orang_tua');
Route::get('filter_alumni', 'FilterController@alumni');
Route::get('filter_pengunjung', 'FilterController@pengunjung');
Route::get('/filter_hariini', 'FilterController@hari_ini');
Route::get('/filter_pertanggal', 'FilterController@pertanggal');
Route::post('/filter_pertanggal', 'FilterController@pertanggal');
Route::get('/dashs', 'FilterController@data_dash');
Route::get('/filter_datatamu', 'FilterController@datatamu');



//user
Route::get('/userinputtamu', function () {
    return view('user.userinput');
});
Route::get('/userdatatamu', 'FilterController@usertamu');
