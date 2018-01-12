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

        return view('home')->with('featured_listings', $featured_listings)->with('listings', $listings);
    }

    public function publicPages($slug)
    {


        $listings = Listing::all();
        $featured_listings = Listing::where('featured', 1)->get();

        if(view()->exists($slug)){
            return view($slug, compact('listings', 'featured_listings'));
        }
        return view('error.404');

    }


}
