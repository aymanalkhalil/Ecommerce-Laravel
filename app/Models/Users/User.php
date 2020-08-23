<?php

namespace App\Models\Users;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password', 'mobile_no', 'address', 'verified'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function verifyUser()
    {
        return $this->hasOne('App\Models\Users\VerifyUser', 'user_id');
    }
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
