<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request_listing extends Model
{

 	protected $table='request_listings';
 	protected $primarykey='id';

 	protected $fillable = [
        'message', 'subject', 'user_id', 'listing_id',
    ]; 

    public function requests(){
    	return $this->belongsTo(Listing::class, 'listing_id');
    }
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
