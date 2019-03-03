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
Route::group(['namespace' => 'OrangTua'], function () {
	Route::get('testyajra', 'OrangTuaController@testyajra')->name('testyajra');
});
Route::group(['namespace' => 'Balita'], function () {
	Route::resource('PantauBalita/DaftarBalita', 'BalitaController');
});
// Route::get('/', function () {
//     return view('homepage.home');
// });
Auth::routes();
