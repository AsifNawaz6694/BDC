<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
 	protected $table='profile';
 	protected $primarykey='id';

 	protected $fillable = [
        'user_id', 'user_name'
    ];
}
