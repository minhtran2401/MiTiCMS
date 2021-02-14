@extends('BE.layout.layout')
@section('pagetitle','Bổ sung thông tin trang web')
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
@section('br-namepage1','Thông tin trang web')
@section('br-namepage2','Thông tin')
@section('br-namepage3','Thông tin')
       <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            <strong>Ghi chú:</strong> Bổ sung thông tin website.
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
                                
                                    <form action="{{ route('infosite.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                <div class="row">
                                   
                                    <div class="col-md-12 row col-lg-12">
                                        <div class="card-header">
                                            <p class="card-text">
                                             <b>Thông tin chi tiết</b>
                                            </p>
                                        </div>
                                        
                                        <div class="col-md-12 mb-1">
                                            <label>Tên Website</label>
                                            <input name="name" type="text" class="form-control"  placeholder="Tên website"  />
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <label>Logo</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <label>Số điện thoại 1</label>
                                            <input name="phone1" type="text" class="form-control"  placeholder="Nhập số điện thoại"  />
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <label>Số điện thoại 2</label>
                                            <input name="phone2" type="text" class="form-control"  placeholder="Nhập số điện thoại"  />
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <label>Email 1</label>
                                            <input name="email1" type="text" class="form-control"  placeholder="Nhập địa chỉ email"  />
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <label>Email 2</label>
                                            <input name="email2" type="text" class="form-control"  placeholder="Nhập địa chỉ email"  />
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <label>Thông báo (ADS)</label>
                                            <input name="ads" type="text" class="form-control"  placeholder="Nhập nội dung quảng cáo"  />
                                        </div>

                                        <div class="col-md-6 mb-1">
                                            <label>Bảo vệ</label>
                                            <div class="demo-inline-spacing">
                                                <div class="custom-control custom-control-primary custom-checkbox">
                                                    <input type="radio" name="protect" class="custom-control-input" value="1" id="sercurityon" checked="">
                                                    <label class="custom-control-label" for="sercurityon">Bật bảo vệ</label>
                                                </div>
                                                <div class="custom-control custom-control-secondary custom-checkbox">
                                                    <input type="radio" name="protect" class="custom-control-input" value="0" id="sercurityoff">
                                                    <label class="custom-control-label" for="sercurityoff">Tắt bảo vệ</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <label>Trạng thái</label>
                                            <div class="demo-inline-spacing">
                                                <div class="custom-control custom-control-primary custom-checkbox">
                                                    <input type="radio" name="status" class="custom-control-input" value="0" id="maintenanceoff" checked="">
                                                    <label class="custom-control-label" for="maintenanceoff">Tắt bảo trì</label>
                                                </div>
                                                <div class="custom-control custom-control-secondary custom-checkbox">
                                                    <input type="radio" name="status" class="custom-control-input" value="1" id="maintenanceon">
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