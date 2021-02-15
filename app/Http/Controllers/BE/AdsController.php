<?php

namespace App\Http\Controllers\BE;
use App\Models\Ads;
use App\Models\LogAdmin;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

use App\Http\Controllers\Controller;


class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds = Ads::orderby('ads_id','desc')->get();
        return view('BE.ads.show', compact('ds'));
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
        $request->validate([
            'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
        ]);

        // Save the file locally in the storage/public/ folder under a new folder named /product
        $fileimg = $request->file('ads_iamge'); // tạo biến lấy dữ liệu từ input
        $filename = $fileimg->getClientOriginalName(); // lấy tên theo tên gốc của file
        $pathimg = $fileimg->move(public_path().'/image/', $filename); //chỗ chứa file
       
        $ngs = new Ads([
            'ads_name' => $request->get('ads_name'),
            'ads_image' => $filename,
        ]);
       
        toast('Thêm Tên Nhóm Sản Phẩm Thành Công!','success');
        $ngs->save();
        return redirect ()->route('BE.ads.show');
      
    }
    public function storeajax(Request $request)
    {
       
        $fileimg = $request->file('ads_image'); // tạo biến lấy dữ liệu từ input
        $filename = $fileimg->getClientOriginalName(); // lấy tên theo tên gốc của file
        $pathimg = $fileimg->move(public_path().'/image/', $filename); //chỗ chứa file

        $ngs = new Ads([
            'ads_name' => $request->get('ads_name'),
            'ads_image' => $filename,
        ]);
        $name = Auth::user()->name;
        $namedv = $ngs->ads_name;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name đã tạo quảng cáo $namedv ",
        ]);
        $ngs->save();
        $log->save();
        return redirect()->back();
       
       
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
        $ngs = Ads ::find($id);
    
        $ngs->ads_name = $request->get('ads_name');
        // $ngs->ads_image = $request->get('ads_image');
        $name = Auth::user()->name;
        $namedv1 = Ads ::find($id)->ads_name;
        $namedv = $ngs->ads_name;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name đã sửa quảng cáo $namedv1 thành $namedv ",
        ]);
        $log->save();
        $ngs->save();
        toast('Đã Cập Nhật quảng cáo Thành Công!','success');
        return redirect()->route('ads.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nsp = Ads::find($id);
        $name = Auth::user()->name;
        $namedv1 = Ads ::find($id)->ads_name;
        $log = new LogAdmin([
           'id_user' => Auth::user()->id, 
            'task' => " $name đã xóa quảng cáo $namedv1 ",
        ]);
        $log->save();
        $nsp->delete();
        toast('Đã Xóa quảng cáo Thành Công!','success');
        return redirect()->back();
    }

    
}
