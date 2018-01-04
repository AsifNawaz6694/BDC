<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class listing extends Model
{
    //
    protected $fillable = [
        'user_id', 'category_id', 'service_id', 'title', 'funding', 'description', 'document', 'status'
    ];


    public function user(){
        return $this->hasOne('App\User', 'user_id');
    }
}
