<?php

namespace App\Http\Controllers\BE;
use App\Models\SEO;
use App\Models\LogAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
use DB;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds = SEO::all();
        return view('BE.seo.show', compact('ds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BE.seo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // Store the record, using the new file hashname which will be it's new filename identity.
            $product = new SEO([
                "meta_name" => $request->get('meta_name'),
                "meta_content" => $request->get('meta_content')
            ]);
            $product->save();

            $name = Auth::user()->name;
            $namedv = $product->hosting_name;
            $log = new LogAdmin([
            
               'id_user' => Auth::user()->id, 
                'task' => " $name đã tạo meta $namedv ",
            ]);
            $log->save();
        toast('Thêm meta Thành Công!','success');
        return redirect()->route('seo.index');
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
        $row = SEO::find($id);
        return view('BE.seo.edit',compact('row'));
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
        $sp = SEO::find($id);
        $sp->meta_name = $request->get('meta_name');
        $sp->meta_content = $request->get('meta_content');
        
        $name = Auth::user()->name;
        $namedv = $sp->hosting_name;
        $log = new LogAdmin([
           'id_user' => Auth::user()->id, 
            'task' => " $name sửa thông tin meta $namedv ",
        ]);
        $log->save();
       
          $sp->save();
          toast('Cập Nhật Meta Thành Công!','success');

        return redirect()->route('seo.index');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sp = SEO::find($id);
        $sp-> delete($id);
        alert()->success('Thành công','Đã xóa');
        $name = Auth::user()->name;
        $namedv = $sp->hosting_name;
        $log = new LogAdmin([
           'id_user' => Auth::user()->id, 
            'task' => " $name đã xóa meta $namedv ",
        ]);
        $log->save();
        return redirect()->route('seo.index');
    }

    

    
    
    

}
