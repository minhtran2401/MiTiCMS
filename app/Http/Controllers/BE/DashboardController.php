<?php
namespace App\Http\Controllers\BE;
use App\Mail\DetailAccountMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Carbon\Carbon;
use App\Models\LogAdmin;
use App\Models\Invoice;
use App\Models\DetailAccount;
use RealRashid\SweetAlert\Facades\Aler;
class DashboardController extends Controller
{
    public function tongquat(){
        $data['truycap'] = 4;
        $data['thunhap'] = '32,000,000 đ';
        $data['customer'] = DB::table('users')->where('role',0)->get()->count();
        $dv1 = $data['service']['server'] = DB::table('server_service')->get()->count();
        $dv2 = $data['service']['hosting'] =DB::table('hosting_service')->get()->count();
        $dv3 = $data['service']['vps'] = DB::table('vps_service')->get()->count();
        $dv4 = $data['service']['account']=DB::table('account_service')->get()->count();
        $data['allservice'] = $dv1 + $dv2 + $dv3 + $dv4 + 1; 
        $data['billed'] = DB::table('invoice')->where('status',3)->get()->count();
        $data['tienvon'] = '27,245,000 đ';
        $data['tienloi'] = '13,356,000 đ';
        return view('BE.layout.dashboard',compact('data'));
    }
}
