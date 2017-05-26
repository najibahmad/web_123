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
    return view('index');
});
Route::get('auth/logout', function () {
  Auth::logout();
  return redirect('/');
});



Route::get('/detilberita/{id}/{judul}', 'PublicController@detilberita');
Route::get('/beritapublic/{id}', 'PublicController@publicberita');

Route::get('/static/{id}/{judul}', 'PublicController@staticpage');
Route::get('/dokumenlist/{id}', 'PublicController@dokumenlist');
Route::get('/pemerintahan/{id}', 'PublicController@pemerintahan');
Route::get('/muspidapublic', 'PublicController@muspida');
Route::get('/eksekutifpublic', 'PublicController@eksekutif');
Route::get('/beranda', 'PublicController@beranda');
Route::get('/', 'PublicController@index');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['web']], function () {

  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/post/{judul}', 'PostController@index');
  Route::post('/post','PostController@insertPost');
  Route::post('/upload','PostController@uploadImage');

  Route::resource('staticpage', 'StaticPageController');
  Route::get('/staticpage/{id}/edit/{gid}', 'StaticPageController@edit');
  Route::resource('berita', 'BeritaController');
  Route::resource('muspida', 'MuspidaController');
  Route::resource('eksekutif', 'EksekutifController');
  Route::resource('dinas', 'DinasController');
  Route::resource('badan', 'BadanController');
  Route::resource('bagian', 'BagianController');
  Route::resource('dokumen', 'DokumenDaerahController');

  Route::resource('kecamatan', 'KecamatanController');
  Route::resource('kelurahan', 'KelurahanController');

  Route::resource('aplikasi_daerah', 'AplikasiDaerahController');
  Route::resource('jaringan_informasi', 'JaringanInformasiController');
  Route::resource('agenda', 'AgendaController');

  Route::get('download-file/{id}', 'DokumenDaerahController@downloadFile');

  Route::resource('menu', 'MenuController');

});
