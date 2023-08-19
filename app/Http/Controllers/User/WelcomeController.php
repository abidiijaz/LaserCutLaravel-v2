<?php

namespace App\Http\Controllers\User;

use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PopulerCategory;

class WelcomeController extends Controller
{
    public function index(){
        $products = Product::with('getCategory')->get();
        $sliders = Slider::where('status','1')->get();
        $pcategories = PopulerCategory::with('getCategory')->where('status','1')->get();
// dd($products);
        return view('welcome',compact('products','sliders','pcategories'));
    }
}
