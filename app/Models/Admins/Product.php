<?php

namespace App\Models\Admins;

use App\Models\Admins\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'prod_name', 'prod_price', 'prod_desc', 'prod_image', 'category_id'
    ];

    public function categories()
    {
        // if id is another name type the name in the function
        return $this->belongsTo('App\Models\Admins\Category', 'category_id');
    }




}
