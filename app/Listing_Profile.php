<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing_Profile extends Model
{
   	protected $table='listing_profile';
 	protected $primarykey='id';

 	protected $fillable = [
        'questions_ids', 'section_id', 'listing_id',
    ]; 
}
