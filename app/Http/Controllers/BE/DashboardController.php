<?php
namespace App\Http\Controllers\BE;
use App\Mail\DetailAccountMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\User;
use App\Models\Online;
use App\Models\Counter;
use App\Models\Invoice;
use Carbon\Carbon;
use App\Models\Incomes;
use App\Models\TypeService;
use App\Models\Funds;
use Session;
use Str;
use Artisan;
use App\Models\LogAdmin;
use App\Models\DetailAccount;
use RealRashid\SweetAlert\Facades\Aler;
class DashBoardController extends Controller
{
    public function tongquat(){
        $day = Carbon::now('Asia/Ho_Chi_Minh')->day;
        $data['incomes'] = DB::table('incomes')->orderby('id','desc')->limit(3)->get();
        $data['funds'] = DB::table('funds')->orderby('id','desc')->limit(3)->get();
        $data['tomtatthuchi']= array($data['incomes'],$data['funds']);
        $data['thunhap'] = DB::table('incomes')->sum('incomes_value');
        $data['chitieu'] = DB::table('funds')->sum('funds_value');
        $data['customer'] = DB::table('users')->where('role',0)->get()->count();
        $dv1 = $data['service']['server'] = DB::table('server_service')->get()->count();
        $dv2 = $data['service']['hosting'] =DB::table('hosting_service')->get()->count();
        $dv3 = $data['service']['vps'] = DB::table('vps_service')->get()->count();
        $dv4 = $data['service']['account']=DB::table('account_service')->get()->count();
        $data['allservice'] = $dv1 + $dv2 + $dv3 + $dv4 + 1; 
       
        $data['todaybilled'] = Invoice::select('id_invoice','created_at', DB::raw("DATE_FORMAT(created_at, '%d') days"))
        ->where('status','3')
        ->where(DB::raw("DATE_FORMAT(created_at, '%d')"),'=',$day)
        ->get()
        ->groupBy('days')->count(); 
        $data['todayfunds'] = Funds::selectRaw(" DATE_FORMAT(day_funds, '%Y-%m-%e')")
        ->where(DB::raw("DATE_FORMAT(day_funds, '%d')"),'=',$day)
        ->select(DB::raw('SUM(funds_value) as total'))     
        ->first();
        $data['todayincomes'] = Incomes::selectRaw(" DATE_FORMAT(day_incomes, '%Y-%m-%e')")
        ->where(DB::raw("DATE_FORMAT(day_incomes, '%d')"),'=',$day)
        ->select(DB::raw('SUM(incomes_value) as total'))     
        ->first();
        $data['todaymoney'] = $data['todayincomes']->total - $data['todayfunds']->total;
        return view('BE.layout.dashboard',compact('data'));
    }

    public function thong_ke_truy_cap(){  
     
        $month =  Carbon::now()->month;
        $year =  Carbon::now()->year; 
        $get_all_colum_counter =  Counter::select('id','time', DB::raw("DATE_FORMAT(time, '%d') days"))
        ->where(DB::raw("DATE_FORMAT(time, '%Y')"),'=',$year)
        ->where(DB::raw("DATE_FORMAT(time, '%m')"),'=',$month)
        ->get()
        ->groupBy('days'); 
        
        $count_day_duplicate = [];
        $count_day = [];
        foreach ($get_all_colum_counter as $key => $value) {
            $count_day_duplicate[(int)$key] = count($value);
        }
        for($i = 1; $i <= Carbon::now()->daysInMonth; $i++){
            if(!empty($count_day_duplicate[$i])){
                $count_day[$i] = $count_day_duplicate[$i];    
            }else{
                $count_day[$i] = 0;    
            }
            $respon[] = array($i, $count_day[$i]);
        }
        return response()->json($respon);
    }

    public function shortday(Request $resquest){
        $month = $resquest->get('getmonth');
        $year = $resquest->get('getyear');
        $timeget = "$year-$month";
        // dd($timeget);
    
      $get_short_colum_counter =  Counter::select('id','time', DB::raw("DATE_FORMAT(time, '%d') days"))
        // ->where('date','=',$timeget)
        ->where(DB::raw("DATE_FORMAT(time, '%Y')"),'=',$year)
        ->where(DB::raw("DATE_FORMAT(time, '%m')"),'=',$month)
        ->get()
        ->groupBy('days'); 

        $short_count_day_duplicate = [];
        $short_count_day = [];
        foreach ($get_short_colum_counter as $keyz => $valueshort) {
            $short_count_day_duplicate[(int)$keyz] = count($valueshort);
        }
        for($i = 1; $i <= Carbon::create($year,$month,1)->daysInMonth; $i++){
            if(!empty($short_count_day_duplicate[$i])){
                $short_count_day[$i] = $short_count_day_duplicate[$i];    
            }else{
                $short_count_day[$i] = 0;    
            }
            $response[] = array($i, $short_count_day[$i]);
            // $date_data = array($month,$year);
            // $get_data[] = array($date_data,$response);
            
        }

        return response()->json($response);
    }

