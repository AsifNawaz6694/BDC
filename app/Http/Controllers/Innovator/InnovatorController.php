<?php

namespace App\Http\Controllers\Innovator;
use App\Http\Controllers\Controller;
use App\Http\Requests\ListingRequest;
use Illuminate\Http\Request;
use App\Listing;
use Auth;

class InnovatorController extends Controller
{   

    public function __construct()
    {
        $data = array();
    }

    //Innovator Index page
    public function index(){
        $listings = Listing::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->take(3)->get();
    	return view('application.innovator.index', compact('listings'));
    }

    //Innovator Profile page
    public function profile_index(){
       return view('application.innovator.profile');
    }

    //Innovator notifications page
    public function notifications_index(){
    	return view('application.innovator.notification');
    }

    //Innovator listings
    public function listings(){

        $listings = Listing::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        return view('application.innovator.listing', compact('listings'));
    }

    //Innovator submit listings page
    public function submit_listing_page(){
     	return view('application.innovator.submit_listing');   	
    }

    //Innovator submit listings page
    public function edit_listing_page($id){
        $listing = Listing::find($id);
//        dd($listing);
        return view('application.innovator.edit_listing', compact('listing'));
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



    //ajax post route submit new listing
    public function submit_listing_post(ListingRequest $request){

        $listing = Listing::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->product,
            'title' => $request->title,
            'funding' => $request->funding,
            'description' => $request->description
        ]);
        if($request->hasFile('file')){
            $path = $request->file('file')->store('public/files');
            $update = Listing::where('id', $listing->id)->update([
                'document' => $path,
            ]);
            if(!$update){
                return \Response()->json(['warning' => "Listing successfully created, but file was unable to upload", 'code' => 205, 'url' => route('innovator_listings')]);
            }
            else{
                return \Response()->json(['success' => "Listing successfully created, and pending for approval", 'code' => 200, 'url' => route('innovator_listings')]);
            }
        }
        elseif ($listing){
            return \Response()->json(['success' => "Listing successfully created, and pending for approval", 'code' => 200, 'url' => route('innovator_listings')]);
        }
        else{
            return \Response()->json(['error' => "Failed to create new listing.", 'code' => 202]);
        }
    }
}
