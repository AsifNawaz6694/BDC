<?php

namespace App\Http\Controllers\Funder;
use App\Http\Controllers\Controller;
	
use Illuminate\Http\Request;

class FunderController extends Controller
{
	//Funder Panel Index Page
    public function index(){
    	return view('application.funder.index');
    }

    //Funder Panel Profile Index
    public function profile_index(){
       return view('application.funder.profile');
    }

    //Notification Index
    public function notifications_index(){
    	return view('application.funder.notification');
    }

    //Funder view listings
    public function view_listings(){
    	return view('application.funder.viewed_listing');
    }

    //Funder request listings page
    public function request_listing(){
     	return view('application.funder.request_listing');   	
    }

    //Funder funding details
    public function fund_details(){
     	return view('application.funder.funded_details');   	
    }        
}
