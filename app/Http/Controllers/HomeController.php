<?php

namespace App\Http\Controllers;
use App\Models\ServiceType;
use App\Models\VPSService;
use App\Models\HostingService;
use App\Models\TypeService;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //trang chủ ↓
    public function index()
    {
        return view('FE.home');
    }
    public function home()
    {
        return view('FE.home');
    }

    // trang liên hệ ↓
    public function contact()
    {
        return view('FE.contact');
    }

    // trang cá nhân ↓
    public function profile()
    {
        return view('FE.user-profile.profile');
    }
    public function edit_profile()
    {
        return view('FE.user-profile.edit-profile');
    }
    public function changepassword()
    {
        return view('FE.user-profile.changepassword');
    }

    // dịch vụ hosting ↓
    public function hosting()
    {
        return view('FE.home');
    }
    public function hosting_type($id)
    {
        $hosting_type = TypeService::where('slug',$id)->firstOrFail(); // lấy slug của url
        $hosting_detail = HostingService::where('service_group_id',$hosting_type->service_group_id)
        ->where('service_type_id',$hosting_type->service_type_id)
        ->where('display','1')->orderby('hosting_id','desc')->get();
       
        return view('FE.service.hosting-service.hosting-type',compact('hosting_type','hosting_detail'));
    }

    //dịch vụ vps ↓
    public function vps()
    {
        return view('FE.home');
    }
    public function vps_type($id)
    {
        $vps_type = TypeService::where('slug',$id)->firstOrFail(); // lấy slug của url
        $vps_detail = VPSService::where('service_group_id',$vps_type->service_group_id)
        ->where('service_type_id',$vps_type->service_type_id)
        ->where('display','1')->orderby('vps_id','desc')->get();
       
        return view('FE.service.vps-service.vps-type',compact('vps_type','vps_detail'));
    }

    // dịch vụ account ↓
    public function account()
    {
        return view('FE.service.account-service.index');
    }
    public function account_detail()
    {
        return view('FE.service.account-service.account-detail');
    }

    // dịch vụ domain ↓
    public function domain()
    {
        return view('FE.service.domain-service.index');
    }
    public function view_check_domain()
    {
        return view('FE.service.domain-service.check-domain');
    }
    public function check_domain(Request $request){
        $domain = $request->get('name-domain');
        return response()->json($domain); //không có domain
    }
    public function view_reg_domain(){
        $key_domain = "domain";
        return view('FE.payment',compact('key_domain'));
    }

    // thanh toán
 

    public function purchase_vps()
    {
        $key_vps = "vps";
        return view('FE.payment',compact('key_vps'));
    }
    public function purchase_hosting()
    {
        $key_hosting = "hosting";
        return view('FE.payment',compact('key_hosting'));
    }

  
}
