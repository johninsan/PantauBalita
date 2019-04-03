<?php
Route::get('/', 'HomeController@index')->name('home');
//auth routes
Route::post('/loginpost', 'HomeController@loginpost');
Route::post('/registerpost', 'HomeController@registerPost')->name('registerpost');
//article
Route::get('isiarticle/{post}', 'FrontController@isipost')->name('isi');
Route::get('/show', 'FrontController@showpost')->name('showpost');
//posyandus
Route::get('/showPosyandu', 'FrontController@showposyandu')->name('showposyandu');
Route::get('/isiposyandu/{id}', 'FrontController@isiposyandu')->name('isiposyandu');
//pesan routes
Route::get('/pesandetailortu', 'PesanController@pesandetailortu')->name('pesandetailortu');
Route::get('/pesanortu', 'PesanController@pesanortu')->name('pesanortu');
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
