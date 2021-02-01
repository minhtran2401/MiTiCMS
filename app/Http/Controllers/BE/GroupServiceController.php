<?php

namespace App\Http\Controllers\BE;
use App\Models\GroupService;
use App\Models\LogAdmin;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

use App\Http\Controllers\Controller;


class GroupServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds = GroupService::orderby('service_group_id','desc')->get();
        return view('BE.group-service.show', compact('ds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       
        $ngs = new GroupService([
            'slug' =>\Str::slug($request->name_group_service),
            'service_group_name' => $request->get('name_group_service'),
            'dislay' => 1,
        ]);
       
        toast('Thêm Tên Nhóm Sản Phẩm Thành Công!','success');
        $ngs->save();
        return redirect ()->route('BE.group-service.show');
      
    }
    public function storeajax(Request $request)
    {
       
       
        $ngs = new GroupService([
            'slug' =>\Str::slug($request->name_group_service),
             'service_group_name' => $request->get('name_group_service'),
            'dislay' => 1,
        ]);
        $name = Auth::user()->name;
        $namedv = $ngs->service_group_name;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name đã tạo nhóm dịch vụ $namedv ",
        ]);
        $log->save();
         $ngs->save();
         $data['1'] = $ngs->service_group_id;
         $data['2'] =$ngs->service_group_name;
         $data['3'] = '1';
             return response()->json($data);
       
       
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
        $ngs = GroupService ::find($id);
      
       
        $ngs->slug =\Str::slug($request->name_group);
        $ngs->service_group_name = $request->get('name_group');
        $ngs->display = $request->get('display');
        $name = Auth::user()->name;
        $namedv1 = GroupService ::find($id)->service_group_name;
        $namedv = $ngs->service_group_name;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name đã sửa nhóm dịch vụ $namedv1 thành $namedv ",
        ]);
        $log->save();
          $ngs->save();
          if( $ngs->save()){
              return response()->json(1);
          }
          else{
            return response()->json(0);
          }
        
        // return redirect()->route('nhom-san-pham.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nsp = GroupService::find($id);
        if ($nsp->checktype()->get()->toArray()==null) {
            $name = Auth::user()->name;
        $namedv1 = GroupService ::find($id)->service_group_name;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name đã xóa nhóm dịch vụ $namedv1 ",
        ]);
        $log->save();
            $nsp->delete();
            toast('Đã Xóa Nhóm Dịch Vụ Thành Công!','success');
            return redirect()->back();
        }else{
            alert()->error('Lỗi','Không thể xóa do đang liên kết loại dịch vụ');

            // toast('Không Thể Xóa Do Đang Chứa Loại Dịch Vụ!','error');
            return redirect()->back();
        }
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
            GroupService::where('service_group_id',$request->id)->update(['display'=>$request->status]);
            // trả về status hiện tại để xử lý front end
            return $request->status;
        }
    }
}
