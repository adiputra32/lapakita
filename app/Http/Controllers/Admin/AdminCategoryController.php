<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;

class AdminCategoryController extends Controller
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
        $categories = Category::get();
        return view('admin.category.category', ['admin'=>$admin,'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $check = Category::where('category_name',$request->nama)->first();
        if ($check){
            return back()->with('fail','Category already exist!');
        }
        else{

            $courier = Category::create([
                'category_name' => $request->nama,
                'jenis' => $request->jenis
            ]);
            $courier->save();
            return back()->with('success','Data has been submitted!');
        }
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
        //
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
            $category = Category::find($request->idcategory);
            $category->category_name = $request->mycategory;
            $category->jenis = $request->jenis;
            $category->save();
            return back()->with('success','Data has been edited!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // $check = Product::where('_id',$request->idcourier)->first();
        // if ($check){
        //     return back()->with('fail','Courier is being used in transaction!');
        // }
        // else{
            $category = Category::findOrFail($request->idcategory);
            $category->delete();
            return back()->with('success','Data has been deleted!');
        }
    }

