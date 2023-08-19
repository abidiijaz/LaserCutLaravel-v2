<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
// AQUA CNC SOLUTIONS
    public function login(Request $req){
        if($req->isMethod('post')){
            $data = $req->all();
            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])  || Auth::guard('admin')->check()){
               return $this->index();
            }
        }
        // else if(Auth::guard('admin')->check()){
        //     return view('admin.dashboard');

        // }
        return view('admin.admin_login');
    }
    public function index(){
        $product_count = Product::count();
        $order_count = Order::count();
        $pedding_order_count = Order::where('order_status',0)->count();
        $complete_order_count = Order::where('order_status',3)->count();
        $orders = Order::with('user')->orderBy('id','DESC')->limit(5)->get();
        return view('admin.dashboard',compact('product_count','order_count','pedding_order_count','complete_order_count','orders'));
    }
    public function Logout(Request $request){
        Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/');
    }
}
