<?php
namespace App\Models\Auth;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;

    protected $hidden  = ['password', 'remember_token'];
    protected $guarded = ['id'];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function roles()
    {
        return $this->belongsToMany(UserRole::class);
    }

    public function getRoles()
    {
        return $this->roles->pluck('id')->toArray();
    }

    public function getAvatarAttribute($value)
    {
        if ($value) {
            return $value;
        } else {
            return base64_encode(file_get_contents(public_path() . '/images/user-generic.jpg'));
        }
    }
}
