<?php

namespace App\Http\Controllers\BE;
use App\Models\HostingService;
use App\Models\DomainService;
use App\Models\LogAdmin;
use App\Models\TypeService;
use App\Models\AccountService;
use App\Models\Price;
use App\Models\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
use DB;

class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds = Storage::orderby('id','desc')->get();
      
        return view('BE.storage.show', compact('ds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
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

    public function storeajax(Request $request)
    {
       
      
        $ngs = new Storage([
            'id_user' => Auth::user()->id,
            'name_account' => $request->get('name_account'),
            'detail_account' => $request->get('detail_account'),
            
        ]);
        $name = Auth::user()->name;
        $namedv = $ngs->name_account;
        $log = new LogAdmin([
           'id_user' => Auth::user()->id, 
            'task' => " $name đã nhập kho tài khoản $namedv ",
        ]);
        $log->save();
        $ngs->save();
            
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
    public function update(Request $request)
    {
        $id=$request->get('id');
        $sp = Storage::find($id);
        $sp->name_account = $request->get('name_account');
        $sp->detail_account = $request->get('detail_account');
        $sp->id_user = Auth::user()->id;
        $name = Auth::user()->name;
        $namedv = $sp->name_account;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name sửa cập nhật lại kho tài khoản $namedv ",
        ]);
        $log->save();
          $sp->save();
          toast('Cập Nhật Thông Tin Tài Khoản Thành Công!','success');

        return redirect()->route('storage.index');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sp = Storage::find($id);
        $sp->delete();
     
        alert()->success('Thành công','Đã xóa Tài Khoản');
        $name = Auth::user()->name;
        $namedv = $sp->name_account;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name đã xóa tài khoản $namedv  trong kho",
        ]);
        $log->save();
        return redirect()->route('storage.index');
    }

    


}
