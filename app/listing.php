<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class listing extends Model
{
    //
    protected $fillable = [
        'user_id', 'category_id', 'service_id', 'title', 'funding', 'description', 'document', 'status'
    ];


    public function innovator(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
