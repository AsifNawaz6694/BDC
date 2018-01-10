<?php

namespace App\Http\Controllers\Funder;
use App\Http\Controllers\Controller;
use App\Listing;
use App\Notification;
use Illuminate\Http\Request;
use App\Notifications\Funder\FunderListingApproved;
use App\Notifications\Funder\FunderListingDisApproved;
use App\Notifications\Funder\FunderFeaturedApproved;
use App\Notifications\Funder\FunderFeaturedDisApproved;
use Carbon\Carbon;
use Session;

class FunderController extends Controller
{

    public function __construct()
    {
        $data = array();
    }
	//Funder Panel Index Page
    public function index(){
        $listings = Listing::orderBy('id', 'desc')->take(3)->get();
    	return view('application.funder.index', compact('listings'));
    }
    //Funder Panel Profile Index
    public function profile_index(){
       return view('application.funder.profile');
    }

    //Notification Index
    public function notifications_index(){
        $notifications = Notification::all();
       // dd($notifications);
    	return view('application.funder.notification',['notifications'=>$notifications]);
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
