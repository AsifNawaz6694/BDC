<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table= 'categories';
    protected $primaryKey='id';
    public $rules = array(
        'name' => 'required',
        'description' => 'required',
        'symbol' => 'required',
        'color_code	' => 'required',
    );
    private $messages = array(
        'name' => 'Name is Required',
        'description' => 'Description is Required',
        'symbol' => 'Symbol Is Required',
        'color_code' => 'Color Code Is Required',
    );
    public function validate($data)
    {
        // make a new validator object
        $v = Validator::make($data, $this->rules,$this->messages);
        // return the result
        return $v;
    }
<<<<<<< HEAD

     public function listings(){
        return $this->hasMany('App\Listing');
    }
=======
>>>>>>> b2d6698b0b67dba81b129942f31611adf9d08f84
}
