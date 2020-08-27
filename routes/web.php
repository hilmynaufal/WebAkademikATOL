<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'SiswaController@index');

Route::get('/siswa', "SiswaController@index");
Route::post('/siswa/tambah', "SiswaController@store");
Route::post('/siswa/update', "SiswaController@update");
Route::get('/siswa/hapus/{id}', "SiswaController@destroy");

Route::get('/guru', "GuruController@index");
Route::post('/guru/tambah', "GuruController@store");
Route::post('/guru/update', "GuruController@update");
Route::get('/guru/hapus/{id}', "GuruController@destroy");

Route::get('/pelajaran', "PelajaranController@index");
Route::post('/pelajaran/tambah', "PelajaranController@store");
Route::post('/pelajaran/update', "PelajaranController@update");
Route::get('/pelajaran/hapus/{id}', "PelajaranController@destroy");

Route::get('/jadwal', "JadwalController@index");
Route::post('/jadwal/tambah', "JadwalController@store");
Route::post('/jadwal/update', "JadwalController@update");
Route::get('/jadwal/hapus/{id}', "JadwalController@destroy");

Route::get('/nilai', "NilaiController@index");
Route::get('/nilai/{id}', "NilaiController@show");
Route::post('/nilai/tambah', "NilaiController@store");
Route::post('/nilai/update', "NilaiController@update");
Route::get('/nilai/hapus/{id}/pelajaran/{id2}', "NilaiController@destroy");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', function () {
	return view('logintest');
});