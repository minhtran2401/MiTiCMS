<?php

namespace App\Http\Controllers;
use App\Models\ServiceType;
use App\Models\VPSService;
use App\Models\ServerService;
use App\Models\HostingService;
use App\Models\TypeService;
use App\Models\AccountService;
use DB;
use Validator;
use Hash;
use App\Models\User;
use Auth;
use App\Models\Cart;
use App\Models\Invoice;
use App\Models\Support;
use App\Models\Blog;
use Session;
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
    public function index(Request $request)
    {
 
        return view('FE.home');
    }
    public function home()
    {
       
        return view('FE.home');
       
    }

    function searchblog(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('blog')
            ->where('blog_name', 'LIKE', "%{$query}%")
            ->get();
            $output = '<div class="list-group" style=" position:relative;" >';
            foreach($data as $row)
            {
               $output .= '
               <li class=" list-group-item list-group-item-action"><a href="chi-tiet-blog/'. $row->slug .'">'.$row->blog_name.'</a></li>
               ';
           }
           $output .= '</div>';
           echo $output;
       }
    }

    public function blog_detail($id){
        $blog = Blog::where('slug',$id)->first();
        return view('FE.blog_detail',compact('blog'));
    }

    public function how_to_pay(){
        $ds= DB::table('payment_method')->where('display','1')->paginate(6);
        return view('FE.how-to-pay',compact('ds'));
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
    //dịch vụ server

    public function server()
    {
        return view('FE.home');
    }
    public function server_type($id)
    {
        $server_type = TypeService::where('slug',$id)->firstOrFail(); // lấy slug của url
        $server_detail = ServerService::where('service_group_id',$server_type->service_group_id)
        ->where('service_type_id',$server_type->service_type_id)
        ->where('display','1')->orderby('server_id','desc')->get();
       
        return view('FE.service.server-service.server-type',compact('server_type','server_detail'));
    }

    // dịch vụ account ↓
    public function account()
    {
        return view('FE.service.account-service.index');
    }
    public function account_type($id)
    {
        $account_type = TypeService::where('slug',$id)->firstOrFail(); // lấy slug của url
        $account_detail = AccountService::where('service_group_id',$account_type->service_group_id)
        ->where('service_type_id',$account_type->service_type_id)
        ->where('display','1')->orderby('account_id','desc')->get();
        return view('FE.service.account-service.account-type',compact('account_type','account_detail'));
        // return view('FE.service.account-service.account-detail');
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
        Session::forget('Cart');
        
        $domain = $request->get('name-domain');
        $data['product'] = $domain;
        // $data['product'] = array('name' => $domain);
        $data['price'] = "100,000 đ";
        $data['time'] = "1 năm";
        if($data != null){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $id = null;
            $newCart->AddCart($data , $id);
            $request->Session()->put('Cart', $newCart);  

        }
        return response()->json($domain); // có domain
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
    public function purchase_server()
    {
        $key_server = "server";
        return view('FE.payment',compact('key_server'));
    }
    public function purchase_hosting()
    {
        $key_hosting = "hosting";
        return view('FE.payment',compact('key_hosting'));
    }
    public function purchase_account()
    {
        $key_account = "account";
        return view('FE.payment',compact('key_account'));
    }
  
    public function update_info(Request $request, $id){
        $id = Auth::user()->id;
        $dv = User::Find($id);
        $dv->name = request()->get('name');
        $dv->facebook = request()->get('facebook');
        $dv->phone = request()->get('phone');
        $dv->update();
        toast('Đã Cập Nhật Thông Tin Cá Nhân','success');
        return redirect()->back();
    }

    // đổi mật khẩu
    public function admin_credential_rules(array $data)
    {
      $messages = [
        'current-password.required' => 'Hãy nhập mật khẩu hiện tại',
        'password.required' => 'Hãy nhập mật khẩu',
      ];

      $validator = Validator::make($data, [
        'current-password' => 'required',
        'password' => 'required|same:password',
        'password_confirmation' => 'required|same:password',
      ], $messages);

      return $validator;
    }

    public function postCredentials(Request $request)
    {
      if(Auth::Check())
      {
        $request_data = $request->All();
        $validator = $this->admin_credential_rules($request_data);
        if($validator->fails())
        {
        //   return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
        alert()->warning('Thất bại','mật khẩu nhập lại chưa khớp !');
        return redirect()->back();
        }
        else
        {
          $current_password = Auth::User()->password;
          if(Hash::check($request_data['current-password'], $current_password))
          {
            $user_id = Auth::User()->id;
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($request_data['password']);
            $obj_user->save();
            toast('Đổi mật khẩu thành công !','success');
            return redirect()->back();

          }
          else
          {
            alert()->warning('Thất bại','Sai thông tin, hãy thử lại');
            return redirect()->back();
          }
        }
      }
      else
      {
        return redirect()->to('/');
      }
    }

    // lịch sử mua hàng

     public function history_buy(Request $request)
    {
        $ds = Invoice::join('users','invoice.user_id','users.id')
        // ->join('detail_account','invoice.id','detail_account.id_invoice')
        ->where('invoice.user_id',Auth::user()->id)->orderby('id_invoice','desc')
        ->get();
        return view('FE.user-profile.purchased', compact('ds'));
    }

    // gửi hỗ trợ

    public function send_support(Request $request){
        $lt = new Support([
            'id_user' => Auth::user()->id,
            'subject' => $request->get('subject'),
            'content' => $request->get('content'),
            'status' => 0,
        ]);
        toast('Đã gửi hỗ trợ, chúng tôi sẽ phản hồi qua mail','success');
        $lt->save();
        return redirect()->back();
    }




}
