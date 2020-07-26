<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ProductRequest;

class ProductsController extends Controller
{
    use ImageTrait;
    public function index()
    {
        $category = Category::all();
        $product = Category::select('*')
            ->join('products', 'products.category_id', '=', 'categories.id')
            ->latest('products.id')->get();

        return view('admin.manage_products', compact('product', 'category'));
    }


    public function create()
    {
        //
    }


    public function store(ProductRequest $request)
    {
        try {

            $filename = $this->saveProductImage($request->prod_image, 'images/product_images');

            Product::create([
                'category_id' => $request->cat_id,
                'prod_name' => $request->prod_name,
                'prod_desc' => $request->prod_desc,
                'prod_price' => $request->prod_price,
                'prod_image' => $filename,
            ]);
            return redirect()->route('manage_products.index')->with(['success' => 'Product Added Successfully']);
        } catch (\Exception $ex) {
            return redirect()->route('manage_products.index')->with(['error' => 'There is an error try again later !']);
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(ProductRequest $request, $id)
    {
        try {
            // Find The requested id
            $products = Product::find($id);
            Product::where('id', $id)->update([
                'category_id' => $request->cat_id,
                'prod_name' => $request->prod_name,
                'prod_desc' => $request->prod_desc,
                'prod_price' => $request->prod_price,
            ]);

            if ($request->hasFile('prod_image')) {
                $this->checkOld('images/product_images/', $products->prod_image);
                $filename = $this->saveProductImage($request->prod_image, 'images/product_images');
                Product::where('id', $id)->update([
                    'prod_image' => $filename,
                ]);
            }
            return redirect()->route('manage_products.index')->with(['success' => 'Product Updated Successfully']);
        } catch (\Exception $ex) {
            return redirect()->route('manage_products.index')->with(['error' => 'There is an error try again later !']);
        }
    }


    public function destroy($id)
    {
        // Find id
        $product = Product::findOrFail($id);

        //Delete The image
        $this->checkOld('images/product_images/', $product->prod_image);

        $product->delete();

        return redirect()->back()->with(['success' => 'Product Deleted Successfully']);
    }
}
