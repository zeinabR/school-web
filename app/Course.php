<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Course extends Authenticatable
{
     public function teaches()
    {
    	return $this->belongsToMany('App\teach');
    }
}
