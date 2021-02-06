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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'Admin\BlogController@index');

Auth::routes(['reset'=>false]); 

Route::get('/isi-post/{slug}', 'Admin\BlogController@isi_blog')->name('blog.isi');
Route::get('/list-post','Admin\BlogController@list_blog')->name('blog.list');
Route::get('/list-kategori/{slug}','Admin\BlogController@list_kategori')->name('blog.kategori');
Route::get('/list-tag/{slug}','Admin\BlogController@list_tag')->name('blog.tag');
Route::get('/list-user/{slug}','Admin\BlogController@list_user')->name('blog.user');
Route::get('/cari','Admin\BlogController@cari')->name('blog.cari');

Route::group(['middleware'=>['auth','checkLevel:admin']], function(){
	//Kategori
	Route::resource('/kategori', 'Admin\KategoriController');
	Route::get('/kategori/{id}/delete','Admin\KategoriController@destroy');
	//Tag
	Route::resource('/tag', 'Admin\TagController');
	Route::get('/tag/{id}/delete','Admin\TagController@destroy');
	//User
	Route::resource('/user', 'Admin\UserController');
	Route::get('/user/{id}/delete','Admin\UserController@destroy');
	//Post
	Route::get('/post/status/{id}', 'Admin\PostController@status')->name('post.status');
	//Komentar
	Route::resource('/komentar', 'Admin\KomentarController');
	Route::get('/komentar/{id}/delete','Admin\KomentarController@destroy');
});

Route::group(['middleware'=>['auth']], function(){
	Route::get('/home', 'Admin\HomeController@index')->name('home');
	//Post
	Route::resource('/post', 'Admin\PostController');
	Route::get('/post/{id}/delete','Admin\PostController@destroy');
	Route::get('/sampah', 'Admin\PostController@sampah')->name('post.sampah');
	Route::get('/restore_sampah/{id}', 'Admin\PostController@restore_sampah')->name('post.restore_sampah');
	Route::get('/hapus_permanen/{id}', 'Admin\PostController@hapus_permanen')->name('post.hapus_permanen');
	//User
	Route::get('/user/edit/{id}','Admin\UserController@edit')->name('user.edit');
	Route::put('/user/update/{id}','Admin\UserController@update')->name('user.update');
	Route::get('/detail_user','Admin\UserController@detail_user')->name('user.detail_user');
	Route::post('/komentar}','Admin\BlogController@tambah_komentar')->name('komentar.create');
});
