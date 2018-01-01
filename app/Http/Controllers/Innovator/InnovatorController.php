<?php

namespace App\Http\Controllers\Innovator;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class InnovatorController extends Controller
{   
    //Innovator Index page
    public function index(){
    	return view('application.innovator.index');
    }

    //Innovator Profile page
    public function profile_index(){
       return view('application.innovator.profile');
    }

    //Innovator nitifications page
    public function notifications_index(){
    	return view('application.innovator.notification');
    }

    //Innovator listings
    public function listings(){
    	return view('application.innovator.listing');
    }

    //Innovator submit listings page
    public function submit_listing_page(){
     	return view('application.innovator.submit_listing');   	
    }

    //Innovator contact admin page.
    public function contact_admin_page(){
     	return view('application.innovator.contact_admin');   	
    }

    //Innovator Request services page
    public function request_services_page(){
        return view('application.innovator.request_services');       
    }  

    //Innovator Transactions page.
    public function transaction_page(){
        return view('application.innovator.transactions');       
    }          
}
