<?php

namespace App\Http\Controllers\BE;
use App\Models\Blog;
use App\Models\LogAdmin;
use App\Models\BlogType;
use App\Models\Price;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
use DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds = Blog::all();
        return view('BE.blog.show', compact('ds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['blog_type_id'] = DB::table("blog_type")->select("blog_type_id", "blog_type_name")->get();
        return view('BE.blog.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $fileimg = $request->file('image'); // tạo biến lấy dữ liệu từ input
            $filename = $fileimg->getClientOriginalName(); // lấy tên theo tên gốc của file
            $pathimg = $fileimg->move(public_path().'/image/', $filename); //chỗ chứa file

            // Store the record, using the new file hashname which will be it's new filename identity.
            $product = new Blog([
                "blog_type_id" => $request->get('blog_type_id'),
                "blog_name" => $request->get('blog_name'),
                "slug" =>\Str::slug($request->blog_name),
                "blog_image" => $filename,
                "display" =>1,
                "blog_content"=>$request->get('blog_content'),
                "blog_summary"=>$request->get('blog_summary'),
                "blog_view"=> 0,
                "blog_tag"=>$request->get('blog_tag'),
                "user_id"=>$request->get('user_id'),
                "blog_post_time"=>$request->get('blog_post_time'),
                "blog_special"=>1
            ]);
            $product->save();

                $name = Auth::user()->name;
                $namedv = $product->blog_name;
                $log = new LogAdmin([
                   
                   'id_user' => Auth::user()->id, 
                    'task' => " $name đã tạo blog $namedv ",
                ]);
                $log->save();
        toast('Thêm Bài Viết Thành Công!','success');
        return redirect()->route('blog.index');
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
        $data['blog_type_id'] = DB::table("blog_type")->select("blog_type_id", "blog_type_name")->get();
       
        return view('BE.blog.edit',compact('row'),$data);
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
        $sp = Blog::find($id);
        $fileimg = $request->file('image'); // tạo biến lấy dữ liệu từ input
        if ($fileimg){
            $fileimg = $request->file('image'); // tạo biến lấy dữ liệu từ input
            $filename = $fileimg->getClientOriginalName(); // lấy tên theo tên gốc của file
            $pathimg = $fileimg->move(public_path().'/Blog/', $filename); //chỗ chứa file
            
            $sp->blog_image = $filename;

            $sp->blog_name = $request->get('blog_name');
            $sp->slug =\Str::slug($request->get('blog_name'));
            $sp->blog_type_id = $request->get('blog_type_id');
            $sp->display = $request->get('display');
            $sp->blog_summary = $request->get('blog_summary');
            $sp->blog_content = $request->get('blog_content');
            $sp->blog_tag = $request->get('blog_tag');
            $sp->blog_view = $request->get('blog_view');
            $sp->blog_post_time = $request->get('blog_post_time');
            $sp->blog_special = $request->get('blog_special');
            $sp->user_id = $request->get('user_id');

        }
        else{

            $sp->blog_name = $request->get('blog_name');
            $sp->slug =\Str::slug($request->get('blog_name'));
            $sp->blog_type_id = $request->get('blog_type_id');
            $sp->display = $request->get('display');
            $sp->blog_summary = $request->get('blog_summary');
            $sp->blog_content = $request->get('blog_content');
            $sp->blog_tag = $request->get('blog_tag');
            $sp->blog_view = $request->get('blog_view');
            $sp->blog_post_time = $request->get('blog_post_time');
            $sp->blog_special = $request->get('blog_special');
            $sp->user_id = $request->get('user_id');
          

        }
      
    
           
        $name = Auth::user()->name;
        $namedv = $sp->blog_name;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name sửa thông tin bài viết $namedv ",
        ]);
        $log->save();
       
          $sp->save();
          toast('Cập Nhật Bài Viết Thành Công!','success');

        return redirect()->route('blog.index');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sp = Blog::find($id);
        $sp->delete();
        alert()->success('Thành công','Đã xóa bài viết');
        $name = Auth::user()->name;
        $namedv = $sp->blog_name;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name đã xóa bài viết $namedv ",
        ]);
        $log->save();
        return redirect()->route('blog.index');
    }

    
    function get_type_pro($id){
        $kq = DB::select("SELECT blog_type_id, blog_type_name FROM blog_type WHERE service_group_id=$id");
        foreach($kq as $row)  
        if($row != null){
        echo "<option value={$row->blog_type_id}> {$row->blog_type_name} </option>";
        }
        else
        {
        echo "<option value='0'> --None-- </option>";
        
        };
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
            Blog::where('blog_id',$request->id)->update(['display'=>$request->status]);
            // trả về status hiện tại để xử lý front end
            return $request->status;
        }}

        function changeStatus2(Request $request){
            //kiểm tra xem có phải ajax gửi request k
            if($request->ajax()){
                // không nhận được id thì báo lỗi
                if(!$request->id){
                    return "error";
                }
        
                // hien 1 _____ an 0
                //lấy nhóm sản phảm dựa theo id và update lai trạng thái
                Blog::where('blog_id',$request->id)->update(['special'=>$request->status]);
                // trả về status hiện tại để xử lý front end
                return $request->status;
            }}

}
