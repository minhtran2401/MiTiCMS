@extends('BE.layout.layout')
@section('pagetitle','Thêm Server')
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
@section('br-namepage1','Dịch Vụ Server')
@section('br-namepage2','Dịch vụ')
@section('br-namepage3','Server')
       <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            <strong>Ghi chú:</strong> Thêm dịch vụ server của website.
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
                                
                                    <form action="{{ route('server.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                <div class="row">
                                   
                                    <div class="col-md-5 row col-12">
                                        <div class="card-header">
                                            <p class="card-text">
                                             <b>Chi tiết server</b>
                                            </p>
                                        </div>
                                        <div class=" col-md-12 mb-1">
                                            <label >Nhóm Dịch Vụ</label>
                                            <select name="getgroup" class="select2 form-control form-control-lg">
                                                <option value="0">---NHÓM DỊCH VỤ---</option>
                                                  @foreach ($group_service as $group)
                                                  <option value='{{$group->service_group_id}}'>{{$group->service_group_name}}</option>  
                                                  @endforeach
                                          </select>
                                        </div>
                
                
                                        <div class=" col-md-12 mb-1">
                                            <label >Loại Dịch Vụ</label>
                                            <select name="gettype" class="select2 form-control form-control-lg">
                                              <option value="0">---LOẠI DỊCH VỤ---</option>
                                          </select>
                                        </div>
                                        
                                        <div class="col-md-12 mb-1">
                                            <label>Tên server</label>
                                            <input name="name_service" type="text" class="form-control"  placeholder="Tên Server"  />
                                        </div>
                                        <div class="col-md-12 mb-1">
                                        
                                                <label>Ảnh</label>
                                                <input type="file" class="form-control" name="image">
                                            </div>
                                            <div class="col-md-6  mb-1">
                                                <label>Trạng thái</label>
                                                <div class="demo-inline-spacing">
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="radio" name="display" class="custom-control-input" value="1" id="hien" checked="">
                                                        <label class="custom-control-label" for="hien">Hiện</label>
                                                    </div>
                                                    <div class="custom-control custom-control-secondary custom-checkbox">
                                                        <input type="radio" name="display" class="custom-control-input" value="0" id="an">
                                                        <label class="custom-control-label" for="an">Ẩn</label>
                                                    </div>
                                                </div>
                                            </div>
                                     
                                        
                                    </div>
                                    <div class="col-md-7 row col-12 ">
                                        <div class="card-header">
                                            <p class="card-text">
                                                <b>Giá server</b>
                                            </p>
                                        </div>   
                                        <div class="card-body">
                                            <div class="row">
                                                <small class="font-weight-semibold w-100 ml-1 my-1">Giá thuê server - Gói 1</small>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                            <input type="text" class="form-control " name="price1" placeholder="Giá thuê ( 100000, 200000,...)"> 
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="time1" placeholder="Thời gian ( 1 tháng , 2 tháng ,... )">
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="row">
                                                <small class="font-weight-semibold w-100 ml-1 my-1">Giá thuê server - Gói 2</small>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                            <input type="text" class="form-control " name="price2" placeholder="Giá thuê ( 100000, 200000,...)"> 
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="time2" placeholder="Thời gian ( 1 tháng , 2 tháng ,... )">
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="row">
                                                <small class="font-weight-semibold w-100 ml-1 my-1">Giá thuê server - Gói 3</small>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                            <input type="text" class="form-control " name="price3" placeholder="Giá thuê ( 100000, 200000,...)"> 
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="time3" placeholder="Thời gian ( 1 tháng , 2 tháng ,... )">
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                            
                                            <div class="row">
                                                <small class="font-weight-semibold w-100 ml-1 my-1">Giá thuê server - Gói 4</small>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                            <input type="text" class="form-control " name="price4" placeholder="Giá thuê ( 100000, 200000,...)"> 
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="time4" placeholder="Thời gian ( 1 tháng , 2 tháng ,... )">
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>

                                            
                                            <div class="row">
                                                <small class="font-weight-semibold w-100 ml-1 my-1">Giá thuê server - Gói 5</small>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                            <input type="text" class="form-control " name="price5" placeholder="Giá thuê ( 100000, 200000,...)"> 
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="time5" placeholder="Thời gian ( 1 tháng , 2 tháng ,... )">
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                    <!--! col right  -->
                                    <div class="col-md-12 col-12 ">
                                        <div class="card-header">
                                            <p class="card-text">
                                                <b>Cấu hình server</b>
                                            </p>
                                        </div>
                                              <!-- full Editor start -->
                                                <section class="full-editor">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card"> 
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <textarea  cols="30" rows="10" class="form-control" id="summernote" name="server_profile"></textarea>
                                                                                   
                                                                                
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                                <!-- full Editor end -->

            

                                             
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