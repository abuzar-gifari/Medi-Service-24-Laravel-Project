<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminStockController extends Controller
{
    public function admin_stock_show(){
        $stocks = Product::get();
        return view('admin.stock_show',compact('stocks'));
    }
}
