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

    public function thong_ke_truy_cap(){  
     
        $month =  Carbon::now()->month;
        $year =  Carbon::now()->year; 
        $get_all_colum_counter =  Counter::select('id','time', DB::raw("DATE_FORMAT(time, '%d') days"))
        ->where(DB::raw("DATE_FORMAT(time, '%Y')"),'=',$year)
        ->where(DB::raw("DATE_FORMAT(time, '%m')"),'=',$month)
        ->get()
        ->groupBy('days'); 
        
        $count_day_duplicate = [];
        $count_day = [];
        foreach ($get_all_colum_counter as $key => $value) {
            $count_day_duplicate[(int)$key] = count($value);
        }
        for($i = 1; $i <= Carbon::now()->daysInMonth; $i++){
            if(!empty($count_day_duplicate[$i])){
                $count_day[$i] = $count_day_duplicate[$i];    
            }else{
                $count_day[$i] = 0;    
            }
            $respon[] = array($i, $count_day[$i]);
        }
        return response()->json($respon);
    }

    public function shortday(Request $resquest){
        $month = $resquest->get('getmonth');
        $year = $resquest->get('getyear');
        $timeget = "$year-$month";
        // dd($timeget);
    
      $get_short_colum_counter =  Counter::select('id','time', DB::raw("DATE_FORMAT(time, '%d') days"))
        // ->where('date','=',$timeget)
        ->where(DB::raw("DATE_FORMAT(time, '%Y')"),'=',$year)
        ->where(DB::raw("DATE_FORMAT(time, '%m')"),'=',$month)
        ->get()
        ->groupBy('days'); 

        $short_count_day_duplicate = [];
        $short_count_day = [];
        foreach ($get_short_colum_counter as $keyz => $valueshort) {
            $short_count_day_duplicate[(int)$keyz] = count($valueshort);
        }
        for($i = 1; $i <= Carbon::create($year,$month,1)->daysInMonth; $i++){
            if(!empty($short_count_day_duplicate[$i])){
                $short_count_day[$i] = $short_count_day_duplicate[$i];    
            }else{
                $short_count_day[$i] = 0;    
            }
            $response[] = array($i, $short_count_day[$i]);
            // $date_data = array($month,$year);
            // $get_data[] = array($date_data,$response);
            
        }

        return response()->json($response);
        
        

    }

}
