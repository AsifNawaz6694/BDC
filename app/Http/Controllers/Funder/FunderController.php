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
use App\Request_listing;
use Auth;

class FunderController extends Controller
{

    public function __construct()
    {
        $data = array();
    }
	//Funder Panel Index Page
    public function index(){
        $listings = Request_listing::leftJoin('listings', 'request_listings.listing_id', '=', 'listings.id')->
                    leftjoin('categories', 'categories.id', '=', 'listings.category_id')
                    ->select('listings.description as descri', 'listings.*', 'categories.*', 'request_listings.*')
                    ->orderBy('listings.id', 'desc')->get(); 
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
        $listings = Request_listing::leftJoin('listings', 'request_listings.listing_id', '=', 'listings.id')->
                    leftjoin('categories', 'categories.id', '=', 'listings.category_id')
                    ->select('listings.description as descri', 'listings.*', 'categories.*', 'request_listings.*')->get(); 
        // dd($listings);
    	return view('application.funder.viewed_listing')->with('listings', $listings);
    }

    //Funder request listings page
    public function request_listing(){
        $listings = Listing::select('id','title')->get();
        return view('application.funder.request_listing')->with('listings', $listings);   	
    }

    //Funder funding details
    public function fund_details(){
     	return view('application.funder.funded_details');   	
    }

    //Submit request listing
    public function request_listing_submit(Request $request){

         $request_listing = new Request_listing();
         $request_listing->subject = $request->input('subject');
         $request_listing->listing_id = $request->input('title');
         $request_listing->message = $request->input('message');
         $request_listing->user_id = Auth::user()->id;

         if($request_listing->save()){
            Session::flash('success_msg','You Have Successfully Requested to view this listing');
         }else{
            Session::flash('err_message','You Have Not Successfully Requested to view this listing');
         }

         return redirect()->route('funder_request_listing');

        //return view('application.funder.request_listing')->with('listings', $listings);     
    }
}
