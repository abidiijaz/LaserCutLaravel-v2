<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class ProfileController extends Controller
{
    public function index(){
        $orders = Order::where('user_id', Auth::user()->id)->with('user')->get();
        return view('profile',compact('orders'));
    }
}
