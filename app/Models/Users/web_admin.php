<?php
namespace App\Models\Users;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\notifications\AdminResetPasswordNotification;
class web_admin extends Authenticatable
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
}
