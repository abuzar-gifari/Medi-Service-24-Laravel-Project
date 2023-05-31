<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;

class AdminVendorController extends Controller
{
    public function admin_vendor_lists_show(){
        $vendors = Vendor::all();
        return view('admin.vendor_lists_show',compact('vendors'));
    }
}
