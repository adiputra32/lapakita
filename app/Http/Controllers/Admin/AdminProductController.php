<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Category;
use App\Product_Image;
use App\Discount;
use App\Product_Category_Details; 
use App\TransactionDetail; 

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admin = Auth::user();
        $products = Product::get();
        $categories = Category::get();
        return view('admin.product.product', ['admin'=>$admin,'products'=>$products,'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = Auth::user();
        $categories = Category::get();
        return view('admin.product.add', ['admin'=>$admin,'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        
        $request['price'] = filter_var($request->price, FILTER_SANITIZE_NUMBER_INT);
        
        $this->validate($request,[
            'price' => 'numeric|digits_between:1,10',
            'categories' => 'required',
            'stock' => 'numeric|digits_between:1,9',
            'image' => 'required',
        ]);
      

        if ($request->price < 1) {
            return back()->with('fail','Price cannot be zero!');
        }

     
        if ($request->stock < 1) {
            return back()->with('fail','Stock cannot be zero!');
        }
       

        $product =  new Product();
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->description = $request->desc;
        $product->stock = $request->stock;
        $product->weight = $request->weight;
        $product->product_rate = 0;
        $product->save();
        
        foreach ($request->categories as $category) {
            $product->category()->attach($category);
        }

        
        if($request->hasfile('image')){
            $i = 0;

            $product_id = Product::select('id')->orderBy('id','DESC')->first();

            foreach ($request->file('image') as $image) {
                $folderName = 'product_image';
                $fileName = $product_id->id.'_'.$i;
                $fileExtension = $image->getClientOriginalExtension();
                $fileNameToStorage = $fileName.'_'.time().'.'.$fileExtension;
                $filePath = $image->storeAs('public/'.$folderName , $fileNameToStorage);

                $images = new Product_Image();
                $images->product_id = $product_id->id;
                $images->image_name = $fileNameToStorage;
                $images->save();

                $i++;
            }
        }
       
        return back()->with('success','Data has been inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $categories = Product_Categories::get();
        $product = Product::find($id);

        // return view('admin.product.edit',[$])
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           
            $product =  Product::find($request->idProduct);
            $product->product_name = $request->nama;
            $product->price = $request->price;
            $product->description = $request->desc;
            $product->stock = $request->stock;
            $product->weight = $request->weight;
            $product->save();

      
            $product_id = Product::select('id')->where('id',$request->idProduct)->first();
            
            $discount = new Discount();
            $discount->id_product = $product_id->id;
            $discount->percentage = $request->diskon;
            $discount->start = $request->start;
            $discount->end = $request->end;
            
            $discount->save();

            return back()->with('success','Data has been edited!');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
     
        $check = TransactionDetail::where('product_id',$request->id_product)->first();
        if ($check){
            return back()->with('fail','Product is on Transactions!');
        }
        else{
            $product_category_details = Product_Category_Details::select('id')->where('product_id',$request->idproduct)->first();
            if($product_category_details){
                $product_category_details->delete();
            }
        
            $product_discount = Discount::select('id')->where('id_product',$request->idproduct)->first();
            if($product_discount){
                $product_discount->delete();
            }
            
            $product_images = Product_Image::select('id')->where('product_id',$request->idproduct)->first();
            if($product_images){
                $product_images->delete();
            }
           
            $product = Product::findOrFail($request->idproduct);
            $product->delete();
            return back()->with('success','Data has been deleted!');
        }
    }
}

