<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout','logoutUser']);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required||min:6'
            
            ]);

        $credential = [
            'email'=> $request->email,
            'password'=>$request->password
        ];

        if (Auth::guard('web')->attempt($credential,$request->member)){
            return redirect()->intended(route('user.home'));

        }

        return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function logoutUser()
    {
        Auth::guard('web')->logout();
        return Redirect::route('user.login');
    }
}
