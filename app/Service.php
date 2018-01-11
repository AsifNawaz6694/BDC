<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

	protected $fillable = [
        'service', 'cost'
    ];
    
     public function listings(){
        return $this->hasMany('App\Listing');
    }

   
}
