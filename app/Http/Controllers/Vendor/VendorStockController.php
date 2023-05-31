<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class VendorStockController extends Controller
{
    public function vendor_stock_show(){
        $stocks = Product::where('vendor_id',Auth::guard('vendor')->user()->id)->get();
        return view('vendor.stock_show',compact('stocks'));
    }
}
