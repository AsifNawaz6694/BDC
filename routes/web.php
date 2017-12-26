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

	use App\User;
	Route::group(['prefix'=>'admin','middleware' => 'is-admin']
	,function(){
	Route::get('/admin', 'Admin\AdminPagesController@Backend');
	});

	Route::get('/', function () {    return view('welcome'); });

	// Auth::routes();

	// Route::get('/home', 'HomeController@index')->name('home');

	// Auth::routes();

	// Route::get('/home', 'HomeController@index')->name('home');

	// Route::get('/login', 'Auth\LoginController@login')->name('login');
	// Route::get('/users', function(){
	// 	$users = User::all();
	// 	dd($users);
	// });

	// Route::get('/irfan', 'HomeController@logi1n');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
