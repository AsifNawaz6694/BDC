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

// <-------------------------------Category's Controller Routes Started------------------------------------------>
	Route::resource('/category','Admin\CategoryController');	
// <------------------------------Category's Controller Routes Ended--------------------------------------------->


});


/* Funder Routes */
Route::group(['prefix'=>'funder', 'middleware' => 'is-funder'], function(){

	//Funder Home page
	Route::get('/', 'Funder\FunderController@index')->name('funder_home');
	
	//Funder profile page
	Route::get('/profile', 'Funder\FunderController@profile_index')->name('funder_profile');
	
	//Funder Notifications Page
	Route::get('/notifications', 'Funder\FunderController@notifications_index')->name('funder_notifications_index');
	
	//Funder listing views
	Route::get('/view_listings', 'Funder\FunderController@view_listings')->name('funder_view_listings');


	//Funder requested listings
	Route::get('/request_listing', 'Funder\FunderController@request_listing')->name('funder_request_listing');
	
	//Funder funding details
	Route::get('/fund_details', 'Funder\FunderController@fund_details')->name('funder_fund_details');	
});





/* Innovator Routes */

Route::group(['prefix'=>'innovator', 'middleware' => 'is-innovator'], function(){

	//Innovator home page
	Route::get('/', 'Innovator\InnovatorController@index')->name('innovator_home');
	
	//Innovator profile page
	Route::get('/profile', 'Innovator\InnovatorController@profile_index')->name('innovator_profile');
	
	//Innovator Notifications Page
	Route::get('/notifications', 'Innovator\InnovatorController@notifications_index')->name('innovator_notifications_index');
	
	//Innovator listing view
	Route::get('/listings', 'Innovator\InnovatorController@listings')->name('innovator_listings');

	//Innovator submit listing page
	Route::get('/submit_listing', 'Innovator\InnovatorController@submit_listing_page')->name('submit_listing_page');
	Route::post('/submit_listing', 'Innovator\InnovatorController@submit_listing_post')->name('submit_listing_post');

	//Innovator Contact Admin page
	Route::get('/contact_admin', 'Innovator\InnovatorController@contact_admin_page')->name('contact_admin_page');

	//Innovator request services page
	Route::get('/request_services', 'Innovator\InnovatorController@request_services_page')->name('request_services_page');

	//Transactions page
	Route::get('/transactions', 'Innovator\InnovatorController@transaction_page')->name('transaction_page');	

});


// Public Pages
Route::get('/', 'HomeController@index')->name('/');
Route::get('/{slug}', 'HomeController@publicPages')->name('publicPages');
Route::post('/registration', 'Auth\RegisterController@create')->name('registration');
// Auth Routes
Auth::routes();



//Ajax routes for logged in users

Route::group(['prefix' => 'ajax', 'middleware' => 'auth'], function(){
    Route::post('profile_picture', 'GeneralController@profile_picture')->name('ajaxProfilePicture');
    Route::post('profile_update', 'GeneralController@profile_update')->name('ajaxProfileUpdate');
    Route::post('password_update', 'GeneralController@password_update')->name('ajaxPasswordUpdate');
});
