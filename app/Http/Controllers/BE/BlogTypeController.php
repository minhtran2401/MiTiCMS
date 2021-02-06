<?php

namespace App\Http\Controllers\BE;
use App\Models\BlogType;
use App\Models\LogAdmin;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

use App\Http\Controllers\Controller;


class BlogTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds = BlogType::orderby('blog_type_id','desc')->get();
        return view('BE.blog-type.show', compact('ds'));
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
       
       
        $ngs = new BlogType([
            'slug' =>\Str::slug($request->blog_type_name),
            'blog_type_name' => $request->get('blog_type_name'),
            'display' => 1,
        ]);
       
        toast('Thêm Loại Blog Thành Công!','success');
        $ngs->save();
        return redirect ()->route('BE.blog-type.show');
      
    }
    public function storeajax(Request $request)
    {
       
       
        $ngs = new BlogType([
            'slug' =>\Str::slug($request->blog_type_name),
            'blog_type_name' => $request->get('blog_type_name'),
            'display' => 1,
        ]);
        $name = Auth::user()->name;
        $namedv = $ngs->blog_type_name;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name đã tạo nhóm dịch vụ $namedv ",
        ]);
        $log->save();
         $ngs->save();
         $data['1'] = $ngs->blog_type_id;
         $data['2'] =$ngs->blog_type_name;
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
        $ngs = BlogType ::find($id);
      
       
        $ngs->slug =\Str::slug($request->blog_type_name);
        $ngs->blog_type_name = $request->get('blog_type_name');
        $ngs->display = $request->get('display');
        $name = Auth::user()->name;
        $namedv1 = BlogType ::find($id)->blog_type_name;
        $namedv = $ngs->blog_type_name;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name đã sửa loại blog $namedv1 thành $namedv ",
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
        $nsp = BlogType::find($id);
        if ($nsp->checkblog()->get()->toArray()==null) {
            $name = Auth::user()->name;
            $namedv1 = BlogType::find($id)->blog_type_name;
            $log = new LogAdmin([
            
            'id_user' => Auth::user()->id, 
                'task' => " $name đã xóa loại blog $namedv1 ",
            ]);
        $log->save();
            $nsp->delete();
            toast('Đã Xóa Loại Blog Thành Công!','success');
            return redirect()->back();
        }else{
            alert()->error('Lỗi','Không thể xóa do đang liên kết blog');

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
            BlogType::where('blog_type_id',$request->id)->update(['display'=>$request->status]);
            // trả về status hiện tại để xử lý front end
            return $request->status;
        }
    }
}
