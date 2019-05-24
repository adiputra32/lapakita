<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class ShopController extends Controller
{
    public function index(){
        if (Auth::check()) {
            $user = Auth::user();
            
            // echo $user;
            return view('shop.home', ['user'=>$user]);
        } else {
            return view('shop.home');
        }
    }

    public function category(Request $request){
        // $mainCategory = $request->get('mainCategory');
        // $sortCategory = $request->get('sortCategory');
        // $mainCategory = $request->get('mainCategory');

        if (Auth::check()) {
            $user = Auth::user();
            
            // echo $user;
            return view('shop.category', ['user'=>$user]);
        } else {
            return view('shop.category');
        }
        
    }

    public function singleProduct(){
        if (Auth::check()) {
            $user = Auth::user();
            
            // echo $user;
            return view('shop.single-product', ['user'=>$user]);
        } else {
            return view('shop.single-product');
        }
    }

    public function cart(){
        if (Auth::check()) {
            $user = Auth::user();
            
            $client = new Client();

            try{
                $response = $client->get('https://api.rajaongkir.com/starter/province',
                    array(
                        'headers' => array(
                            'key' => 'aad2598b03406bebac0d6fe3cf64fdf7',
                        )
                    )
                );
            } catch(RequestException $e){
                var_dump($e->getResponse()->getBody()->getContents());
            }

            try{
                $response2 = $client->get('https://api.rajaongkir.com/starter/city',
                    array(
                        'headers' => array(
                            'key' => 'aad2598b03406bebac0d6fe3cf64fdf7',
                        )
                    )
                );
            } catch(RequestException $e2){
                var_dump($e2->getResponse()->getBody()->getContents());
            }

            $json = $response->getBody()->getContents();
            $json2 = $response2->getBody()->getContents();

            $array_result = json_decode($json, true);
            $array_result2 = json_decode($json2, true);

            //print_r($array_result);

            // echo $user;
            return view('shop.cart', ['user'=>$user], ['array_result'=>$array_result], ['array_result2'=>$array_result2]);
        } else {
            return view('shop.cart');
        }
    }

    public function checkout(){
        if (Auth::check()) {
            $user = Auth::user();
            
            // echo $user;
            return view('shop.checkout', ['user'=>$user]);
        } else {
            return view('shop.checkout');
        }
    }

    public function confirmation(){
        if (Auth::check()) {
            $user = Auth::user();
            
            // echo $user;
            return view('shop.confirmation', ['user'=>$user]);
        } else {
            return view('shop.confirmation');
        }
    }

    public function contact(){
        if (Auth::check()) {
            $user = Auth::user();
            
            // echo $user;
            return view('shop.contact', ['user'=>$user]);
        } else {
            return view('shop.contact');
        }
    }

    public function tracking(){
        if (Auth::check()) {
            $user = Auth::user();
            
            // echo $user;
            return view('shop.tracking', ['user'=>$user]);
        } else {
            return view('shop.tracking');
        }
    }
}
