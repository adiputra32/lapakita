<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {   
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        $users = Auth::user();
        return view('home',['users'=> $users]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        if (Auth::check()) {
            $user = Auth::user();
            $showuser = User::select('users.*')->where('users.id',Auth::id())->get();
            
            // echo $user;
            return view('user.edit', compact('user','showuser'));
        } else {
            return view('user.edit');
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
       

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
        
        $hashedPassword = User::find($id)->password;
        $userUpdate = User::find($id);
        
        
        if (Hash::check($request->oldpassword, $hashedPassword)) {

            $userUpdate->name = $request->name;
            $userUpdate->email = $request->email;
            $userUpdate->password = Hash::make($request->newpassword) ;

            if($file=$request->file('foto')){
                
                $folderName = 'user';
                $fileName = 'user'.'_image';
                $fileExtension = $file->getClientOriginalExtension();
                $fileNameToStorage = $fileName.'_'.time().'.'.$fileExtension;
                $filePath = $file->move(public_path('user/'.$folderName) , $fileNameToStorage); 
                $userUpdate->profile_image = $fileNameToStorage;
            }

            $userUpdate->save();

            return redirect()->route('user.show');
        }
        
        
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
