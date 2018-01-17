<?php

namespace App\Http\Controllers\Innovator;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\ListingRequest;
use App\RequestServices;
use App\Transaction;
use Illuminate\Http\Request;
use App\Listing;
use App\Notification;
use Auth;
use Mail;
use App\Events\listingProfile;
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
        $services = RequestServices::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->take(3)->get();

        $transactions = Transaction::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->take(3)->get();

    	return view('application.innovator.index', compact('listings', 'services', 'transactions'));

    }

    //Innovator Profile page
    public function profile_index(){
       return view('application.innovator.profile');
    }



    public function notifications_index(){

        $notifications = Notification::where('notifiable_id', Auth::user()->id)->get();
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
        $services = RequestServices::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('application.innovator.request_services', compact('services'));
    }  

    //Innovator Transactions page.
    public function transaction_page(){
        $transaction = Transaction::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('application.innovator.transactions', compact('transaction'));
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
        $abcd = event(new  listingProfile($listing));
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
      
      ini_set('max_execution_time', 300);
      
      $request->input('description_subject');
      $request->input('description_message'); 
      $request->file('addImg');      
   
      //Display File Name
      echo 'File Name: '.$request->file('addImg')->getClientOriginalName();
      echo '<br>';
   
      //Display File Extension
      echo 'File Extension: '.$request->file('addImg')->getClientOriginalExtension();
      echo '<br>';
   
      //Display File Size
      echo 'File Size: '.$request->file('addImg')->getSize();
      echo '<br>';
   
      //Display File Mime Type
      echo 'File Mime Type: '.$request->file('addImg')->getMimeType();
   
      //Move Uploaded File
      $destinationPath = 'public/email/';


    $path = $request->file('addImg')->store('public/email');

    //$path = realpath($request->file('addImg')->store('public/email'););
 
     $request->file('addImg')->move($destinationPath,$request->file('addImg')->getClientOriginalName());

      $sender_email = 'Customer@gmail.com';        
        Mail::send('email.welcome',[
          'request' => $request->all(),
          'path' => $path,          
        ],        
        function($m) use ($sender_email,$destinationPath){
            $m->from($sender_email);
            $m->to('asifnawaz.aimviz@gmail.com', 'BDC');
            $m->cc('asifnawaz.aimviz@gmail.com', 'BDC');
            $m->subject('Testing Email');
            // $filename = asset('public/storage/'. $destinationPath);
            // $m->attach($filename);
        });
        Session::flash('success_msg','You Have successfully Contacted Admin ');
        return redirect()->back();
      }

    public function request_services_post(Request $request){
        $validator = Validator::make($request->all(), [
            'service_id' => 'required|numeric',
            'listing_id' => 'required|numeric',
        ]);
        $services = RequestServices::create([
            'user_id' => Auth::user()->id,
            'service_id' => $request->service_id,
            'listing_id' => $request->my_listings
        ]);
        session()->put('request_services', $services->id);
        return redirect()->route('checkout', ['id' => $request->service_id]);
    }
}
