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
// <-----------------------------------------Admin Routes Started----------------------------------------------->

	Route::group(['prefix'=>'admin','middleware' => 'is-admin']	,function(){
	Route::get('/admin', 'Admin\AdminPagesController@Backend')->name('adminBackend');

// <-------------------------------User's Controller Routes Started--------------------------------------------->
	Route::resource('/users','Admin\UsersController');	
	Route::get('users/delete/{id}', ['as' => 'delete-user', 'uses' => 'Admin\UsersController@destroy']);	
	Route::get('users/edit/{id}', ['as' => 'edit-user', 'uses' => 'Admin\UsersController@edit']);
// <-----------------------------------User's Controller Routes Ended-------------------------------------------->

// <------------------------------Category's Controller Routes Started------------------------------------------->
	Route::resource('/category','Admin\CategoryController');
	Route::get('category/delete/{id}', ['as' => 'delete-category', 'uses' => 'Admin\CategoryController@destroy']);
	Route::get('category/edit/{id}', ['as' => 'edit-category', 'uses' => 'Admin\CategoryController@edit']);
// <------------------------------Category's Controller Routes Ended--------------------------------------------->

	});
// <----------------------------------------- Admin Routes Ended ------------------------------------------------>

// <-----------------------------------------Funder Routes Started----------------------------------------------->

	Route::group(['prefix'=>'funder','middleware' => 'is-funder']	,function(){
	Route::get('/funder', 'Funder\FunderPagesController@Backend')->name('funderBackend');		
	});

// <-----------------------------------------Funder Routes Ended------------------------------------------------->

// <-----------------------------------------Public Routes Started----------------------------------------------->

Route::get('/', function () {  return view('welcome'); })->name('/');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// <-----------------------------------------Public Routes Ended ------------------------------------------------>

	
