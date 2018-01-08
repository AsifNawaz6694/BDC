<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{

	protected $fillable = [
        'service', 'cost'
    ];
    
     public function listings(){
        return $this->hasMany('App\Listing');
    }

   
}
