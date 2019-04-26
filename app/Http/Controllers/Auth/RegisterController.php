<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        
        if($data['foto']){
            
            $folderName = 'user';
            $fileName = $data['foto'].'_image';
            $fileExtension = $data['foto']->getClientOriginalExtension();
            $fileNameToStorage = $fileName.'_'.time().'.'.$fileExtension;
            
            $fileNameToStorage1 = substr($fileNameToStorage,21);;
            $filePath = $data['foto']->storeAs('public/'.$folderName , $fileNameToStorage1); 
        } 
        else {
            $fileNameToStorage = 'null.jpg';
        }
            

       $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => 1,
            'profile_image' => $fileNameToStorage1,
        ]);

        return $user;
    }

    public function register(Request $request)
    {
        
        
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect(route('user.home'));
    }

    // public function create(Request $request){
        
        
    //     if($request->foto){
            
    //         $folderName = 'user';
    //         $fileName = $request->foto.'_image';
    //         $fileExtension = $request->foto->getClientOriginalExtension();
    //         $fileNameToStorage = $fileName.'_'.time().'.'.$fileExtension;
            
    //         $fileNameToStorage1 = substr($fileNameToStorage,21,23);
    //         ;
    //         $filePath = $request->foto->storeAs('public/'.$folderName , $fileNameToStorage1); 
    //     } 
    //     else {
    //         $fileNameToStorage = 'null.jpg';
    //     }

    //     $user = new User();
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->status = 1;
    //     $user->profile_image = $fileNameToStorage1;
    //     $user->password = bcrypt($request->password);
    //     $user->save();
    //     return redirect()->route('user.home');
          
    // }

    protected function guard()
    {
        return Auth::guard('');
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}




