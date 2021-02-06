<?php

namespace App\Http\Controllers\BE;
use App\Models\LogAdmin;
use App\Models\Invoice;
use App\Models\OSsystem;
use Auth;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuickAddController extends Controller
{
    public function status_invoice(){
        $ds = LogAdmin::orderby('created_at','desc')->get();
        return view('BE.log.log-admin', compact('ds'));
    }
    public function os_system(){
        $ds = OSsystem::orderby('created_at','desc')->get();
        return view('BE.quickadd.show_os', compact('ds'));
    }
    public function os_system_create(Request $request){
      
        $ngs = new OSsystem([
             'name_os' => $request->get('name_os'),
            
        ]);
        $name = Auth::user()->name;
        $namedv = $ngs->name_os;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name đã tạo khu vực dịch vụ $namedv ",
        ]);
        $log->save();
         $ngs->save();
         $data['1'] = $ngs->id;
         $data['2'] =$ngs->name_os;
         $data['3'] = '1';
        return response()->json($data);
    }

    public function os_system_destroy($id)
    {
        $nsp = OSsystem::find($id);
        
            $name = Auth::user()->name;
        $namedv1 = GroupService ::find($id)->name_os;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name đã xóa nhóm khu vực $namedv1 ",
        ]);
        $log->save();
            $nsp->delete();
            toast('Đã Xóa Khu Vực Thành Công!','success');
            return redirect()->back();
        
    }

}

