<?php

namespace App\Http\Controllers\BE;
use App\Mail\DetailAccountMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Carbon\Carbon;
use App\Models\LogAdmin;
use App\Models\Invoice;
use App\Models\DetailAccount;
use RealRashid\SweetAlert\Facades\Aler;
class CheckInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds = Invoice::orderby('id_invoice','desc')->get();
        return view('BE.check-bill.show', compact('ds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function quick_update(Request $request, $id){
            $status = $request->get('status');
            Invoice::where('id_invoice',$id )
      ->update(['status' => $status]);
      $name = Auth::user()->name;
    if($status == 1){
      $log = new LogAdmin([
            'id_user' => Auth::user()->id, 
            'task' => " $name đã đưa đơn hàng số $id về trạng thái chưa xác nhận",  
      ]);
    }
    elseif($status ==2){
        $log = new LogAdmin([
            'id_user' => Auth::user()->id, 
            'task' => " $name đã xác nhận đơn hàng số $id",  
      ]);
    }
    elseif($status ==3){
        $log = new LogAdmin([
            'id_user' => Auth::user()->id, 
            'task' => " $name xác nhận đơn hàng số $id đã thanh toán",  
      ]);
    }
    elseif($status ==4){
        $log = new LogAdmin([
            'id_user' => Auth::user()->id, 
            'task' => " $name đã hủy đơn hàng số $id",  
      ]);
    }
    elseif($status ==5){
        $log = new LogAdmin([
            'id_user' => Auth::user()->id, 
            'task' => " $name đã check hết hạn đơn hàng số $id",  
      ]);
    }
        
      $log->save();
      return response()->json(1);
     }


     public function send_account(Request $request){
        $detail_account = new DetailAccount([
            "id_invoice" => $request->get('id_invoice'),
            "detail_account" => $request->get('detail_account'),
            "day_start" => $request->get('day_start'),
            "day_end" => $request->get('day_end')
        ]);
        $id_user = $request->get('id_user');
        $data['time'] = Carbon::now('Asia/Ho_Chi_Minh');
        $data['detail_account']= $detail_account->detail_account;
        $data['info_invoice'] = DB::table('invoice')->where('id_invoice',$request->get('id_invoice'))->first();
        $data['user'] = DB::table('users')->where('id',$id_user)->first();
        $data['invoice_payment'] = DB::table('payment_method')->where('id',$data['info_invoice']->invoice_payment)->first();
        // dd($data['user']);
        Mail::to($data['user']->email)->send(new DetailAccountMail($data));
        $detail_account->save();
        toast('Đã gửi tài khoản cho khách hàng','success','top-right');
        return redirect()->route('check-bill.index');

     }

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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
