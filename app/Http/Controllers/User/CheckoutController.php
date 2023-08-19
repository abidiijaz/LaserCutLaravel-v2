<?php

namespace App\Http\Controllers\User;

use Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $clientIP = request()->ip();
        // dd($clientIP);
        $cart = session()->get('cart');
        if($cart){
            $arr_id_cart = [];
            $arr_cart = [];
            foreach($cart as $id => $value){
                array_push($arr_id_cart , $id);
                array_push($arr_cart , $value);
            }
            // dd($arr_id_cart);
            // dd($arr_cart);
            for($i=0; $i<count($arr_id_cart); $i++){
                $get_cart = Cart::where('product_id', $arr_id_cart[$i])
                ->where('user_id', Auth::user()->id)
                ->first();
                if(!$get_cart){
                    $cart = new Cart();
                    $cart->product_id = $arr_id_cart[$i];
                    $cart->user_id = Auth::user()->id;
                    $cart->quantity = $arr_cart[$i]['quantity'];
                    $cart->user_ip = $clientIP;
                    $cart->save();
                }else{
                    // dd($arr_id_cart[$i]);
                    $cart = Cart::where('product_id', $arr_id_cart[$i])
                    ->where('user_id', Auth::user()->id)
                    ->first();
                    $cart->product_id = $arr_id_cart[$i];
                    $cart->user_id = Auth::user()->id;
                    $cart->quantity = $arr_cart[$i]['quantity'];
                    $cart->user_ip = $clientIP;
                    $cart->save();
                }
            }

        }
        $products = cart::where('user_id', Auth::user()->id)->with('products')->get();
        // dd($products);
        return view('checkout',compact('products'));
    }
    public function PlaceOrder(Request $request){
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->l_name = $request->l_name;
        $order->c_name = $request->c_name;
        $order->country = $request->country;
        $order->s_address = $request->address;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->postcode = $request->postcode;
        $order->phone = $request->phone;
        $order->order_note = $request->order_note;
        $order->order_status = 0;
        $order->payment_method = $request->payment_method;
        $order->grand_total = $request->grand_total;
        $order->save();
        $cart = session()->get('cart');
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $count = 0;
        foreach($carts as $key => $value){
            $count++;
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $value->product_id;
            $orderItem->quantity = $value->quantity;
            $orderItem->save();
        }
        if(sizeof($cart) == sizeof($carts)){
        session()->forget('cart');
            foreach($carts as $value){
                $ab_cart = Cart::where('id',$value->id)->first();
                $ab_cart->delete();
            }
        }
        $orderitems = OrderItem::where('order_id',$order->id)->with('product')->get();
// dd($order);

        return view('thankyou',compact('order','orderitems'));
    }
    public function UserOrderView(Request $request){
        $order = Order::where('id',$request->id)->first();
        $orderitems = OrderItem::where('order_id',$order->id)->with('product')->get();
        return view('userorderview',compact('order','orderitems'));
    }
}
