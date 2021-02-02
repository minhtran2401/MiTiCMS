<?php

namespace App\Http\Controllers\BE;
use App\Models\TypeService;
use App\Models\GroupService;
use App\Models\LogAdmin;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use App\Http\Controllers\Controller;
use Auth;

class TypeServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds = TypeService::orderby('service_type_id','desc')->get();
        $gr = DB::table('service_groups')->get();
        return view('BE.type-service.show', compact('ds','gr'));
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
       
       
        $ngs = new TypeService([
            'slug' =>\Str::slug($request->name_type_service),
            'service_group_id' =>$request->get('service_group_id'),
            'service_type_name' => $request->get('name_type_service'),
            'dislay' => 1,
        ]);
        toast('Thêm Tên Nhóm Sản Phẩm Thành Công!','success');
       
        $ngs->save();
        return redirect ()->route('BE.group-service.show');
      
    }
    public function storeajax(Request $request)
    {
       
       
        $ngs = new TypeService([
            'slug' =>\Str::slug($request->name_type_service),
            'service_group_id' =>$request->get('service_group_id'),
            'service_type_name' => $request->get('name_type_service'),
            'dislay' => 1,
        ]);
        $name = Auth::user()->name;
        $namedv = $ngs->service_type_name;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name đã tạo loại dịch vụ $namedv ",
        ]);
        $log->save();
         $ngs->save();
      
        $name = GroupService::find($ngs->service_group_id);
            // $name = $tl->service_group_name;
         $data['4'] = $name->service_group_name;
         $data['1'] = $ngs->service_type_id;
         $data['2'] =$ngs->service_type_name;
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
        $ngs = TypeService ::find($id);
      
       
        $ngs->slug =\Str::slug($request->name_group);
        $ngs->service_type_name = $request->get('name_type');
        $ngs->service_group_id = $request->get('id_group');
        $ngs->display = $request->get('display');
        $name = Auth::user()->name;
        $namedv1 = TypeService ::find($id)->service_type_name;
        $namedv = $ngs->service_type_name;
        $id1 = TypeService ::find($id)->service_group_id;
        $id2 = $ngs->service_group_id;
        $name1 = GroupService::find($id1);
        $name2 = GroupService::find($id2);
        
        if($id1 == $id2){
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name đã sửa loại dịch vụ $namedv1 thành $namedv ",
        ]);
    }
    else{
        $log = new LogAdmin([
           
            'id_user' => Auth::user()->id, 
             'task' => " $name đã sửa loại dịch vụ $namedv1 thành $namedv và nhóm $name1->service_group_name thành $name2->service_group_name",
         ]);
    }
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
      
        $nsp = TypeService::find($id);
        if ($nsp->checkvps()->get()->toArray()==null) {
            $name = Auth::user()->name;
        $namedv1 = Typeservice ::find($id)->service_type_name;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name đã xóa loại dịch vụ $namedv1 ",
        ]);
        $log->save();
            $nsp->delete();
            toast('Đã Xóa Loại Dịch Vụ Thành Công!','success');
            return redirect()->back();
        }else{
            alert()->error('Lỗi','Không thể xóa do đang liên kết với dịch vụ');

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
            TypeService::where('service_type_id',$request->id)->update(['display'=>$request->status]);
            // trả về status hiện tại để xử lý front end
            return $request->status;
        }
    }
}
