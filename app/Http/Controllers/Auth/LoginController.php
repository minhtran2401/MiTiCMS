<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Models\Online;
use App\Models\Counter;
use Carbon\Carbon;
use DB;
use Session;
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
    
    public function show_login_form(Request $request)
    {
        $time_now = Carbon::now('Asia/Ho_Chi_Minh');
        $user_online = $request->session()->getId();
            if (Online::where('session_id', '=', $user_online)->count() > 0) {
               // user found
            }else {
                $online = new Online([
                    'session_id' => $user_online,
                ]);
                $online->save();   
            }
            // Online::whereDate('created_at', '>=', date('Y-m-d H:i:s',strtotime('1 minutes')) )->delete();
            $time_db = Online::get();
            foreach ($time_db as $item) {
                $time_old = $item->created_at;
                $time_id = $item->id;
                $check_time = $time_now->diffInMinutes($time_old);
                $check_time_counter = $time_now->diffInMinutes($time_old);
                $ip_user = $_SERVER['REMOTE_ADDR'];
                if (Counter::where('time', '=', $time_old)->count() > 0) {
                    // time session found
                 } else{
                DB::table('counters')
                        ->whereDate('time', '>=', date('Y-m-d H:i:s',strtotime('-1 minutes')) )
                        ->insert(['time' => $time_old,'ip'=>$ip_user]);
                        }  // check trùng thời gian session
                    if ($check_time_counter > 1) { //set 1 phút
                            $deletedRows = Online::where('id', $time_id)->delete();
                            }
                }
        return view('auth.login');
    }
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
            'name' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);
        
        return response()->json("1");
        
    }
    public function logout()
    {
        \Auth::logout();
        return redirect()->route('login');
    }
    
}
