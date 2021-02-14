<?php

namespace App\Http\Controllers\BE;
use App\Models\User;
use App\Models\Online;
use App\Models\Counter;
use Carbon\Carbon;
use DB;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{  
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    
    // public function __construct()
    // {
    //     $this->middleware('admin');
    // }

    public function show_login_form()
    {

        return view('BE.auth.login');
    }
    public function process_login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->except(['_token']);

        $user = User::where('email',$request->email)->where('role','1')->first();

        if (auth()->attempt($credentials)) {
            if ($user) {
               $name = $user->name;
 toast("Chào mừng $name quay trở lại ",'success','top-right');
               
            return response()->json(1); // đúng

        }else{
            return response()->json(0); // đúng
        }}
        
       
    }
    public function show_signup_form()
    {
        return view('backend.register');
    }
    public function process_signup(Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
 
        $user = User::create([
            'name' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);

        session()->flash('message', 'Your account is created');
       
        return redirect()->route('login');
    }
    public function logout()
    {
        \Auth::logout();

        return redirect()->route('admin.login');
    }



}
