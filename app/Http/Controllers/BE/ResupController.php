<?php

namespace App\Http\Controllers\BE;
use App\Mail\ReplySupMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Blog;
use App\Models\LogAdmin;
use App\Models\BlogType;
use App\Models\Price;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
use DB;
use Carbon\Carbon;
use App\Models\Support;

class ResupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds = Support::orderby('id','desc')->get();
        return view('BE.resup.show', compact('ds'));
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

     public function send_resup(Request $request){
         $id= $request->get('id_case');
         $data['time'] = Carbon::now('Asia/Ho_Chi_Minh');
         $data['email'] = $request->get('email');
         $data['subject']=$request->get('subject');
         $data['content']=$request->get('content');
         $data['resup'] = $request->get('resup');
         $data['id_case'] = $request->get('id_case');
        //  dd($data);
            $sp = Support::find($id);
            $sp->status = 1;
            $name = Auth::user()->name;
            $log = new LogAdmin([
               'id_user' => Auth::user()->id, 
                'task' => " $name đã xử lí case số $id ",
            ]);
            Mail::to($data['email'])->send(new ReplySupMail($data));
            
            $log->save();
            $sp->save();
            toast('Xử lí hỗ trợ khách hàng thành công','success');
            return redirect()->back();
     }

    public function store(Request $request)
    {
         
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
    public function update(Request $request, $id)
    {
       
    }

}
