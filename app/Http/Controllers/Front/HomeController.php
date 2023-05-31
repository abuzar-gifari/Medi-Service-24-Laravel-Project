<?php

namespace App\Http\Controllers\Front;

use App\Models\Post;
use App\Models\Room;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        $testimonials = Testimonial::get();
        $sliders = Slider::get();
        $categories = Category::get();
        $capsules = Product::with('rVendor')->where('category_id',7)->get();
        $steroids = Product::with('rVendor')->where('category_id',4)->get();
        $inhelars = Product::with('rVendor')->where('category_id',8)->get();
        $featuredMedicines = Product::with('rVendor')->where('is_featured','Yes')->get();
        return view('front.home',compact('categories','featuredMedicines','inhelars','steroids','sliders','testimonials','capsules'));
    }
    
}
