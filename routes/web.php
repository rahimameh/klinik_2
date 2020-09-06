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

Route::get('/', function () {
    return view('welcome');
});            
Route::group(['middleware' => ['auth','CheckRole:admin']],function(){
                 //---------------BUAT MASTER PASIEN
                 // jalanin view tambah,di fungsi tambah() yg ada d controller
                 Route::get('/pasien/tambah','PasienController@tambah');
                 // route untuk menangkap data dari view tambah,di pproses di controller
                 Route::post('/pasien/store','PasienController@store');
                 Route::get('/pasien/edit/{id}','PasienController@edit');
                 // proses form edit
                 Route::put('/pasien/update/{id}','PasienController@update');
                 Route::get('/pasien/delete/{id}', 'PasienController@delete');
                
                 Route::get('/pasien/cetak_pdf', 'PasienController@cetak_pdf');
                
         
                 //---------------buat master dokter
                 Route::get('/dokter','DokterController@index');
                 Route::get('/dokter/tambah','DokterController@tambah');
                 Route::post('/dokter/store','DokterController@store');
                 Route::get('/dokter/edit/{id}','DokterController@edit');
                 Route::put('/dokter/update/{id}','DokterController@update');
                 Route::get('/dokter/delete/{id}', 'DokterController@delete');
         
                   //liyat user
                   Route::get('/pengguna','UserController@index');
                 Route::get('/user','UserController@index');
                 Route::get('/user/delete/{id}', 'UserController@delete');


                 ///// buat master antrian
                 Route::get('/antrian','AntrianController@index');
                 Route::get('/antrian/{id}','AntrianController@index')->name('antri');
                 Route::get('/antrian/tambah/{id}','AntrianController@tambah');
                 Route::post('/antrian/store','AntrianController@store');
                 Route::get('/antrian/edit/{id}','AntrianController@edit');
                 Route::put('/antrian/update/{id}','AntrianController@update');
                 Route::get('/antrian/delete/{id}', 'AntrianController@delete');

               
});
Route::group(['middleware' => ['auth','CheckRole:dokter,admin']],function(){
    Route::get('/pasien','PasienController@index');
    Route::get('/pasien/cari','PasienController@cari');
    Route::get('/rm/{id}','RmController@index')->name('rm');
    Route::get('/rm/cetak_pdf/{id}', 'RmController@cetak_pdf');
      Route::get('/rm/tambahrm/{id}','RmController@tambahrm');
    Route::get('/rm/filter/{id}','RmController@filter')->name('filter');
});

Route::group(['middleware' => ['auth','CheckRole:dokter']],function(){
    Route::get('/rm/delete/{id}', 'RmController@delete')->name('rmdlt');
    Route::post('/rm/store','RmController@store');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
