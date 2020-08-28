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

Auth::routes();

Route::get('/', function () {
 return view('auth/login');
});

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
Route::get('/nilai/hapus/{id}/pelajaran/{id2}/tahun/{id3}/semester/{id4}', "NilaiController@destroy");

Route::get('/kelas', "KelasController@index");
Route::post('/kelas/tambah', "KelasController@store");
Route::post('/kelas/update', "KelasController@update");
Route::get('/kelas/hapus/{id}', "KelasController@destroy");

Route::get('/tahun', "TahunController@index");
Route::post('/tahun/tambah', "TahunController@store");
Route::post('/tahun/update', "TahunController@update");
Route::get('/tahun/hapus/{id}', "TahunController@destroy");

Route::get('/semester', "SemesterController@index");
Route::post('/semester/tambah', "SemesterController@store");
Route::post('/semester/update', "SemesterController@update");
Route::get('/semester/hapus/{id}', "SemesterController@destroy");

Route::get('/laporan', 'LaporanController@index');
Route::get('/laporan/cetak_pdf/{id}/tahun/{id2}/semester/{id3}', 'LaporanController@cetak_pdf');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'LaporanController@test');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
