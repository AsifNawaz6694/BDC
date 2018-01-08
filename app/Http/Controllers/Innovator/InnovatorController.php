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
<<<<<<< HEAD
    	return view('application.innovator.index');
=======
        $listings = Listing::where('user_id', Auth::user()->id)->orderBy('id')->take(3)->get();
    	return view('application.innovator.index', compact('listings'));
>>>>>>> b2d6698b0b67dba81b129942f31611adf9d08f84
    }

    //Innovator Profile page
    public function profile_index(){
       return view('application.innovator.profile');
    }

<<<<<<< HEAD
    //Innovator nitifications page
=======
    //Innovator notifications page
>>>>>>> b2d6698b0b67dba81b129942f31611adf9d08f84
    public function notifications_index(){
    	return view('application.innovator.notification');
    }

    //Innovator listings
    public function listings(){
<<<<<<< HEAD
        $listings = Listing::where('user_id', Auth::user()->id)->get();
        dd($listings->user);
    	return view('application.innovator.listing');
=======

        $listings = Listing::where('user_id', Auth::user()->id)->get();
    	return view('application.innovator.listing', compact('listings'));
>>>>>>> b2d6698b0b67dba81b129942f31611adf9d08f84
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



    //ajax post route submit new listing
    public function submit_listing_post(ListingRequest $request){

        $listing = Listing::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->product,
            'title' => $request->title,
            'funding' => $request->funding,
<<<<<<< HEAD
            'description' => $request->description,
            'status' => 0,
=======
            'description' => $request->description
>>>>>>> b2d6698b0b67dba81b129942f31611adf9d08f84
        ]);
        if($request->hasFile('file')){
            $path = $request->file('file')->store('public/files');
            $update = Listing::where('id', $listing->id)->update([
                'document' => $path,
            ]);
            if(!$update){
<<<<<<< HEAD
                return \Response()->json(['warning' => "Listing successfully created, but file was unable to upload", 'code' => 205]);
=======
                return \Response()->json(['warning' => "Listing successfully created, but file was unable to upload", 'code' => 205, 'url' => route('innovator_listings')]);
>>>>>>> b2d6698b0b67dba81b129942f31611adf9d08f84
            }
            else{
                return \Response()->json(['success' => "Listing successfully created, and pending for approval", 'code' => 200]);
            }
        }
        elseif ($listing){
            return \Response()->json(['success' => "Listing successfully created, and pending for approval", 'code' => 200]);
        }
        else{
            return \Response()->json(['warning' => "Failed to create new listing.", 'code' => 202]);
        }
    }
}
