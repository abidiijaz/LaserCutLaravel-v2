<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with('user')->get();
        return view('admin.order.index',compact('orders'));
    }
    public function EditOrder(Request $request){
        // dd($request->id);
        $order = Order::where('id',$request->id)->first();
        $orderitems = OrderItem::where('order_id',$order->id)->with('product')->get();
        return view('admin.order.edit',compact('order','orderitems'));
    }
    public function UpdateOrder(Request $request){
        // dd($request->all());
        $order = Order::find($request->order_id);
        $order->order_status = $request->order_status;
        $order->save();
        return redirect('/admin/orders');
    }
}
