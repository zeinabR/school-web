<?php

namespace App\Models\Users;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;
class student extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password','phone','address',
    ];

	public function myClass()
	{
		return $this->belongsTo('App\ClassModel','class_id');


	}

    public function teachers()
    {
        return $this->belongsToMany('App\Models\Users\teacher');
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
}
