<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index(Request $req){
        // dd($req->id);
        $id = $req->id;
        $product = Product::find($id);
        $image = json_decode($product->image);
        
        if(!$product){
            abort(404);
        }
        $cart = session()->get('cart');
        if(!$cart){
            $cart = [
                $id =>[
                    "id" => $id,
                    "name" => $product->title,
                    "quantity" => 1,
                    "image" => $image[0],
                    "price" => $product->price,
                ]
            ];
            session()->put('cart', $cart);
            return response()->json(['cart' => $cart]);
        }
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return response()->json(['cart' => $cart]);
        }
        $cart[$id] = [
            "id" => $id,
            "name" => $product->title,
            "quantity" => 1,
            "image" => $image[0],
            "price" => $product->price,
        ];
        session()->put('cart', $cart);
        return response()->json(['cart' => $cart]);
    }
    public function ViewCart(){
        
        return view('cart');
    }
    public function update(Request $request)
    {
        // dd($request->all());
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
            return response()->json(['cart' => $cart]);
        }
    }

    public function remove(Request $request)
    {

        
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }
}
