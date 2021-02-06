<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    // public function show_login_form()
    // {
    //     return view('login');
    // }
    public function process_login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            
        ]);

        $credentials = $request->except(['_token']);

        $user = User::where('email',$request->email)->where('active',1)->first();
       
        
        
         if (auth()->attempt($credentials)) {  
         
                 return response()->json(1); //đúng tk mk   
           
        }
        else {
            return response()->json(0); //sai tk mk
        }
    }
    public function process_signup(Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
            
        $user = User::create([
            'name' => trim($request->input('basic-default-name')),
            'email' => strtolower($request->input('basic-default-email')),
            'password' => bcrypt($request->input('basic-default-password')),
        ]);
        
        return response()->json("1");
        
    }
    public function logout()
    {
        \Auth::logout();
        return redirect()->route('login');
    }
    
}
