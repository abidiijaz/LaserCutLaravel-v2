<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductDetailController extends Controller
{
    public function index($id){
        $product = Product::find($id);
        $products = Product::where('category_id', $product->category_id)->limit(4)->get();
        // dd($product->category_id);
        return view('detail-product',compact('product','products'));
    }
}
