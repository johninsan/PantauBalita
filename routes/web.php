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
Route::get('/', 'HomeController@halamanawal')->name('home');
Route::get('/isiarticle', 'FrontController@isipost')->name('isi');
Route::get('/show', 'FrontController@showpost')->name('showpost');
Route::group(['namespace' => 'OrangTua'], function () {
	Route::get('testyajra', 'OrangTuaController@testyajra')->name('testyajra');
});
Route::group(['namespace' => 'Balita'], function () {
	Route::resource('PantauBalita/DaftarBalita', 'BalitaController');
	Route::get('monitorBalita', 'MonitorController@index')->name('monitor');
	Route::get('HasilMonitorBalita', 'MonitorController@hasilmonitor')->name('hasilmonitor');
});
Route::group(['namespace' => 'Posyandu'], function () {
	Route::resource('PantauBalita/Posyandu', 'PosyanduController');
});
Route::group(['namespace' => 'post'], function () {
	Route::resource('PantauBalita/post', 'PostController');
	Route::resource('PantauBalita/tag', 'TagController');
	Route::resource('PantauBalita/category', 'CategoryController');
});
// Route::get('/', function () {
//     return view('homepage.home');
// });
Auth::routes();
