<?php

namespace App\Http\Controllers\BE;
use App\Models\HostingService;
use App\Models\DomainService;
use App\Models\LogAdmin;
use App\Models\TypeService;
use App\Models\AccountService;
use App\Models\Price;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds = User::where('role',0)->get();
        return view('BE.user.show', compact('ds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data['type_service'] = DB::table("service_types")->select("service_type_id", "service_type_name")->get();
        // $data['group_service'] = DB::table("service_groups")->select("service_group_id", "service_group_name")->get();
        // return view('BE.hosting.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          // store ajax rồi
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
       
        $row = User::find($id);
        return view('BE.user.edit',compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sp = User::find($id);
 
            $sp->name = $request->get('name');
            $sp->phone = $request->get('phone');
            $sp->email = $request->get('email');
            $sp->active = $request->get('active');

        $name = Auth::user()->name;
        $namedv = $sp->name;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name đã cập nhật thông tin khách hàng $namedv ",
        ]);
        $log->save();
          $sp->save();
          toast('Cập Nhật Thông Tin Khách Hàng Thành Công!','success');

        return redirect()->route('user.index');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sp = User::find($id);
        $sp->delete();
        alert()->success('Thành công','Đã xóa Người Dùng');
        $name = Auth::user()->name;
        $namedv = $sp->name;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name đã xóa người dùng $namedv ",
        ]);
        $log->save();
        return redirect()->route('user.index');
    }

    
   

    
    function changeStatus(Request $request){
        //kiểm tra xem có phải ajax gửi request k
        if($request->ajax()){
            // không nhận được id thì báo lỗi
            if(!$request->id){
                return "error";
            }
    
            // hien 1 _____ an 0
            //lấy nhóm sản phảm dựa theo id và update lai trạng thái
            User::where('id',$request->id)->update(['active'=>$request->status]);
            // trả về status hiện tại để xử lý front end
            return $request->status;
        }}

     
    

}
