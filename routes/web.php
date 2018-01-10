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

Route::get('/bahar_nikal','Admin\AdminPagesController@admin_logout')->name('chal_nikal');
	//Admin Panel Routes Started
Route::get('/admin', 'Admin\AdminPagesController@Backend')->name('adminBackend');
//Admin Profile Route
Route::get('/profile','Admin\AdminProfileController@index')->name('admin_profile');
//Admin Logout Route
	

	// Update Admin Profile Image
	Route::any('/updateInfo/{id}/',["as" => "admin-update-info", "uses" => "Admin\AdminProfileController@update"]);
	Route::any('/updatePassword/',["as" => "update-password", "uses" => "Admin\AdminProfileController@Updatepasword"]);
	Route::post('/updateImage/{id}/',["as" => "admin-update-image", "uses" => "Admin\AdminProfileController@ChangeProfileImage"]);
// <------------------------------Profile's Controller Routes Ended-------------------------------------------->

// <-------------------------------User's Controller Routes Started-------------------------------------------->
	Route::resource('/users','Admin\UsersController');	
// <-----------------------------------User's Controller Routes Ended------------------------------------------>

// <-------------------------------Category's Controller Routes Started---------------------------------------->
	Route::resource('/category','Admin\CategoryController');	
// <------------------------------Category's Controller Routes Ended------------------------------------------->

// <------------------------------Listing's Controller Routes Started------------------------------------------>
	Route::resource('/listing','Admin\ListingController');
	// DisApprove/Approve Listing Status
	Route::get('/approve_status/{id}/',["as" => "approve-status", "uses" => "Admin\ListingController@approve_status"]);
	Route::get('/disapprove_status/{id}/',["as" => "disapprove-status", "uses" => "Admin\ListingController@disapprove_status"]);
	// Disapprove/Approve Listing Featured
	Route::get('/approve_featured/{id}/',["as" => "approve-featured", "uses" => "Admin\ListingController@approve_featured"]);
	Route::get('/disapprove_featured/{id}/',["as" => "disapprove-featured", "uses" => "Admin\ListingController@disapprove_featured"]);

	 Route::get('/download_file/{file_name}/',["as" => "download-file", "uses" => "Admin\ListingController@admin_download"]);
// <------------------------------Listing's Controller Routes Ended-------------------------------------------->

//Admin Panel Routes Ended

    Route::get('/admin', 'Admin\AdminPagesController@Backend')->name('adminBackend');
    Route::get('/logout', function (){
        return view('Admin_panel\logout');
    });


	// Profile Controller 
	Route::get('/profile','Admin\AdminProfileController@index')->name('admin_profile');
	// Update Admin Profile Image
	Route::any('/updateInfo/{id}/',["as" => "admin-update-info", "uses" => "Admin\AdminProfileController@update"]);
	// Route::any('/updatePassword/',["as" => "update-password", "uses" => "Admin\AdminProfileController@Updatepasword"]);
	Route::post('/updateImage/{id}/',["as" => "admin-update-image", "uses" => "Admin\AdminProfileController@ChangeProfileImage"]);


	// Users Cotroller full resource
	Route::resource('/users','Admin\UsersController');

	// Category Controller Full resource 
	Route::resource('/category','Admin\CategoryController');



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

    //Innovator edit listing page
    Route::get('/edit_listing/{id}', 'Innovator\InnovatorController@edit_listing_page')->name('edit_listing_page');

	//Innovator submit listing form post
	Route::post('/submit_listing', 'Innovator\InnovatorController@submit_listing_post')->name('submit_listing_post');

    //Innovator submit listing form post
    Route::post('/edit_listing', 'Innovator\InnovatorController@edit_listing_post')->name('edit_listing_post');

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
Route::get('/email/email', 'HomeController@email')->name('email');
Route::post('/registration', 'Auth\RegisterController@create')->name('registration');
// Auth Routes
Auth::routes();

//Ajax routes for logged in users
Route::group(['prefix' => 'ajax', 'middleware' => 'auth'], function(){
    Route::post('profile_picture', 'GeneralController@profile_picture')->name('ajaxProfilePicture');
    Route::post('profile_update', 'GeneralController@profile_update')->name('ajaxProfileUpdate');
    Route::post('password_update', 'GeneralController@password_update')->name('ajaxPasswordUpdate');
});


Route::get('/paypal/checkout/{id}', 'PaymentController@checkout')->name('checkout');
Route::get('/paypal/paypalReturn', 'PaymentController@getDone')->name('getDone');
Route::get('/paypal/paypalCancel', 'PaymentController@getCancel')->name('getCancel');

