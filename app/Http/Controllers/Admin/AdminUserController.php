<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Admin;

class AdminUserController extends Controller
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
        $users = Auth::user();
        $admins = Admin::get();
               return view('admin.user.user',['users'=>$users,'admins'=>$admins]);
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
        $users = Auth::user();
        $this->validate($request,[
            'phone' => 'numeric',
            'username' => 'required|max:20',
            'name' => 'required',
            'image' => 'required',
            'password' => 'required|min:8',
        ]);
      
        if($request->has('image')){
            
            $folderName = 'admin';
            $fileName = 'admin'.'_image';
            $fileExtension = $request->image->getClientOriginalExtension();
            $fileNameToStorage = $fileName.'_'.time().'.'.$fileExtension;
            $filePath = $request->image->storeAs('public/'.$folderName , $fileNameToStorage); 
        } 
        else {
            $fileNameToStorage = 'null.jpg';
        }
            

       $admin = Admin::create([
            'username' => $request->username,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'profile_image' => $fileNameToStorage,
        ]);

       

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
