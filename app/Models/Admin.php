<?php

namespace App\Models;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    protected $fillable = [
        'admin_name', 'admin_email', 'admin_password',
    ];

    // because i have typed admin_password in the db it has to be password by laravel default
    public function getAuthPassword()
    {

        return $this->admin_password;
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

}
