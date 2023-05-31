<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function show()
    {
        $subcategories = SubCategory::get();
        $categories = Category::get();
        return view('admin.subcategory_view', compact('subcategories','categories'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('admin.subcategory_add', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required'
        ]);

        $obj = new SubCategory();
        $obj->name = $request->name;
        $obj->category_id = $request->category_id;
        $obj->save();

        return redirect()->back()->with('success_message', 'Sub-Category is added successfully.');

    }


    public function edit($id)
    {
        $categories = Category::get();
        $subcategory = SubCategory::where('id',$id)->first();
        return view('admin.subcategory_edit', compact('subcategory','categories'));
    }


    public function update(Request $request,$id) 
    {        
        $obj = SubCategory::where('id',$id)->first();

        $obj->name = $request->name;
        $obj->category_id = $request->category_id;
        $obj->update();

        return redirect()->back()->with('success_message', 'SubCategory is updated successfully.');
    }

    public function delete($id)
    {
        $single_data = SubCategory::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success_message', 'SubCategory is deleted successfully.');
    }

}
