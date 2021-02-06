<?php

namespace App\Http\Controllers\BE;
use App\Models\LogAdmin;
use App\Models\StatusInvoice;
use App\Models\OSsystem;
use Auth;
use Schema;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuickAddController extends Controller
{
    public function status_invoice(){
        $ds = StatusInvoice::orderby('created_at','desc')->get();
        return view('BE.quickadd.show_status', compact('ds'));
    }


    public function status_invoice_create(Request $request){
      
        $ngs = new StatusInvoice([
             'name_status_invoice' => $request->get('name_status_invoice'),
            
        ]);
        $name = Auth::user()->name;
        $namedv = $ngs->name_os;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name đã tạo trạng thái đơn hàng $namedv ",
        ]);
        $log->save();
         $ngs->save();
         $data['1'] = $ngs->id;
         $data['2'] =$ngs->name_status_invoice;
         $data['3'] = '1';
        return response()->json($data);
    }
  
    public function status_invoice_destroy($id)
    {
        $nsp = StatusInvoice::find($id);
        $name = Auth::user()->name;
        $namedv1 = StatusInvoice::find($id)->name_status_invoice;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name đã xóa trạng thái đơn hàng $namedv1 ",
        ]);
        $log->save();
            $nsp->delete();
            toast('Đã Xóa Trạng Thái Thành Công!','success');
            return redirect()->back();
        
    }

    public function reset_status_invoice(){
        StatusInvoice::query()->truncate();

        toast('Đã Reset trạng thái hóa đơn, hãy thêm lại!','success');
        return redirect()->back();
    }


////////////////////////////////





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
      /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function os_system_destroy($id)
    {
        $nsp = OSsystem::find($id);
        $name = Auth::user()->name;
        $namedv1 = OSsystem::find($id)->name_os;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name đã xóa nhóm khu vực $namedv1 ",
        ]);
        $log->save();
            $nsp->delete();
            toast('Đã Xóa Khu Vực Thành Công!','success');
            return redirect()->back();
        
    }

    ///////////////////

    public function location_system(){
        $ds = OSsystem::orderby('created_at','desc')->get();
        return view('BE.quickadd.show_os', compact('ds'));
    }
    public function location_system_create(Request $request){
      
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
      /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function location_system_destroy($id)
    {
        $nsp = OSsystem::find($id);
        $name = Auth::user()->name;
        $namedv1 = OSsystem::find($id)->name_os;
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

