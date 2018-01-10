<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = Listing::all();
        $featured_listings = Listing::where('featured', 1)->get();
        //dd($listings);
        //dd($featured_listings);

        return view('home')->with('featured_listings', $featured_listings)->with('listings', $listings);
    }

    public function publicPages($slug)
    {

        $listings = Listing::all();
        $featured_listings = Listing::where('featured', 1)->get();
        //dd($listings);
        dd($featured_listings);
        return view($slug, compact('listings', '`feature'));
    }

    public function email(){
        $mail = Mail::send('mailbody', ['subject' => 'checking email',  'description_message' => 'this is description'], function ($m)  {
            $m->from('asiif23@gmail.com', 'New Contact Message.');
            $m->to('asifnawaz.aimviz@gmail.com', 'name')->subject('New Contact Message');
        });
        dd($mail);
        Session::flash('success_msg',"Thank You For Contacting , I Will Contact You Shortly !");
        return view('application.innovator.index');
    }


}
