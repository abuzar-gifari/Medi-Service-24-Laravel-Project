<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryBoy;
use Illuminate\Http\Request;

class AdminDeliveryBoyController extends Controller
{
    public function admin_delivery_boy_lists_show(){
        $delivery_boys = DeliveryBoy::all();
        return view('admin.delivery_boy_lists_show',compact('delivery_boys'));
    }
}
