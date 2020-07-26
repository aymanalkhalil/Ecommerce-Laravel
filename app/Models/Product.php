<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'prod_name', 'prod_price', 'prod_desc', 'prod_image', 'category_id'
    ];

    public function categories()
    {
        // if id is another name type the name in the function
        return $this->belongsTo('App\Models\Category', 'category_id');
    }


    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

}
