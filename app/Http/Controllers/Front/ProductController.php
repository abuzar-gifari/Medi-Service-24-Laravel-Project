<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product_details($id){
        $products = Product::with(['rProductPhoto','rCategory','rVendor'])->where('id',$id)->first();
        return view('front.shop_product_full',compact('products'));
    }
}
