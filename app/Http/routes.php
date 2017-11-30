<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/',[
'uses' => 'UserController@getHome',
'as' => 'home'
]);


Route::group(['middleware'=>'guest'],function(){

	Route::post('/signup',[
		'uses'=>'UserController@postSignup',
		'as' => 'user.signup'
	]);

	Route::get('/login',[
		'uses' => 'UserController@getLogin',
		'as'=> 'user.login'
	]);

	Route::post('/login',[
		'uses' => 'UserController@postLogin',
		'as'=>'user.login'
	]);

});




Route::get('/logout',[
	'uses' => 'UserController@getLogout',
	'as' => 'user.logout',
	'middleware' => 'auth'
]);


Route::group(['prefix'=>'user','middleware'=>'user'],function(){

	Route::get('/profile',[
	'uses'=> 'UserController@getProfile',
	'as'=> 'user.profile'
	]);

	Route::post('/update_profile',[
		'uses'=> 'UserController@postUpdateProfile',
		'as' => 'user.update'
	]);

	Route::get('/buku',[
		'uses' => 'UserController@getBuku',
		'as' => 'user.buku'
	]);


	Route::get('/pinjam/{book_id}',[
		'uses' => 'UserController@getPinjamBuku',
		'as' => 'user.pinjam'
	]);

	Route::post('/pinjam/{book_id}',[
		'uses' => 'UserController@postPinjamBuku',
		'as' => 'user.pinjam'
	]);

	Route::get('/transaksi',[
		'uses' => 'UserController@getTransaksi',
		'as'   => 'user.transaksi'
	]);



});

Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){

	Route::get('/profile',[
		'uses'=>'AdminController@getProfile',
		'as'=>'admin.profile'
	]);

	Route::get('/tabel_buku',[
		'uses' => 'AdminController@getBookTables',
		'as' => 'admin.book_tables'
	]);

	Route::post('/update_admin',[
		'uses' => 'AdminController@postUpdateAdmin',
		'as' =>  'admin.update'
	]);

	Route::get('/create_book',[
		'uses' => 'AdminController@getCreateBook',
		'as' => 'admin.create'
	]);

	Route::post('/create_book',[
		'uses' => 'AdminController@postCreateBook',
		'as' => 'admin.create'
	]);

	Route::get('/delete-book/{book_id}',[
		'uses'=> 'AdminController@getDeleteBook',
		'as'=> 'book.delete'
	]);

	Route::get('/edit/{book_id}',[
		'uses' => 'AdminController@getEditBook',
		'as' => 'book.edit'
	]);

	Route::post('/edit/{book_id}',[
		'uses' => 'AdminController@postEditBook',
		'as' => 'book.edit'
	]);

	Route::get('/daftar_user',[
		'uses' => 'AdminController@getLihatUser',
		'as' => 'user.view'
	]);

	Route::get('/daftar_denda',[
		'uses' => ' AdminController@modalDenda',
		'as' => 'user.denda'
	]);

	Route::get('/detail/{user_id}',[
		'uses' => 'AdminController@getuserDetail',
		'as' => 'user.detail'
	]);

	Route::post('/transaksi_selesai/{id_transaksi}',[
		'uses' => 'AdminController@postTransaksiSelesai',
		'as' => 'admin.transaksi_selesai'
	]);

});