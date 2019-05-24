<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use App\Cart;
use App\Product;
use App\User;
use App\Categoty;
use App\Transaction;
use App\TransactionDetail;
use App\Discount;
use Carbon\Carbon;

class ShopController extends Controller
{
    public function index(){
        if (Auth::check()) {
            $user = Auth::user();

            $product = Product::orderBy('id','DESC')->first();
            
            // echo $user;
            return view('shop.home', ['user'=>$user, 'product'=>$product]);
        } else {
            return view('shop.home');
        }
    }

    public function indexAdd(Request $request){
        if (Auth::check()) {
            $user = Auth::user();

            $cart = new Cart();
            $cart->user_id=$user->id;
            $cart->product_id=$request->get('id_product');
            $cart->qty=1;
            $cart->status = 'notyet';
            $cart->save();

            $product = Product::orderBy('id','DESC')->first();
            
            // echo $user;
            return view('shop.home', ['user'=>$user, 'product'=>$product]);
        } else {
            return view('shop.home');
        }
    }

    public function category(){

        if (Auth::check()) {
            $user = Auth::user();
            
            $products = Product::paginate(12);

            // echo $user;
            return view('shop.category', ['user'=>$user, 'products'=>$products]);
        } else {
            return view('shop.category');
        }
        
    }

    public function categoryAdd(Request $request){

        if (Auth::check()) {
            $user = Auth::user();

            $cart = new Cart();
            $cart->user_id=$user->id;
            $cart->product_id=$request->get('id_product');
            $cart->qty=1;
            $cart->status = 'notyet';
            $cart->save();

            $products = Product::paginate(12);

            // echo $user;
            return view('shop.category', ['user'=>$user, 'products'=>$products]);
        } else {
            return view('shop.category');
        }
        
    }

    public function singleProduct(Request $request){
        if (Auth::check()) {
            $user = Auth::user();

            $products = Product::where('id',$request->get('id_product'))->get();
            
            if ($request->get('qty') != '') {
                $cart = new Cart();
                $cart->user_id=$user->id;
                $cart->product_id=$request->get('id_product');
                $cart->qty=$request->get('qty');
                $cart->status = 'notyet';
                $cart->save();
            }
           
            
            // echo $user;
            return view('shop.single-product', ['user'=>$user, 'products'=>$products]);
        } else {
            return view('shop.single-product');
        }
    }


    public function cart(){
        if (Auth::check()) {
            $user = Auth::user();
            
            $client = new Client();

            $cart = Cart::where('user_id',$user->id)->where('status','notyet')->get();
            $product = Product::get();

            // return $product;

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
            
            $json2 = $response2->getBody()->getContents();
            $array_result2 = json_decode($json2, true);

            $json = $response->getBody()->getContents();
            $array_result = json_decode($json, true);

            // $array_result3 = $array_result3['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value'];

            // echo $user;
            return view('shop.cart', ['user'=>$user, 'array_result2'=>$array_result2, 'array_result'=>$array_result, 'product'=>$product, 'cart'=>$cart]);
        } else {
            return view('shop.cart');
        }
    }

    public function checkout(Request $request){
        if (Auth::check()) {
            $user = Auth::user();
            
            $client = new Client();

            $province = $request->get('province');
            $city = $request->get('city');
            $weight = 0;
            $courier = $request->get('courier');
            $address = $request->get('address');

            $cart = Cart::where('user_id',$user->id)->where('status','notyet')->get();
            
            $tmp_cart = $cart->count();
            for ($i=0; $i < $tmp_cart; $i++) { 
                $product = Product::where('id',$cart->get($i)->product_id)->first()->weight;
                $weight = $weight + $product;
            }

            if($courier == 'JNE OKE' || $courier == 'JNE REG' || $courier == 'JNE YES'){
                $tmp_courier = 'jne';
                $id_courier = 1;
            }elseif($courier == 'TIKI OCE' || $courier == 'TIKI REG' || $courier == 'TIKI ONS'){
                $tmp_courier = 'tiki';
                $id_courier = 2;
            }elseif($courier == 'POS INDONESIA PAKET KILAT KHUSUS' || $courier == 'POS INDONESIA EXPRESS NEXT DAY BARANG'){
                $tmp_courier = 'pos';
                $id_courier = 3;
            }
            
            try{
                $response3 = $client->request('POST','https://api.rajaongkir.com/starter/cost',
                    [
                        'body' => 'origin=501&destination='.$province.'&weight='.$weight.'&courier='.$tmp_courier.'',
                        'headers' => [
                            'content-type' => 'application/x-www-form-urlencoded',
                            'key' => 'aad2598b03406bebac0d6fe3cf64fdf7',
                        ]
                    ]
                        
                );
            } catch(RequestException $e3){
                var_dump($e3->getResponse()->getBody()->getContents());
            }
            

            $json3 = $response3->getBody()->getContents();
            $array_result3 = json_decode($json3, true);


            $counter=$request->get('counter');
            $j = 1;
            for ($i=0; $i < $counter; $i++) { 
                $cart_id = $request->get('id_cart'. $i);
                $cart = Cart::find($cart_id);
                $tmp_qty=$request->get('qty' . $j);
                if ($tmp_qty <= 0) {
                    $cart->delete();
                }else {
                    $cart->qty=$tmp_qty;
                    $cart->save();
                }
                
                $j = $j + 3;
            }

            $cart = Cart::where('user_id',$user->id)->where('status','notyet')->get();
            $product = Product::get();

            // echo $user;
            return view('shop.checkout', ['user'=>$user, 'array_result3'=>$array_result3, 'cart'=>$cart, 'province'=>$province, 'city'=>$city, 'address'=>$address, 'id_courier'=>$id_courier, 'product'=>$product]);
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

    public function confirmationAdd(Request $request){
        if (Auth::check()) {
            $user = Auth::user();

            $trans = new Transaction();
            $trans->timeout = carbon::tomorrow();
            $trans->address = $request->get('address');
            $trans->regency = $request->get('city');
            $trans->province = $request->get('province');
            $trans->total = $request->get('total_price');
            $trans->shipping_cost = $request->get('shipping');
            $trans->sub_total = $request->get('subtotal');
            $trans->user_id = $user->id;
            $trans->courier_id = $request->get('id_courier');
            $trans->status = 'unverified';
            $trans->save();

           
            $cart = Cart::where('user_id',$user->id)->where('status','notyet')->get();
            $tmp_cart = $cart->count();
            $trans_id = Transaction::select('id')->orderBy('id','DESC')->where('user_id',$user->id)->first();
            $product = Product::get();
            for ($i=0; $i < $tmp_cart; $i++) {
                $dettrans = new TransactionDetail();
                $dettrans->transaction_id = $trans_id->id;
                $dettrans->product_id = $cart->get($i)->product_id;
                $dettrans->qty = $cart->get($i)->qty;
                $dettrans->discount = 0;
                $dettrans->selling_price = $product->where('id',$cart->get($i)->product_id)->first()->price;
                $dettrans->save();
            }
            
            for ($i=0; $i < $tmp_cart; $i++) {
                $cart2 = Cart::find($cart->get($i)->id);
                $cart2->status = 'checkedout';
                $cart2->save();
            }
            
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
