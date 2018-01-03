<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
 	protected $table='profile';
 	protected $primarykey='id';


 	public function profile(){
 	    return $this->belongsTo('App\User');
    }
}
