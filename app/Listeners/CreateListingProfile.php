<?php

namespace App\Listeners;
use App\listing;
use App\Events\ListingProfile;
use App\Listing_Profile;
use DB;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateListingProfile
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ListingProfile  $event
     * @return void
     */
    public function handle(ListingProfile $event)
    {
        $profile = Listing_Profile::create([
            'listing_id' => $event->listing->id,
           
        ]); 
    }
}
