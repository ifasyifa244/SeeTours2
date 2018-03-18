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
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'cors'],function(){
	Route::get('/listdata','APIController@Listdata');
});

Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin']], function(){
	
Route::resource('/objekwisata', 'ObjekWisataController');
Route::get('/objekwisatas/{id}', 'ObjekWisataController@kategori');
Route::resource('kontaks', 'KontakController');
Route::resource('/about', 'AboutController');
Route::resource('/hakakses', 'HakAksesController');
Route::resource('/kategori', 'KategoriController');


});

Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin|karyawan1']], function(){
Route::resource('/hotel', 'HotelController');
Route::post('/hotels', 'HotelController@lokasi');
Route::resource('/tempatoleholeh', 'TempatOlehOlehController');
Route::post('/tempatoleholehs', 'TempatOlehOlehController@lokasi');
Route::resource('/rumahmakan', 'RumahmakanController');
Route::post('/rumahmakans', 'RumahMakanController@lokasi');
});
Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin|karyawan2']], function(){
Route::resource('/spbu', 'SPBUController');
Route::post('/spbus', 'SPBUController@lokasi');
Route::resource('/atm', 'ATMController');
Route::post('/atms', 'ATMController@lokasi');
});





Route::get('/','FrontController@index');
Route::get('/filter/{id}','FrontController@filter');
Route::get('/filtersemua/{id}','FrontController@filtersemua');
Route::get('/filterhotel/{id}','FrontController@filterhotel');
Route::get('/filterrestoran/{id}','FrontController@filterrestoran');
Route::get('/filtertempatoleholeh/{id}','FrontController@filtertoleholeh');
Route::get('/filteratm/{id}','FrontController@filteratm');
Route::get('/filterspbu/{id}','FrontController@filterspbu');
Route::get('/detail/{id}','FrontController@detail');
Route::get('/detailhotel/{id}','FrontController@detailhotel');
Route::get('/detailrestoran/{id}','FrontController@detailrmakan');
Route::get('/detailtempatoleholeh/{id}','FrontController@detailtoleholeh');
Route::get('/profil','FrontController@profil');
Route::get('/kontak','FrontController@kontak');
Route::post('/kirim','FrontController@kirimpesan');
Auth::routes();


 

Route::group(['middleware'=>['auth']], function(){
Route::get('/home', 'HomeController@index')->name('home');	
Route::resource('/barang', 'BarangController');
Route::resource('/jasa', 'JasaController');
Route::resource('/pelanggan', 'PelangganController');
Route::resource('/supplier', 'SupplierController');
Route::resource('/pembelian', 'PembelianController');
Route::resource('/penjualan', 'PenjualanController');
});

Route::group(['middleware'=>['auth', 'role:owner']], function(){
Route::resource('/karyawan', 'KaryawanController');

Route::get('/laporanpenjualan', 'LaporanPenjualan@index');
Route::post('/laporanpenjualan/detail', 'LaporanPenjualan@index2');

Route::get('/laporanpembelian', 'LaporanPembelian@index');
Route::post('/laporanpembelian/detail', 'LaporanPembelian@index2');
});

Auth::routes();


