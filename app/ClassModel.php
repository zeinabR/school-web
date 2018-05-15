<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class ClassModel extends Authenticatable
{
    //
    protected $table = 'classes';
        public function students()
    {
    	return $this->hasMany('App\Models\Users\student', 'class_id');
    }

    public function teaches()
    {
    	return $this->belongsTo('App\teach');
    }

}
