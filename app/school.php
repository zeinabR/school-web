<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\ClassModel;
class school extends Authenticatable
{
 public function classes()
 	{
 		return $this->hasMany('App\ClassModel');
 	}

 	 	public function parents()
 	{
 		return $this->hasMany('App\Models\Users\s_parent');
 	}

 		 	public function staff()
 	{
 		return $this->hasMany('App\Models\Users\staff');
 	}

	 	public function teachers()
 	{
 		return $this->hasMany('App\Models\Users\teacher');
 	}

 	public function admin()
 	{
 		return $this->hasOne('App\Models\Users\school_admin');
 	}
    protected $fillable = [
        'name', 'phone', 'address','vision','mission',
    ];
}
