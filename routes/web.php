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

Route::get('/profil', function () {
  $pasien = Auth::user()->id;
  return view('pengguna.profil', compact('pasien'));//lihat profil sndri2
});
Route::get('/reset', function () {
  return view('auth.passwords.reset');//lihat profil sndri2
});
  Route::get('/', function () {
    return view('welcome');
});
// Route::get('/','DashController@index'); //semua
Route::get('/antrian','AntrianController@index');//admin n pasien

  
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
                //  Route::get('/pasien/cetak_pdf', 'PasienController@cetak_pdf');
                
                //---------------buat master dokter
                 Route::get('/dokter','DokterController@index');
                 Route::get('/dokter/tambah','DokterController@tambah');
                 Route::post('/dokter/store','DokterController@store');
                 Route::get('/dokter/edit/{id}','DokterController@edit');
                 Route::put('/dokter/update/{id}','DokterController@update');
                 Route::get('/dokter/delete/{id}', 'DokterController@delete');
         
                   //liyat master user user
                   Route::get('/user','UserController@index');//liyat a
                 Route::get('/user/delete/{id}', 'UserController@delete');
                 Route::get('/user/cari','UserController@cari');//admin


                 Route::get('/antrian/delete/{id}', 'AntrianController@delete');//admin
                
                           
               
                 Route::get('/laporan', 'AntrianController@laporan');//admin
                 Route::get('/cetak_laporan/{dari}/{sampai}', 'AntrianController@cetak');//admin

                });
Route::group(['middleware' => ['auth','CheckRole:dokter']],function(){
                  Route::get('/rm/tambahrm/{id}','RmController@tambahrm');//dokter
                  Route::get('/rm/delete/{id}', 'RmController@delete')->name('rmdlt');//dokter
                  Route::post('/rm/store','RmController@store');//dokter
                  Route::get('/rm/edit/{id}','RmController@edit');
        
                 // proses form edit
                 Route::put('/rm/update/{id}','RmController@update');
                 Route::get('/rm/delete/{id}', 'RmController@delete');
                });
Route::group(['middleware' => ['auth','CheckRole:pasien']],function(){
                 ///// buat master antrian
                 Route::get('/antrian/tambah/{id}','AntrianController@tambah');//pasien
                 Route::post('/antrian/store','AntrianController@store');//pasien
                 Route::get('/rmku/{id}','RmController@rmku');//pasien
                });

// ?
Route::group(['middleware' => ['auth','CheckRole:dokter,admin']],function(){
  Route::get('/pasien','PasienController@index')->name('pasien');;
  Route::get('/pasien/cari','PasienController@cari');//admin
                  });          
    
        Route::get('/rm/{id}','RmController@index')->name('rm');//dokter,admin, pasien khusus id ny sndri
       


Auth::routes();
Route::get('/home', 'DashController@index')->name('home');


// 
//});
// 