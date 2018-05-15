<?php

namespace App\Models\Users;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;
class staff extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password','phone','address',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
