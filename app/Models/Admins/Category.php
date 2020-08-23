<?php

namespace App\Models\Admins;

use App\Models\Admins\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // protected $table = 'categories';

    protected $fillable = [
        'category_name', 'category_image'
    ];
    protected $hidden = [
        // 'categor', 'category_image'
    ];
    public function products()
    {

        // if id is another name type the name in the function
        return $this->hasMany('App\Models\Admins\Product', 'category_id');

    }




}
