<?php

namespace App\Http\Controllers\BE;
use App\Models\InfoSite;
use App\Models\LogAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
use DB;

class InfoSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds = InfoSite::all();
        return view('BE.infosite.show', compact('ds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BE.infosite.create');
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
            'image' => 'mimes:jpeg,bmp,png'
        ]);

        $fileimg = $request->file('image');
        $filename = $fileimg->getClientOriginalName();
        $pathimg = $fileimg->move(public_path().'/image/',$filename);
        $is = new InfoSite([
            'logo'=>$filename,
            'name'=>$request->get('name'),
            'phone1'=>$request->get('phone1'),
            'phone2'=>$request->get('phone2'),
            'email1'=>$request->get('email1'),
            'email2'=>$request->get('email2'),
            'ads'=>$request->get('ads'),
            'protect'=>$request->get('protect'),
            'status'=>$request->get('status'),
        ]);
        $is->save();
        $name = Auth::user()->name;
        $log =  new LogAdmin([
            'id_user' =>Auth::user()->id,
            'task' => "$name đã cập nhật thông tin"
        ]);
        $log->save();
        toast('Đã bổ sung thông tin trang web!', 'success');
        return redirect()->route('infosite.index');
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
        $row = InfoSite::find($id);
        return view('BE.infosite.edit', compact('row'));
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
        $is = InfoSite::find($id);
        $fileimg = $request->file('logo');

        if($fileimg){
            $fileimg = $request->file('logo');
            $filename = $fileimg->getClientOriginalName();
            $pathimg = $fileimg->move(public_path().'/image/', $filename);
            $is->logo = $filename;
            $is->name = $request->get('name');
            $is->phone1 = $request->get('phone1');
            $is->phone2 = $request->get('phone2');
            $is->email1 = $request->get('email1');
            $is->email2 = $request->get('email2');
            $is->ads = $request->get('ads');
            $is->protect = $request->get('protect');
            $is->status = $request->get('status');
        }
        else{
            $is->name = $request->get('name');
            $is->phone1 = $request->get('phone1');
            $is->phone2 = $request->get('phone2');
            $is->email1 = $request->get('email1');
            $is->email2 = $request->get('email2');
            $is->ads = $request->get('ads');
            $is->protect = $request->get('protect');
            $is->status = $request->get('status');
        }
        $name = Auth::user()->name;
        $log = new LogAdmin([
            'id_user' => Auth::user()->id,
            'task' => "$name đã cập nhật thông tin trang web",
        ]);
        $is->save();
          toast('Cập Nhật Thành Công!','success');
        return redirect()->route('infosite.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //không có xóa thông tin web được nhé
    }

    function changeStatus(Request $request){
        if($request->ajax()){
            if(!$request->id){
                return "error";
            }
            InfoSite::where('id',$request->id)->update(['status'=>$request->status]);
            return $request->status;
        }
    }
    function changeProtect(Request $request){
        if($request->ajax()){
            if(!$request->id){
                return "error";
            }
            InfoSite::where('id',$request->id)->update(['protect'=>$request->protect]);
            return $request->protect;
        }
    }
}
