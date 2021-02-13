@extends('BE.layout.layout')
@section('pagetitle','Sửa thông tin tên miền')
@section('csspage')
<link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/vendors/css/forms/select/select2.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/vendors/css/file-uploaders/dropzone.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/vendors/css/editors/quill/katex.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/vendors/css/editors/quill/quill.snow.css">
<link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/vendors/css/editors/quill/quill.bubble.css">

    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/plugins/forms/form-file-uploader.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/plugins/forms/form-quill-editor.css">
@endsection
@section('content')
@section('br-namepage1','Dịch Vụ Tên Miền')
@section('br-namepage2','Tên Miền')
@section('br-namepage3','Sửa Tên Miền')
       <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            <strong>Ghi chú:</strong> Sửa dịch vụ Tên miền của website.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <section id="input-group-basic">
                <div class="row">
                    <!-- Basic -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                
                                    <form name="formedit" action="{{ route('domain.update',$row->domain_id) }}" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                                        @csrf
                                        @method('patch')
                                <div class="row">
                                   
                                    <div class="col-md-5 row col-12">
                                        <div class="card-header">
                                            <p class="card-text">
                                             <b>Chi tiết Domain</b>
                                            </p>
                                        </div>
                                        {{-- <div class=" col-md-12 mb-1">
                                            <label >Nhóm Dịch Vụ</label>
                                            <select name="getgroup" class="select2 form-control form-control-lg">
                                                <option value="0">---NHÓM DỊCH VỤ---</option>
                                                  @foreach ($group_service as $group)
                                                  @if($row->service_group_id == $group->service_group_id )
                                                  <option value='{{$group->service_group_id}}' selected>{{$group->service_group_name}}</option>  
                                                  @else
                                                  <option value='{{$group->service_group_id}}' >{{$group->service_group_name}}</option> 
                                                  @endif 
                                                  @endforeach
                                          </select>
                                        </div>
                
                
                                        <div class=" col-md-12 mb-1">
                                            <label >Loại Dịch Vụ</label>
                                            <select name="gettype" class="select2 form-control form-control-lg">
                                              <option value="0">---LOẠI DỊCH VỤ---</option>
                                              @foreach ($type_service as $type)
                                              @if($row->service_type_id == $type->service_type_id )
                                              <option value='{{$type->service_type_id}}' selected>{{$type->service_type_name}}</option>  
                                              @else
                                              <option value='{{$type->service_type_id}}' >{{$type->service_type_name}}</option>  
                                              @endif
                                              @endforeach 
                                          </select>
                                        </div> --}}
                                        
                                        <div class="col-md-12 mb-1">
                                            <label>Tên Miền</label>
                                            <input name="name_service" type="text" class="form-control" readonly  placeholder="Tên VPS" value="{{$row->name}}" />
                                        </div>
                                        <div class="col-md-12 mb-1">
                                        
                                                <label>Ảnh</label>
                                                <input type="file" class="form-control" name="image">
                                            </div>
                                            <div class="col-md-6  mb-1">
                                                <label>Trạng thái</label>
                                                <div class="demo-inline-spacing">
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="radio" name="display" class="custom-control-input" value="1" id="hien"    @if ($row->status == 1) checked @endif >
                                                        <label class="custom-control-label" for="hien">Hiện</label>
                                                    </div>
                                                    <div class="custom-control custom-control-secondary custom-checkbox">
                                                        <input type="radio" name="display" class="custom-control-input" value="0" id="an"    @if ($row->status == 0) checked @endif >
                                                        <label class="custom-control-label" for="an">Ẩn</label>
                                                    </div>
                                                </div>
                                            </div>
                                     
                                        
                                    </div>
                                    <div class="col-md-7 row col-12 ">
                                        <div class="card-header">
                                            <p class="card-text">
                                                <b>Giá tên miền</b>
                                            </p>
                                        </div>   
                                        <div class="card-body">
                                          
                               
                                            @foreach ($price as $key => $pri)
                                            <div data-id="{{$pri->service_price_id}}" class="row" id="row-price-{{$pri->service_price_id}}">
                                              

                                                <small class="font-weight-semibold w-100 ml-1 my-1">Giá thuê tên miền - Gói {{$key + 1}}</small>
                                                <a href="javascript:void(0)" onclick="xoaha(event);" class="del_price btn btn-danger btn-circle icon_del mb-3"><i class="glyphicon glyphicon-remove">Xóa</i></a>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                            <input type="text" class="form-control" readonly value="{{$pri->service_price}}"> 
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" readonly  value="{{$pri->service_time}}">
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                            @endforeach
                                            <div id="insert"></div>
                                            <button type="button" class="btn btn-primary mb-3" id="addPrice">Thêm giá</button>
                                            
                                            
                                        </div>
                                    </div>
                                  

                                   <button type="submit"  class="btn btn-primary ml-2" >Lưu database <i data-feather='database'></i></button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        


        </div>

@endsection

@section('pagevendor')

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('BE')}}/app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
    <script src="{{asset('BE')}}/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
    <script src="{{asset('BE')}}/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="{{asset('BE')}}/app-assets/vendors/js/extensions/dropzone.min.js"></script>


    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
@endsection

@section('pagejs')
   
    <!-- BEGIN: Page JS-->
    <script src="{{asset('BE')}}/app-assets/js/scripts/forms/form-select2.js"></script>
    <script src="{{asset('BE')}}/app-assets/js/scripts/forms/form-file-uploader.js"></script>

    <script src="{{asset('BE')}}/app-assets/js/scripts/forms/form-input-mask.js"></script>


    <!-- END: Page JS-->

@endsection