<?php

namespace App\Http\Controllers\User;

use App\Models\Admins\Product;
use App\Models\Admins\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {

        $category = Category::whereHas('products')->get();

        return view('public.index', compact('category'));
    }

    public function showAllProducts($cat_id)
    {
        $category = Category::select('category_name')->where('id', $cat_id)->first();


        $all_products = Product::where('category_id', $cat_id)->get();



        return view('public.shop', compact('all_products', 'category'));
    }
    public function showSingleProduct($prod_id)
    {

        $single_product = Product::where('id', $prod_id)->get();

        return view('public.single-product', compact('single_product'));
    }

}
