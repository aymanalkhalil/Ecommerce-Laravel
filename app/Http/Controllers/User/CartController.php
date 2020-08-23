<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{

    public function addToCart(Request $request, $prod_id)
    {

        $prod_id = $request->product_id;


        if (empty(session()->get('products')) || !in_array($prod_id, session()->get('products'))) {

            $request->session()->push('products', $prod_id);

            return redirect()->route('single_product', $prod_id)->with(['success' => 'Product added to cart ']);
        } else {

            return redirect()->route('single_product', $prod_id)->with(['error' => 'Product already exist']);
        }
    }

    public function remove(Request $request, $prod_id)
    {

        $prod_id = $request->id;
        $products = session()->pull('products',$prod_id);

        if (($key = array_search($prod_id, $products)) !== false) {
            unset($products[$key]);
        }
        session()->put('products', $products);

        return redirect()->route('homepage')->with(['success' => 'Product removed ']);
    }
}
