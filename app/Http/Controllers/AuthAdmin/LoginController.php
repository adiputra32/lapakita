<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
  

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except(['logout','logoutAdmin']);
    }

    public function showLoginForm(){
        return view('authAdmin.login');
    }

    public function login(Request $request){
        $this->validate($request,[
            'userName'=>'required',
            'password'=>'required||min:6'
            
            ]);

        $credential = [
            'username'=> $request->userName,
            'password'=>$request->password
        ];

        if (Auth::guard('admin')->attempt($credential,$request->member)){
            return redirect()->intended(route('admin.home'));

        }

        return redirect()->back()->withInput($request->only('username','remember'));
    }

    public function logoutAdmin()
    {
        Auth::guard('admin')->logout();
        return Redirect::route('admin.login');
    }
}
