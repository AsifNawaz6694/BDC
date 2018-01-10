<?php

namespace App\Http\Controllers\Innovator;
use App\Http\Controllers\Controller;
use App\Http\Requests\ListingRequest;
use Illuminate\Http\Request;
use App\Listing;
use App\Notification;
use Auth;
use Mail;
use App\Mail\Welcome;
use App\Notifications\ListingApproved;
use App\Notifications\ListingDisApproved;
use App\Notifications\FeaturedApproved;
use App\Notifications\FeaturedDisApproved;
use Carbon\Carbon;
use Session;


use Illuminate\Support\Facades\Input;

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



    //Innovator nitifications page

    //Innovator notifications page


    //Innovator notifications page

    public function notifications_index(){

        $notifications = Notification::all();
    	return view('application.innovator.notification',['notifications'=>$notifications]);
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

            'description' => $request->description,
            'status' => 0,

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

    public function send(Request $request){
        //dd();
        $detail = $request->input();
        $user = Auth::user();

          if(Input::hasFile('addImg')){
            $file = Input::file('addImg');
            //$tmpFilePath = '/profiles/';
            // $tmpFileName = time() . '-' . $file->getClientOriginalName();
            // $file = $file->move(public_path() .$tmpFilePath, $tmpFileName);
            // $path = $tmpFilePath . $tmpFileName;
            // $user->profile = $path;
          }       

        \Mail::to('asifnawaz.aimviz@gmail.com')->send(new Welcome($detail, $file));
        Session::flash('success_msg','You have successfully Email Admin');
        return redirect()->back();
    }

    public function markAsRead(){
        $user = Auth::user();
        $user->unreadNotifications()->update(['read_at' => Carbon::now()]);
        return redirect()->back();
    }
     public function markAsSingleRead(Request $request){        
        $noti = Notification::where('id', $request->id)->update([
            'read_at' => Carbon::now()
        ]);    
        return redirect()->back();
    }

}
