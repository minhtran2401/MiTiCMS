<?php

namespace App\Http\Controllers\BE;
use App\Mail\DonHangNotify;
use Illuminate\Http\Request;
use DB;
use App\Models\Cart;
use App\Models\Invoice;
use App\Models\PaymentMethod;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Auth;
use App\Mail\InvoiceNotify;
use App\Mail\InvoiceDomain;


Carbon::setLocale('vi');


session_start();


class CartController extends Controller
{
   

    public function add_cart_vps(Request $req ,$id){
        Session::forget('Cart');

        $data['product'] = DB::table('vps_service')->where('sku',$id)
        ->first();
        $data['price'] = $req->get('price');
        $data['time'] = $req->get('time');
        if($data != null){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($data, $id);
            $req->Session()->put('Cart', $newCart);  

        }
        return response()->json(1);
    }

    public function add_cart_hosting(Request $req ,$id){
        Session::forget('Cart');

        $data['product'] = DB::table('hosting_service')->where('sku',$id)
        ->first();
        $data['price'] = $req->get('price');
        $data['time'] = $req->get('time');
        if($data != null){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($data, $id);
            $req->Session()->put('Cart', $newCart);  
            // dd(Session('Cart')->products['time']);

        }
        return response()->json(1);
    }

    public function add_cart_server(Request $req ,$id){
        Session::forget('Cart');

        $data['product'] = DB::table('server_service')->where('sku',$id)
        ->first();
        $data['price'] = $req->get('price');
        $data['time'] = $req->get('time');
        if($data != null){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($data, $id);
            $req->Session()->put('Cart', $newCart);  
            // dd(Session('Cart')->products['time']);

        }
        return response()->json(1);
    }

    public function add_cart_account(Request $req ,$id){
        Session::forget('Cart');

        $data['product'] = DB::table('account_service')->where('sku',$id)
        ->first();
        $data['price'] = $req->get('price');
        $data['time'] = $req->get('time');
        if($data != null){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($data, $id);
            $req->Session()->put('Cart', $newCart);  
            // dd(Session('Cart')->products['time']);

        }
        return response()->json(1);
    }

   


    
    public function check_out(Request $request){



            $tt = new Invoice;
            $tt->user_id  = Auth::user()->id;
            $tt->service_group_id = $request->get('service_group_id');
            $tt->service_type_id = $request->get('service_type_id');
            $tt->sku  = $request->get('sku');
            $tt->invoice_payment  = $request->get('invoice_payment');
            $tt->pack_price = $request->get('pack_price');
            $tt->total_invoice = $request->get('total_invoice');
            $tt->invoice_note = $request->get('invoice_note');
            $tt->status = 1;
            $tt->save();

           
        // toast('Đặt hàng thành công','success');
        alert()->success('Thành công','Kiểm tra email ( có thể trong thư mục spam ) để hoàn tất đơn hàng.');
            
     



        $customer_email = Auth::user()->email;
        $time = Carbon::now('Asia/Ho_Chi_Minh');
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $times = $time->addDay(3);
        $title = "CẢM ƠN BẠN ĐÃ CHỌN CHÚNG TÔI ! ";
        $name = "WEBSITE TIMIHOST";
        $phone = "0836080801";
        $id_invoice = $tt->id;
        $method = $tt->invoice_payment;
        $invoice_payment = PaymentMethod::find($tt->invoice_payment)->value('name_payment');
        $how_to_pay = PaymentMethod::find($tt->invoice_payment)->value('info_payment');
        $body = "Cảm ơn bạn đã ";
        $data = ['title' => $title,
        'invoice_payment'=> $invoice_payment,
         'name'=> $name,
         'how_to_pay' =>$how_to_pay,
          'phone' => $phone,
          'body' => $body,
          'id_invoice' => $id_invoice,
          'now'=>$now,'times'=>$times];
        Mail::to($customer_email)->send(new InvoiceNotify($data));
        Session::forget('Cart');
        return redirect()->route('index');
    }

    public function check_out_domain(Request $request){



        $tt = new Invoice;
        $tt->user_id  = Auth::user()->id;
        $tt->service_group_id = $request->get('service_group_id');
        $tt->service_type_id = $request->get('service_type_id');
        $tt->sku  = $request->get('sku');
        $tt->invoice_payment  = $request->get('invoice_payment');
        $tt->pack_price = $request->get('pack_price');
        $tt->total_invoice = $request->get('total_invoice');
        $tt->invoice_note = $request->get('invoice_note');
        $tt->status = 1;
        $tt->save();

       
    // toast('Đặt hàng thành công','success');
    alert()->success('Thành công','Kiểm tra email ( có thể trong thư mục spam ) để hoàn tất đơn hàng.');
        

    $customer_email = Auth::user()->email;
    $time = Carbon::now('Asia/Ho_Chi_Minh');
    $now = Carbon::now('Asia/Ho_Chi_Minh');
    $times = $time->addDay(3);
    $title = "CẢM ƠN BẠN ĐÃ CHỌN CHÚNG TÔI ! ";
    $name = "WEBSITE TIMIHOST";
    $phone = "0836080801";
    $id_invoice = $tt->id;
    $method = $tt->invoice_payment;
    $invoice_payment = PaymentMethod::find($tt->invoice_payment)->value('name_payment');
    $how_to_pay = PaymentMethod::find($tt->invoice_payment)->value('info_payment');
    $body = "Cảm ơn bạn đã ";
    $data = ['title' => $title,
    'invoice_payment'=> $invoice_payment,
     'name'=> $name,
     'how_to_pay' =>$how_to_pay,
      'phone' => $phone,
      'body' => $body,
      'id_invoice' => $id_invoice,
      'now'=>$now,'times'=>$times];
    Mail::to($customer_email)->send(new InvoiceDomain($data));
    Session::forget('Cart');
    return redirect()->route('index');
}
}
