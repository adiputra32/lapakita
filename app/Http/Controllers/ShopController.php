<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{


    public function index(){
        if (Auth::check()) {
            $user = Auth::user();
            
            // echo $user;
            return view('shop.home', ['user'=>$user]);
        }
        return view('shop.home');
    }

}
