<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registeration(Request $request){
        dd($request->all());
    }
}
