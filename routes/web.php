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

<<<<<<< HEAD
// <-------------------------------User's Controller Routes Started--------------------------------------------->
	Route::resource('/users','Admin\UsersController');	
	// Route::get('users/delete/{id}', ['as' => 'delete-user', 'uses' => 'Admin\UsersController@destroy']);	
	// Route::get('users/edit/{id}', ['as' => 'edit-user', 'uses' => 'Admin\UsersController@edit']);
// <-----------------------------------User's Controller Routes Ended-------------------------------------------->
=======
	// Users Cotroller full resource
	Route::resource('/users','Admin\UsersController.');	
>>>>>>> 2a07280acc2aa6b0a4c69fe58b03aac114f24f2c

	// Category Controller Full resource 
	Route::resource('/category','Admin\CategoryController');
<<<<<<< HEAD
	// Route::get('category/delete/{id}', ['as' => 'delete-category', 'uses' => 'Admin\CategoryController@destroy']);
	// Route::get('category/edit/{id}', ['as' => 'edit-category', 'uses' => 'Admin\CategoryController@edit']);
// <------------------------------Category's Controller Routes Ended--------------------------------------------->
=======
	
>>>>>>> 2a07280acc2aa6b0a4c69fe58b03aac114f24f2c

});




// Public Pages
Route::get('/', 'HomeController@index')->name('/');
Route::get('/{slug}', 'HomeController@publicPages')->name('publicPages');

// Auth Routes
Auth::routes();

