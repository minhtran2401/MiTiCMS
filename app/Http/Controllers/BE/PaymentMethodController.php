<?php

namespace App\Http\Controllers\BE;
use App\Models\Blog;
use App\Models\LogAdmin;
use App\Models\BlogType;
use App\Models\Price;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
use DB;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds = PaymentMethod::all();
        return view('BE.payment-method.show', compact('ds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('BE.payment-method.create');
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
            $product = new PaymentMethod([
                "name_payment" => $request->get('name_payment'),
                "image" => $filename,
                "display" =>$request->get('display'),
                "info_payment"=>$request->get('info_payment'),
            ]);
            $product->save();

                $name = Auth::user()->name;
                $namedv = $product->name_payment;
                $log = new LogAdmin([
                   
                   'id_user' => Auth::user()->id, 
                    'task' => " $name đã tạo phương thức thanh toán $namedv ",
                ]);
                $log->save();
        toast('Thêm Phương Thức Thanh Toán Thành Công!','success');
        return redirect()->route('payment-method.index');
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
      
        $row = PaymentMethod::find($id);

        return view('BE.payment-method.edit',compact('row'));
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
        $sp = PaymentMethod::find($id);
        $fileimg = $request->file('image'); // tạo biến lấy dữ liệu từ input
        if ($fileimg){
            $fileimg = $request->file('image'); // tạo biến lấy dữ liệu từ input
            $filename = $fileimg->getClientOriginalName(); // lấy tên theo tên gốc của file
            $pathimg = $fileimg->move(public_path().'/image/', $filename); //chỗ chứa file
            $sp->image = $filename;
            $sp->name_payment = $request->get('name_payment');
            $sp->display = $request->get('display');
            $sp->info_payment = $request->get('info_payment');
        }
        else{
            $sp->name_payment = $request->get('name_payment');
            $sp->display = $request->get('display');
            $sp->info_payment = $request->get('info_payment');
        }
      
    
           
        $name = Auth::user()->name;
        $namedv = $sp->name_payment;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name sửa thông tin thanh toán $namedv ",
        ]);
        $log->save();
       
          $sp->save();
          toast('Cập Nhật Thông Tin Thanh Toán Thành Công!','success');

        return redirect()->route('payment-method.index');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sp = PaymentMethod::find($id);
        $sp->delete();
        alert()->success('Thành công','Đã xóa phương thức thanh toán');
        $name = Auth::user()->name;
        $namedv = $sp->name_payment;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name đã xóa phương thức thanh toán $namedv ",
        ]);
        $log->save();
        return redirect()->route('payment-method.index');
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
            PaymentMethod::where('id',$request->id)->update(['display'=>$request->status]);
            // trả về status hiện tại để xử lý front end
            return $request->status;
        }}


}
