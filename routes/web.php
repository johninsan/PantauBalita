<?php
Route::get('/', 'HomeController@index')->name('home');
//auth routes
Route::post('/registerpost', 'HomeController@registerPost')->name('registerpost');
//article
Route::get('isiarticle/{post}', 'FrontController@isipost')->name('isi');
Route::get('/show', 'FrontController@showpost')->name('showpost');
Route::get('post/tag/{tag}', 'FrontController@tag')->name('tag');
Route::get('post/category/{category}', 'FrontController@category')->name('category');
//posyandus
Route::get('/showPosyandu', 'FrontController@showposyandu')->name('showposyandu');
Route::get('/isiposyandu/{id}', 'FrontController@isiposyandu')->name('isiposyandu');
//pesan routes
Route::get('pesan/detail/{kode}', 'PesanController@getDetailMessageOrtu')->name('pesandetailortu');
Route::get('pesanpetugas/detail/{kode}', 'PesanController@getDetailMessagePetugas')->name('pesandetailpetugas');
Route::get('/pesanortu', 'PesanController@pesanortu')->name('pesanortu');
Route::get('/pesanpetugas', 'PesanController@pesanpetugas')->name('pesanpetugas');
Route::post('messagePost', 'PesanController@messagePost')->name('messagePost');
Route::post('messageReply', 'PesanController@messageReply')->name('messageReply');
//actor routes
Route::group(['namespace' => 'OrangTua'], function () {
	Route::get('listpetugas', 'OrangTuaController@showpetugas')->name('showpetugas');
	Route::get('/isipetugas/{id}', 'OrangTuaController@isipetugas')->name('isipetugas');
});
Route::group(['namespace' => 'Balita'], function () {
	Route::resource('PantauBalita/DaftarBalita', 'BalitaController');
	Route::get('/monitorBalita/{id}', 'MonitorController@index')->name('monitor');
	Route::get('/HasilMonitorBalita/{kode}', 'MonitorController@hasilmonitor')->name('hasilmonitor');
	Route::post('/hasilgizi', 'MonitorController@perhitungan')->name('hasil');
	Route::get('/listhasil/{id}', 'MonitorController@listhasil')->name('listbalita');
	Route::get('/databalita/{id}', 'BalitaController@isidata')->name('isidata');
});
Route::group(['namespace' => 'Posyandu'], function () {
	Route::resource('PantauBalita/Posyandu', 'PosyanduController');
});
Route::group(['namespace' => 'post'], function () {
	Route::resource('PantauBalita/post', 'PostController');
	Route::resource('PantauBalita/tag', 'TagController');
	Route::resource('PantauBalita/category', 'CategoryController');
});
//admin routes
Route::group(['namespace' => 'Admin'], function () {
	Route::post('/loginpost', 'loginController@loginpost')->name('loginpost');
	Route::post('/adminlogout', 'loginController@adminlogout')->name('adminlogout');
	Route::get('admin-login', 'loginController@adminlogin');
	Route::get('admin/home', 'loginController@index');
	Route::resource('admin/role', 'RoleController');
	Route::resource('admin/permission', 'PermissionController');
});
//graf routes
Route::get('graf/{rw1}/{bulan1}', 'GrafController@showgraf')->name('showgraf');
Route::get('cekgizi', 'GrafController@pilihgraf')->name('cekgizi');
Route::post('/datapost', 'GrafController@gizibulan')->name('gizibulan');
// Route::get('bulan', 'GrafController@getBulanMonitorData');
// Route::get('/', function () {
//     return view('homepage.home');
// });

Auth::routes();
