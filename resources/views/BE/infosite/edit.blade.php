@extends('BE.layout.layout')
@section('pagetitle','Sửa thông tin website')
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
@section('br-namepage1','Thông tin website')
@section('br-namepage2','Chỉnh sửa thông tin website')
@section('br-namepage3','Chỉnh sửa thông tin website')
       <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            <strong>Ghi chú:</strong> Chỉnh sửa thông tin website.
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
                                
                                <form action="{{ route('infosite.update', $row->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                <div class="row">
                                   
                                    <div class="col-md-12 col-lg-12">
                                        <div class="card-header">
                                            <p class="card-text">
                                             <b>Thông tin website</b>
                                            </p>
                                        </div>
                                        
                                        <div class="col-md-12 mb-1">
                                            <label>Logo</label>
                                            <input type="file" class="form-control" name="logo">
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <label>Tên site</label>
                                            <input name="name" type="text" class="form-control"  placeholder="Tên site" value="{{$row->name}}" />
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <label>Số điện thoại 1</label>
                                            <input name="phone1" type="text" class="form-control"  placeholder="Nhập số điện thoại" value="{{$row->phone1}}" />
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <label>Số điện thoại 2</label>
                                            <input name="phone2" type="text" class="form-control"  placeholder="Nhập số điện thoại" value="{{$row->phone2}}" />
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <label>Email 1</label>
                                            <input name="email1" type="text" class="form-control"  placeholder="Nhập email" value="{{$row->email1}}" />
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <label>Email 2</label>
                                            <input name="email2" type="text" class="form-control"  placeholder="Nhập email" value="{{$row->email2}}" />
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <label>Thông báo</label>
                                            <input name="ads" type="text" class="form-control"  placeholder="Nhập nội dung quảng cáo" value="{{$row->email2}}" />
                                        </div>
                                        <div class="col-md-6  mb-1">
                                                <label>Trạng thái</label>
                                                <div class="demo-inline-spacing">
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="radio" name="protect" class="custom-control-input" value="0" id="sercurityoff" @if ($row->protect == 0) checked @endif >
                                                        <label class="custom-control-label" for="sercurityoff">Tắt bảo vệ</label>
                                                    </div>
                                                    <div class="custom-control custom-control-secondary custom-checkbox">
                                                        <input type="radio" name="protect" class="custom-control-input" value="1" id="sercurityon"    @if ($row->protect == 1) checked @endif >
                                                        <label class="custom-control-label" for="sercurityon">Bật bảo vệ</label>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-md-6  mb-1">
                                                <label>Trạng thái</label>
                                                <div class="demo-inline-spacing">
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="radio" name="status" class="custom-control-input" value="0" id="maintenanceoff"    @if ($row->status == 0) checked @endif >
                                                        <label class="custom-control-label" for="maintenanceoff">Tắt bảo trì</label>
                                                    </div>
                                                    <div class="custom-control custom-control-secondary custom-checkbox">
                                                        <input type="radio" name="status" class="custom-control-input" value="1" id="maintenanceon"    @if ($row->status == 1) checked @endif >
                                                        <label class="custom-control-label" for="maintenanceon">Bật bảo trì</label>
                                                    </div>
                                                </div>
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