<?php

namespace App\Models\Users;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;
class school_admin extends Authenticatable
{
	use Notifiable;

/**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    // public function sendPasswordResetNotification($token)
    // {
    //     $this->notify(new AdminResetPasswordNotification($token));
    // }

    protected $fillable = [
        'name', 'email', 'password','phone','address',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
      public function school()
    {
        return $this->hasOne('App\school', 'admin_id');
    }

}
