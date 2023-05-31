<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about_us(){
        return view('front.page_about_us');
    }

    
    public function contact(){
        return view('front.page_contact');
    }

    
    public function my_account(){
        return view('front.page_my_account');
    }

    
    public function login(){
        return view('front.page_login');
    }

    
    public function register(){
        return view('front.page_register');
    }

    
    public function vendorlogin(){
        return view('front.page_vendor_login');
    }

    
    public function vendorregister(){
        return view('front.page_vendor_register');
    }

    
    public function privacy_policy(){
        return view('front.page_privacy_policy');
    }

    
    public function all_vendor_list(){
        return view('front.all_vendor_list');
    }
    
}