    public function add_incomes(Request $resquest){
        $incomes = new Incomes([
        'id_user' => Auth::user()->id,
        'incomes_value' => $resquest->get('incomes_value'),
        'name_incomes' => $resquest->get('name_incomes'),
        'detail_incomes' => $resquest->get('detail_incomes'),
        'day_incomes' => $resquest->get('day_incomes')
        ]);
        $name = Auth::user()->name;
        $namedv = $incomes->incomes_value;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name đã nhập khoản thu là $namedv đ",
        ]);
        $log->save();
       
        $incomes->save();
          toast('Đã nhập khoản thu !','success');
        return redirect()->back();
        
    }

    public function add_funds(Request $resquest){
        $funds = new Funds([
        'id_user' => Auth::user()->id,
        'funds_value' => $resquest->get('funds_value'),
        'name_funds' => $resquest->get('name_funds'),
        'detail_funds' => $resquest->get('detail_funds'),
        'day_funds' => $resquest->get('day_funds')
        ]);
        $name = Auth::user()->name;
        $namedv = $funds->funds_value;
        $log = new LogAdmin([
           
           'id_user' => Auth::user()->id, 
            'task' => " $name đã nhập khoản chi là $namedv đ",
        ]);
        $log->save();
       
        $funds->save();
          toast('Đã nhập khoản chi !','success');
        return redirect()->back();
        
    }

    public function khach_hang_tiem_nang(){
        $data = array();
        $quanty =  Invoice::select('user_id', DB::raw('count(user_id) as count'))
        ->where('status',3)
        ->groupBy('user_id')
        ->orderBy('count', 'desc')
        ->limit(10)->get();
     
      
            foreach($quanty as $t){
                
                $name = $t->user_id;
                $namesp = User::where('id',$name)->value('name');
                $soluong = $t->count ;
                $data[] = array('name' => $namesp, 'y' => json_decode($soluong));
            }
            return response()->json($data);
    }

    public function san_pham_ban_chay(){
        $data = array();
        $quanty =  Invoice::select('service_type_id', DB::raw('count(id_invoice) as count'))
        ->groupBy('service_type_id')
        ->orderBy('count', 'desc')
        ->limit(10)->get();
        // dd($quanty);
            foreach($quanty as $t){
                $name = $t->service_type_id;
                $namesp = TypeService::where('service_type_id',$name)->value('service_type_name');
                $soluong = $t->count;
                $data[] = array('name' => $namesp, 'y' => json_decode($soluong));
            }
            return response()->json($data);
    }

    public function shutdown()
    {
      DB::update('update miti_info set status = 1 where id = 1');
      Artisan::call('down --secret=timiteam');
      alert()->warning('Cảnh báo','Đã đưa trang web vào trạng thái bảo trì! Chỉ có quản trị viên mới có thể truy cập website.');
      return redirect('/timiteam');
     
    }
    
    // khởi động lại web
    public function start(){
      Artisan::call('up');
      DB::update('update miti_info set status = 0 where id = 1');
      alert()->success('Kích hoạt Thành công','Trang web đã vào trạng thái hoạt động !');
      return redirect('/admin');
    
    }

    public function our_backup_database(){

        //ENTER THE RELEVANT INFO BELOW
        $mysqlHostName      = env('DB_HOST');
        $mysqlUserName      = env('DB_USERNAME');
        $mysqlPassword      = env('DB_PASSWORD');
        $DbName             = env('DB_DATABASE');

           $conn = mysqli_connect($mysqlHostName, $mysqlUserName, $mysqlPassword, $DbName);
           $conn->set_charset("utf8");
           // Get All Table Names From the Database
           $tables = array();
           $sql = "SHOW TABLES";
           $result = mysqli_query($conn, $sql);
           while ($row = mysqli_fetch_row($result)) {
               $tables[] = $row[0];
           }
           $sqlScript = "";
           foreach ($tables as $table) {
               // Prepare SQLscript for creating table structure
           $query = "SHOW CREATE TABLE $table";
           $result = mysqli_query($conn, $query);
           $row = mysqli_fetch_row($result);
           $sqlScript .= "\n\n" . $row[1] . ";\n\n";
           $query = "SELECT * FROM $table";
           $result = mysqli_query($conn, $query);
           $columnCount = mysqli_num_fields($result);
           // Prepare SQLscript for dumping data for each table
           for ($i = 0; $i < $columnCount; $i ++) {
               while ($row = mysqli_fetch_row($result)) {
                   $sqlScript .= "INSERT INTO $table VALUES(";
                   for ($j = 0; $j < $columnCount; $j ++) {
                       $row[$j] = $row[$j];
                    if (isset($row[$j])) {
                           $sqlScript .= '"' . $row[$j] . '"';
                       } else {
                           $sqlScript .= '""';
                       }
                       if ($j < ($columnCount - 1)) {
                           $sqlScript .= ',';
                       }
                   }
                   $sqlScript .= ");\n";
               }
           }
           
           $sqlScript .= "\n"; 
       }

       if(!empty($sqlScript))
       {
           // Save the SQL script to a backup file
           $backup_file_name = $DbName . '_backup_' . time() . '.sql';
           $fileHandler = fopen($backup_file_name, 'w+');
           $number_of_lines = fwrite($fileHandler, $sqlScript);
           fclose($fileHandler); 
        // Download the SQL backup file to the browser
           header('Content-Description: File Transfer');
           header('Content-Type: application/octet-stream');
           header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
           header('Content-Transfer-Encoding: binary');
           header('Expires: 0');
           header('Cache-Control: must-revalidate');
           header('Pragma: public');
           header('Content-Length: ' . filesize($backup_file_name));
           ob_clean();
           flush();
readfile($backup_file_name);
           exec('rm ' . $backup_file_name); 
       }                       
    }


    function changeStatusWeb(Request $request){
       
        if($request->ajax()){
            DB::update("update miti_info set protect = '$request->status' where id = 1");
            return $request->status;
        }
    }
  
    public function status_web(){
      $data = array();
      $status =  DB::select('select * from miti_info where id = 1');
      // $data[] = array($status);
      foreach ($status as $t){
        $tt['protect'] = $t->protect;
  
  
      }
      return response()->json($tt);
    }
}
