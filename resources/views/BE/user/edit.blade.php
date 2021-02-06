@extends('BE.layout.layout')
@section('pagetitle','Sửa thông tin tài khoản khách hàng')
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
@section('br-namepage1','Tài Khoản Khách Hàng')
@section('br-namepage2','Tài Khoản')
@section('br-namepage3','Sửa Thông Tin')
       <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            <strong>Ghi chú:</strong> Thông tin khách hàng
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
                                <a class="btn btn-primary mb-1" href=""><i data-feather='eye'></i> Lịch sử mua hàng</a>
                                <form name="formedit" action="{{ route('user.update',$row->id) }}" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                                        @csrf
                                        @method('patch')
                              
                                        <label for="">Họ Tên</label>
                                        <input class="form-control" type="text" name="name" value="{{$row->name}}">
                                    
                                        <label for="">Sdt</label>
                                        <input class="form-control" type="text"  name="phone" value="{{$row->phone}}">
                                    
                                        <label for="">Email</label>
                                        <input class="form-control" type="text"  name="email" value="{{$row->email}}">

                                        <div class="form-group ">
                                           
                                        <label for="">Trạng thái</label>
                                            <div class="demo-inline-spacing">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="active" type="checkbox" id="hien" value="1"  @if ($row->active == 1) checked @endif >
                                                    <label class="form-check-label" name="active" for="hien">Đang hoạt động</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="an" value="0"  @if ($row->active == 0) checked @endif >
                                                    <label class="form-check-label" for="an">Vô hiệu hóa</label>
                                                </div>
                                            </div>
                                        </div>
                                 
                                  
                                        <label for="">Xác thực email</label>
                                        <div class="demo-inline-spacing">
                                            <div class="form-check form-check-inline">
                                                <input disabled class="form-check-input" type="checkbox" id="co" value="0"  @if ($row->email_verify_at) checked @endif >
                                                <label class="form-check-label" for="co">Đã xác thực</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input disabled class="form-check-input" type="checkbox" id="ko" value="1" @if (!$row->email_verify_at) checked @endif>
                                                <label class="form-check-label" for="ko">Chưa xác thực</label>
                                            </div>
                                        </div>
                                    </div>
                               

                                    <button class="btn btn-primary" type="submit">Lưu</button>
                                      
                                        
                                    
                                      
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