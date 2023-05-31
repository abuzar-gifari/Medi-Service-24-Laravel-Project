<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show()
    {
        $categories = Category::get();
        return view('admin.category_view', compact('categories'));
    }

    public function create()
    {
        return view('admin.category_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'name' => 'required'
        ]);

        $ext = $request->file('photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);

        $obj = new Category();
        $obj->photo = $final_name;
        $obj->name = $request->name;
        $obj->save();

        return redirect()->back()->with('success_message', 'Category is added successfully.');

    }


    public function edit($id)
    {
        $category_data = Category::where('id',$id)->first();
        return view('admin.category_edit', compact('category_data'));
    }


    public function update(Request $request,$id) 
    {        
        $obj = Category::where('id',$id)->first();
        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->photo));
            $ext = $request->file('photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'),$final_name);
            $obj->photo = $final_name;
        }

        $obj->name = $request->name;
        $obj->update();

        return redirect()->back()->with('success_message', 'Category is updated successfully.');
    }

    public function delete($id)
    {
        $single_data = Category::where('id',$id)->first();
        unlink(public_path('uploads/'.$single_data->photo));
        $single_data->delete();

        return redirect()->back()->with('success_message', 'Category is deleted successfully.');
    }

}
