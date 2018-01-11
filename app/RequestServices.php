<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestServices extends Model
{
    //
    protected $fillable = [
        'user_id', 'service_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function service(){
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function transaction(){
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}
