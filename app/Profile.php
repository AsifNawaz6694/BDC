<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
 	protected $table='profile';
 	protected $primarykey='id';



 	public function user(){
 	    return $this->belongsTo('App\User');
    }

 	protected $fillable = [
        'user_id', 'user_name', 'image', 'gender', 'phone', 'birth_date'
    ];

}
