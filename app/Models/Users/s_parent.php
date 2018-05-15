<?php

namespace App\Models\Users;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;
class s_parent extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password','phone','address',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function childern()
   	{
   		return $this->hasMany('App\Models\Users\student','parent_id');
   	}
}
