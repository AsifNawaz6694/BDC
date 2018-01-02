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
// Admin Routes

Route::group(['prefix'=>'admin','middleware' => 'is-admin']	,function(){
	Route::get('/admin', 'Admin\AdminPagesController@Backend')->name('adminBackend');


// <-------------------------------User's Controller Routes Started--------------------------------------------->
	Route::resource('/users','Admin\UsersController');	
// <-----------------------------------User's Controller Routes Ended-------------------------------------------->

	// Users Cotroller full resource
	Route::resource('/users','Admin\UsersController');
	// Category Controller Full resource 
	Route::resource('/category','Admin\CategoryController');	
// <------------------------------Category's Controller Routes Ended--------------------------------------------->

});

Auth::routes();
// Public Pages
Route::get('/', 'HomeController@index')->name('/');
Route::get('/{slug}', 'HomeController@publicPages')->name('publicPages');
Route::post('/registration', 'Auth\RegisterController@create')->name('registration');
// Auth Routes

