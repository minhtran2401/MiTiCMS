<?php

namespace App\Http\Controllers\BE;
use App\Models\TypeService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use App\Http\Controllers\Controller;


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
        return view('BE.type-service.show', compact('ds'));
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
         $ngs->save();
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
        $ngs = GroupService ::find($id);
      
       
        $ngs->slug =\Str::slug($request->name_group);
        $ngs->service_group_name = $request->get('name_group');
        $ngs->display = $request->get('display');
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
        $nsp->delete();
        toast('Đã Xóa Nhóm Dịch Vụ Thành Công!','success');
        return redirect()->back();
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
