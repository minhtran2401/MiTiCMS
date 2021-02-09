<?php

namespace App\Http\Controllers\BE;
use App\Models\HostingService;
use App\Models\LogAdmin;
use App\Models\TypeService;
use App\Models\Price;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
use DB;

class HostingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds = HostingService::all();
        return view('BE.hosting.show', compact('ds'));
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
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $fileimg = $request->file('image'); // tạo biến lấy dữ liệu từ input
            $filename = $fileimg->getClientOriginalName(); // lấy tên theo tên gốc của file
            $pathimg = $fileimg->move(public_path().'/image', $filename); //chỗ chứa file
            $sku = mt_rand(1000000000, 9999999999);

            // Store the record, using the new file hashname which will be it's new filename identity.
            $product = new HostingService([
                "service_group_id" => $request->get('getgroup'),
                "service_type_id" => $request->get('gettype'),
                "sku" => $sku,
                "hosting_name" => $request->get('name_service'),
                "slug" =>\Str::slug($request->name_service),
                "hosting_image" => $filename,
                "display" =>$request->get('display'),
                "hosting_profile"=>$request->get('hosting_profile')

            ]);
            $product->save();

            $prices =[];
            $times =[]; 
          
            if ($request->get('price1','time1')) {
                $prices[] = $request->get('price1');
                $times[] = $request->get('time1');
            }
            if ($request->get('price2','time2')) {
                $prices[] = $request->get('price2');
                $times[] = $request->get('time2');
            }
            if ($request->get('price3','time3')) {
                $prices[] = $request->get('price3');
                $times[] = $request->get('time3');
            }
            if ($request->get('price4','time4')) {
                $prices[] = $request->get('price4');
                $times[] = $request->get('time4');
            }
            if ($request->get('price5','time5')) {
                $prices[] = $request->get('price5');
                $times[] = $request->get('time5');
            }
            $value = array_combine(  $times,$prices);
  
                foreach($value as $key => $packs){
                $combo = new Price; 
                    $combo->service_group_id = $product->service_group_id;
                    $combo->service_type_id = $product->service_type_id;
                    $combo->sku = $product->sku;
                    $combo->service_price = $packs;
                    $combo->service_time = $key;
                    $combo->save();

                }
                $name = Auth::user()->name;
                $namedv = $product->hosting_name;
                $log = new LogAdmin([
                   
                   'id_user' => Auth::user()->id, 
                    'task' => " $name đã tạo hosting $namedv ",
                ]);
                $log->save();
        toast('Thêm hosting Thành Công!','success');
        return redirect()->route('hosting.index');
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
       
        $row = HostingService::find($id);
        $data['price'] =DB::table('service_price')->where('sku',$row->sku)->get();
        return view('BE.hosting.edit',compact('row'),$data);
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
        $sp = HostingService::find($id);
        $fileimg = $request->file('image'); // tạo biến lấy dữ liệu từ input
        if ($fileimg){
            $fileimg = $request->file('image'); // tạo biến lấy dữ liệu từ input
            $filename = $fileimg->getClientOriginalName(); // lấy tên theo tên gốc của file
            $pathimg = $fileimg->move(public_path().'/image/', $filename); //chỗ chứa file
            $sp->hosting_image = $filename;
          
            $sp->hosting_name = $request->get('name_service');
            $sp->slug =\Str::slug($request->get('name_service'));
            $sp->service_group_id = $request->get('getgroup');
            $sp->service_type_id = $request->get('gettype');
            $sp->sku = HostingService::find($id)->sku;
            $sp->display = $request->get('display');
            $sp->hosting_profile = $request->get('hosting_profile');

        }
        else{

            $sp->slug =\Str::slug($request->get('name_service'));
            $sp->hosting_name = $request->get('name_service');
            $sp->service_group_id = $request->get('getgroup');
            $sp->service_type_id = $request->get('gettype');
            $sp->sku = HostingService::find($id)->sku;
            $sp->display = $request->get('display');
            $sp->hosting_profile = $request->get('hosting_profile');
          

        }
      
    
            
        $prices = $request->get('price');
        $times = $request->get('time');
        if(isset($prices) && isset($times)){
        $value = array_combine($times,$prices);
                foreach($value as $key => $packs){
                $combo = new Price; 
                    $combo->service_group_id = $sp->service_group_id;
                    $combo->service_type_id = $sp->service_type_id;
                    $combo->sku = $sp->sku;
                    $combo->service_price = $packs;
                    $combo->service_time = $key;
                    $combo->save();
                }}
        $name = Auth::user()->name;
        $namedv = $sp->hosting_name;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name sửa thông tin hosting $namedv ",
        ]);
        $log->save();
       
          $sp->save();
          toast('Cập Nhật Hosting Thành Công!','success');

        return redirect()->route('hosting.index');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sp = HostingService::find($id);
        $sp->delete();
        $delprice = DB::table('service_price')->where('sku',$sp->sku)->delete();
        alert()->success('Thành công','Đã xóa Hosting');
        $name = Auth::user()->name;
        $namedv = $sp->hosting_name;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name đã xóa hosting $namedv ",
        ]);
        $log->save();
        return redirect()->route('hosting.index');
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
            HostingService::where('hosting_id',$request->id)->update(['display'=>$request->status]);
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
