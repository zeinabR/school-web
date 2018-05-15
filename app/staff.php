<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class staff extends Authenticatable
{
     protected $fillable = [
        'name', 'phone', 'address','email','password',
    ];
 	public function events()
    {
    	return $this->hasMany('App\event','id');
    }

    public function courses()
    {
    	return $this->hasMany('App\course','id');
    }

}
