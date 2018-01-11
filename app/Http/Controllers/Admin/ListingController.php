<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Session;
use Auth;
use DB;
use App\User;
use App\service;
use App\Category;
use App\Listing;
use App\Request_listing;
use App\Notifications\ListingApproved;
use App\Notifications\FunderListingApproved;
use App\Notifications\ListingDisApproved;
use App\Notifications\FeaturedApproved;
use App\Notifications\FeaturedDisApproved;


class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      public function __construct()
    {  
       ini_set('memory_limit', '-1');
    }

    public function index()
    {
        $args['listing'] = Listing::all();  
        return view('Admin_Panel.Listing.index')->with($args);
    }

    public function disapprove_status($id)
    {
         DB::table('listings')
            ->where('id', $id)
            ->update(['status' => 0]);
        $listing = Listing::find($id);
        $notify_data['listing'] =  $listing;
        $notify_data['user'] =  Auth::user();
        // dd($listing->innovator);
        $listing->innovator->notify(new ListingDisApproved($notify_data));
        
            return redirect()->back();
    }
    public function approve_status($id)
    {         
        // Auth::user()->notify(new ListingApproved($listing));
         DB::table('listings')
            ->where('id', $id)
            ->update(['status' => 1]);
        $listing = Listing::find($id);
        $notify_data['listing'] =  $listing;
        $notify_data['user'] =  Auth::user();
        // dd($listing->innovator);
        $listing->innovator->notify(new ListingApproved($notify_data));
     
        return redirect()->back();
    }
    public function disapprove_featured($id)
    {
         DB::table('listings')
            ->where('id', $id)
            ->update(['featured' => 0]);
        $listing = Listing::find($id);
        $notify_data['listing'] =  $listing;
        $notify_data['user'] =  Auth::user();        
        $listing->innovator->notify(new FeaturedDisApproved($notify_data));
   
            return redirect()->back();
    }
    public function approve_featured($id)
    { 
         DB::table('listings')
            ->where('id', $id)
            ->update(['featured' => 1]);
        $listing = Listing::find($id);
        $notify_data['listing'] =  $listing;
        $notify_data['user'] =  Auth::user();        
        $listing->innovator->notify(new FeaturedApproved($notify_data));
    
            return redirect()->back();
    }

    public function admin_download($file_name) {

        $file = Listing::find($file_name);
        $path = str_replace('/', '\\', $file->document);
        $file_path = storage_path('app\public\\'.$path);
        return response()->download($file_path);
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Funder_Request()
    {
        $args['request_listing'] = Request_listing::all();
        return view('Admin_Panel.listing.request_listing')->with($args);   
    }

    public function destroy_funder_request($id)
    {
        $Funder_Request = Request_listing::find($id);
        $Funder_Request->delete();
        Session::flash('success_msg','The Request Listing Was Successfully Deleted');
        return back();
    }

    public function funder_disapprove_status($id)
    {
         DB::table('request_listings')
            ->where('id', $id)
            ->update(['request_status' => 0]);
             return redirect()->back();
    }
    public function funder_approve_status($id)
    {      
         DB::table('request_listings')
            ->where('id', $id)
            ->update(['request_status' => 1]);          
        return redirect()->back();
    }

    public function request_detail_view($id)
    {
        $args['value'] = Request_listing::find($id);        
        return view('Admin_Panel.Listing.request_view')->with($args);
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $args=array();
        $listing = listing::find($id); 
        $args['category'] = Category::all()->pluck('name', 'id');        
        $args['service'] = service::all()->pluck('service', 'id');  
        if($listing){
        $args['listing']=$listing;
        return view('Admin_Panel.Listing.edit')->with($args);
        }
        Session::flash('error_msg','Sorry no Listing found');
        return redirect()->back();
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $this->validate($request, [            
        'title' => 'required',
        'funding' => 'required',            
        'category_id' => 'required',
        'service_id' => 'required'
        ]);
        $u = listing::find($id);
        if ($u!=null)
        {
        $u->title = Input::get('title');
        $u->service_id = Input::get('service_id');
        $u->category_id = Input::get('category_id');
        $u->funding = Input::get('funding');
        $u->save();
        return redirect('admin/listing');
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category_delete = listing::destroy($id);        
        Session::flash('success_msg','The Listing Was successfully Deleted');
        return back();
    }
}
