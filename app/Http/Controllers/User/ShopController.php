<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function index($keyword){

        $category = ProductCategory::where('keyword', $keyword)->first();

        if ($category) {
            $products = Product::where('category_id', $category->id)
                ->with('getCategory') // Assuming 'getCategory' is the relation defined in your Product model
                ->paginate(15);
        } else {
            // If the category doesn't exist, create a "placeholder" category object
            $category = (object)[
                'name' => $keyword,
                'description' => $keyword,
                'keyword' => $keyword
            ];

            $products = []; // Set an empty array for products since there's no category
        }

        return view('shop', compact('products', 'category'));
    }
    public function TopSearch(Request $request){


        $keyword = $request->top_search;
        $products = Product::where('title', 'LIKE', '%' . $keyword . '%')->paginate();
            // If the category doesn't exist, create a "placeholder" category object
            $category = (object)[
                'name' => $keyword,
                'description' => $keyword,
                'keyword' => $keyword
            ];


            // dd($products);

        return view('shop',compact('products','category'));
    }
}
