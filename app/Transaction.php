<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = [
        'user_id', 'description', 'type'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function request_service(){
        return $this->hasOne(RequestServices::class, 'transaction_id');
    }

    public function service(){
        return $this->belongsTo(Service::class, 'id');
    }
}
