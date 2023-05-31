<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class AdminSliderController extends Controller
{
    public function show()
    {
        $sliders = Slider::get();
        return view('admin.slider_view', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'name' => 'required',
            'title' => 'required'
        ]);

        $ext = $request->file('photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);

        $obj = new Slider();
        $obj->photo = $final_name;
        $obj->name = $request->name;
        $obj->title = $request->title;
        $obj->save();

        return redirect()->back()->with('success', 'Slider is added successfully.');

    }


    public function edit($id)
    {
        $slider_data = Slider::where('id',$id)->first();
        return view('admin.slider_edit', compact('slider_data'));
    }


    public function update(Request $request,$id) 
    {        
        $obj = Slider::where('id',$id)->first();
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
        $obj->title = $request->title;
        $obj->update();

        return redirect()->back()->with('success', 'Slider is updated successfully.');
    }

    public function delete($id)
    {
        $single_data = Slider::where('id',$id)->first();
        unlink(public_path('uploads/'.$single_data->photo));
        $single_data->delete();

        return redirect()->back()->with('success', 'Slider is deleted successfully.');
    }
    

}
