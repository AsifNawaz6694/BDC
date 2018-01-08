<?php

namespace App;
use Validator;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    protected $fillable = [
        'name', 'email', 'password', 'roles'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $rules = array(
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'roles' => 'required',
    );

    private $messages = array(
        'name' => 'Name is Required',
        'email' => 'Email is Required',
        'password' => 'Password Is Required',
        'roles' => 'Role Is Required',
    );

    public function validate($data)
    {
        // make a new validator object
        $v = Validator::make($data, $this->rules,$this->messages);
        // return the result
        return $v;
    }

    public function profile(){
        return $this->hasOne('App\Profile', 'user_id');
    }

    public function role(){
        return $this->belongsTo('App\Roles', 'roles');
    }

    public function listings(){

        

        return $this->hasMany('App\Listing', 'user_id');

    }
}
