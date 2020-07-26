<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // protected $table = 'categories';

    protected $fillable = [
        'category_name', 'category_image'
    ];

    public function products()
    {

        // if id is another name type the name in the function
        return $this->hasMany('App\Models\Product', 'category_id');

    }




}
