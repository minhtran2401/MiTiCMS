<?php

namespace App\Http\Controllers\BE;
use App\Models\HostingService;
use App\Models\DomainService;
use App\Models\LogAdmin;
use App\Models\TypeService;
use App\Models\Price;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
use DB;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds = DomainService::all();
        $gr = DB::table('service_groups')->get();
        return view('BE.domain.show', compact('ds','gr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['type_service'] = DB::table("service_types")->select("service_type_id", "service_type_name")->get();
        $data['group_service'] = DB::table("service_groups")->select("service_group_id", "service_group_name")->get();
        return view('BE.hosting.create',$data);
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
       
        $sku = mt_rand(1000000000, 9999999999);
        $ngs = new DomainService([
            'slug' =>\Str::slug($request->domain_name),
            'price_show' => $request->get('price_show'),
            'service_type_id' => $request->get('gettype'),
            'sku' => $sku,
            'price_show' => $request->get('price_show'),
            'domain_name' => $request->get('domain_name'),
            'domain_type' => $request->get('domain_type'),
            'status' => 1,
        ]);
        $name = Auth::user()->name;
        $namedv = $ngs->domain_name;
        $log = new LogAdmin([
           'id_user' => Auth::user()->id, 
            'task' => " $name đã tạo loại tên miền $namedv ",
        ]);
        $log->save();
        $ngs->save();
      
        $name = DomainService::find($ngs->domain_id);
            // $name = $tl->service_group_name;
         $data['4'] = $name->domain_type;
         $data['1'] = $ngs->domain_name;
         $data['2'] =number_format($ngs->price_show);
         $data['5'] =$ngs->domain_id;
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
        $data['type_service'] = DB::table("service_types")->select("service_type_id", "service_type_name")->get();
        $data['group_service'] = DB::table("service_groups")->select("service_group_id", "service_group_name")->get();
       
        $row = DomainService::find($id);
        $data['price'] =DB::table('service_price')->where('sku',$row->sku)->get();
        return view('BE.domain.edit',compact('row'),$data);
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
        $sp = DomainService::find($id);
        $fileimg = $request->file('image'); // tạo biến lấy dữ liệu từ input
        if ($fileimg){
            $fileimg = $request->file('image'); // tạo biến lấy dữ liệu từ input
            $filename = $fileimg->getClientOriginalName(); // lấy tên theo tên gốc của file
            $pathimg = $fileimg->move(public_path().'/Domain/', $filename); //chỗ chứa file
            $sp->domain_image = $filename;
          
            $sp->domain_name = $request->get('name_service');
            $sp->slug =\Str::slug($request->get('name_service'));
            // $sp->service_group_id = $request->get('getgroup');
            // $sp->service_type_id = $request->get('gettype');
            $sp->sku = DomainService::find($id)->sku;
            $sp->status = $request->get('display');
        

        }
        else{

            $sp->domain_name = $request->get('name_service');
            $sp->slug =\Str::slug($request->get('name_service'));
            // $sp->service_group_id = $request->get('getgroup');
            // $sp->service_type_id = $request->get('gettype');
            $sp->sku = DomainService::find($id)->sku;
            $sp->status = $request->get('display');
          

        }
      
    
            
        $prices = $request->get('price');
        $times = $request->get('time');
        if(isset($prices) && isset($times)){
        $value = array_combine($times,$prices);
                foreach($value as $key => $packs){
                $combo = new Price; 
                    $combo->service_group_id = "0";
                    $combo->service_type_id = "0";
                    $combo->sku = $sp->sku;
                    $combo->service_price = $packs;
                    $combo->service_time = $key;
                    $combo->save();
                }}
        $name = Auth::user()->name;
        $namedv = $sp->domain_name;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name sửa cập nhật lại tên miền $namedv ",
        ]);
        $log->save();
       
          $sp->save();
          toast('Cập Nhật Tên Miền Thành Công!','success');

        return redirect()->route('domain.index');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sp = DomainService::find($id);
        $sp->delete();
        $delprice = DB::table('service_price')->where('sku',$sp->sku)->delete();
        alert()->success('Thành công','Đã xóa Domain');
        $name = Auth::user()->name;
        $namedv = $sp->domain_name;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name đã xóa hosting $namedv ",
        ]);
        $log->save();
        return redirect()->route('domain.index');
    }

    
    function get_type_pro($id){
        $kq = DB::select("SELECT service_type_id, service_type_name FROM service_types WHERE service_group_id=$id");
        foreach($kq as $row)  
        if($row != null){
        echo "<option value={$row->service_type_id}> {$row->service_type_name} </option>";
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
            DomainService::where('domain_id',$request->id)->update(['status'=>$request->status]);
            // trả về status hiện tại để xử lý front end
            return $request->status;
        }}

        public function delPrice(Request $request){
            if ($request->ajax()) {
                $price_service = Price::find($request->id);
                    $price_service->delete();
                return $request->id;
            }
        }
    

}
