<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VendorProductController extends Controller
{

    
    public function show(){
        $products = Product::with('rCategory')->where('vendor_id',Auth::guard('vendor')->user()->id)->get();
        return view('vendor.product_view',compact('products'));
    }

    
    public function create(){
        $categories = Category::all();
        return view('vendor.product_create',compact('categories'));
    }

    
    public function store(Request $request){
        

        $request->validate([
            'product_title' => 'required',
            'selling_price' => 'required',
            'discount_rate' => 'required',
            'short_description' => 'required',
            'type' => 'required',
            'sku_no' => 'required',
            'mfg' => 'required',
            'lifetime' => 'required',
            'stock' => 'required',
            'long_description' => 'required',
            'is_featured' => 'required',
            'category_id' => 'required',
        ]);

      
        
        $ext = $request->file('photo')->extension();
        $final_name = 'photo_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);

        $product = new Product();
        $product->photo = $final_name;
        $product->product_title = $request->product_title;
        $product->selling_price = $request->selling_price;
        $product->discount_rate = $request->discount_rate;


        $discount_value = ($request->selling_price / 100) * $request->discount_rate;
        $new_price = $product->selling_price - $discount_value;
        
        
        $product->discount_price = $new_price;
        $product->short_description = $request->short_description;
        $product->type = $request->type;
        $product->sku_no = $request->sku_no;
        $product->mfg = $request->mfg;
        $product->lifetime = $request->lifetime;
        $product->stock = $request->stock;
        $product->long_description = $request->long_description;
        $product->is_featured = $request->is_featured;
        $product->category_id = $request->category_id;
        $product->vendor_id = Auth::guard('vendor')->user()->id;
        $product->save();
        return redirect()->route('vendor_product_show')->with('success_message','Product Created Successfully');

    }


    
    public function edit($id){
        $product = Product::where('id',$id)->first();
        $categories = Category::all();
        return view('vendor.product_edit',compact('product','categories'));
    }


    
    public function update(Request $request,$id){

        $request->validate([
            'product_title' => 'required',
            'selling_price' => 'required',
            'discount_rate' => 'required',
            'short_description' => 'required',
            'type' => 'required',
            'sku_no' => 'required',
            'mfg' => 'required',
            'lifetime' => 'required',
            'stock' => 'required',
            'long_description' => 'required',
            'is_featured' => 'required',
        ]);

        $product = Product::where('id',$id)->first();

        
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:png,jpg,jpeg,gif'
            ]);
            unlink(public_path('uploads/'.$product->photo));
            $ext = $request->file('photo')->extension();
            $final_name = 'photo'.time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'),$final_name);
            $product->photo = $final_name;
        }

        $product->product_title = $request->product_title;
        $product->selling_price = $request->selling_price;
        $product->discount_rate = $request->discount_rate;


        $discount_value = ($request->selling_price / 100) * $request->discount_rate;
        $new_price = $product->selling_price - $discount_value;
        
        
        $product->discount_price = $new_price;
        $product->short_description = $request->short_description;
        $product->type = $request->type;
        $product->sku_no = $request->sku_no;
        $product->mfg = $request->mfg;
        $product->lifetime = $request->lifetime;
        $product->stock = $request->stock;
        $product->long_description = $request->long_description;
        $product->is_featured = $request->is_featured;
        $product->category_id = $request->category_id;
        $product->vendor_id = Auth::guard('vendor')->user()->id;
        $product->update();
        return redirect()->route('vendor_product_show')->with('success_message','Information Updated Successfully');
    
    }


    
    public function delete($id){
        $product = Product::where('id',$id)->first();
        unlink(public_path('uploads/'.$product->photo));
        $product->delete();

        $product_photos = ProductPhoto::where('room_id',$id)->get();
        foreach($product_photos as $product_photo){
            unlink(public_path('uploads/'.$product_photo->photo));
            $product_photo->delete();
        }

        return redirect()->route('vendor_product_show')->with('success_message','Data is Deleted Successfully');
    }


    
    public function gallery($id){
        $product = Product::where('id',$id)->first();
        $product_photos = ProductPhoto::where('product_id',$id)->get();
        return view('vendor.product_gallery',compact('product','product_photos'));
    }
    

    
    public function gallery_store(Request $request,$id){
        
        $request->validate([
            'photo' => 'required'
        ],[
            'photo.required' => 'Photo is required'
        ]);

        // Photo Upload
        $ext = $request->file('photo')->extension();
        $final_name = 'photo_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);


        $product_photo = new ProductPhoto();
        $product_photo->photo = $final_name;
        $product_photo->product_id = $id;

        $product_photo->save();

        return redirect()->back()->with('success_message','Photo is added Successfully');


    }


    
    public function gallery_delete($id){
        $product = ProductPhoto::where('id',$id)->first();
        // unlink the photo
        unlink(public_path('uploads/'.$product->photo));
        $product->delete();
        return redirect()->back()->with('success_message','Photo is Deleted Successfully');
    }

}
