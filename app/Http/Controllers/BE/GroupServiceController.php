<?php

namespace App\Http\Controllers\BE;
use App\Models\GroupService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class GroupServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds = GroupService::all();
        return view('BE.group-service.show', compact('ds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
       
       
        $ngs = new GroupService([
            'slug' =>\Str::slug($request->name_group_service),
            'service_group_name' => $request->get('name_group_service'),
            'dislay' => 1,
        ]);
        toast('Thêm Tên Nhóm Sản Phẩm Thành Công!','success');
        $ngs->save();
        return redirect ()->route('BE.group-service.show');
      
    }
    public function storeajax(Request $request)
    {
       
       
        $ngs = new GroupService([
            'slug' =>\Str::slug($request->name_group_service),
            'service_group_name' => $request->get('name_group_service'),
            'dislay' => 1,
        ]);
        $ngs->save();
        return response()->json(1);
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
