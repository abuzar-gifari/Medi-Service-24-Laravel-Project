<?php

namespace App\Http\Controllers\DeliveryBoy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryBoyHomeController extends Controller
{
    public function index()
    {
        return view('delivery_boy.home');
    }
}
