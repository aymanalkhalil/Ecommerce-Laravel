<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admins\Category;
use App\Traits\ImageTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;


class CategoryController extends Controller
{
    use ImageTrait;
    public function index()
    {

        $category = Category::latest()->get();
        return view('admin.manage_category', compact('category'));
    }


    public function create()
    {
        // Not Used
    }


    public function store(CategoryRequest $request)
    {
        try {
            $filename = $this->saveImage($request->category_image, 'images/category_images');

            Category::create([
                'category_name' => $request->category_name,
                'category_image' => $filename,
            ]);
            return redirect()->route('manage_category.index')->with(['success' => 'Category Added Successfully']);
        } catch (\Exception $ex) {
            return redirect()->route('manage_category.index')->with(['error' => 'There is an error try again later !']);
        }
    }

    public function show($id)
    {
        // Not Used
    }


    public function edit($id)
    {
        // Not Used
    }


    public function update(CategoryRequest $request, $id)
    {

        try {
            // Find The requested id
            $category = Category::find($id);

            Category::where('id', $id)->update([
                'category_name' => $request->category_name,
            ]);

            // Call Old Image Function and delete the image
            if ($request->hasFile('category_image')) {
                $this->checkOld('images/category_images/', $category->category_image);
                // Call the saveImage Function From Traits
                $filename = $this->saveImage($request->category_image, 'images/category_images');
                //Update Record with the new image
                Category::where('id', $id)->update([
                    'category_image' => $filename,
                ]);
            }

            // Redirect After update
            return redirect()->route('manage_category.index')->with(['success' => 'Category Updated Successfully']);
        } catch (\Exception $ex) {
            return redirect()->route('manage_category.index')->with(['error' => 'There is an error try again later !']);
        }
    }


    public function destroy($id)
    {

        // Find id
        $category = Category::findOrFail($id);

        //Delete The image
        $this->checkOld('images/category_images/', $category->category_image);

        $category->delete();

        return redirect()->back()->with(['success' => 'Category Deleted Successfully']);
    }
}
