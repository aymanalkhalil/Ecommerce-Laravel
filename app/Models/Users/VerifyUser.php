<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{


    protected $fillable = ['user_id', 'token'];

    public function user()
    {
        return $this->belongsTo('App\Models\Users\User','user_id');
    }
}
