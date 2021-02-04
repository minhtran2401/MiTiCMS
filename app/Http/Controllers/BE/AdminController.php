<?php
namespace App\Http\Controllers\BE;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard(){
        return view('BE.layout.dashboard');
    }

    function change_theme(Request $request){
        //kiểm tra xem có phải ajax gửi request k
        if($request->ajax()){
            // không nhận được id thì báo lỗi
            if(!$request->id){
                return "error";
            }
            // hien 1 _____ an 0
            //lấy nhóm sản phảm dựa theo id và update lai trạng thái
            User::where('id',$request->id)->update(['theme'=>$request->status]);
            // trả về status hiện tại để xử lý front end
            return $request->status;
        }}

}
