@extends('BE.layout.layout')
@section('pagetitle','Thêm Meta')
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
@section('br-namepage1','Miti SEO Meta')
@section('br-namepage2','SEO Meta')
@section('br-namepage3','Meta')
       <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            <strong>Ghi chú:</strong> Thêm meta của website.
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
                                
                                    <form action="{{ route('seo.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                <div class="row">
                                   
                                    <div class="col-md-12 row col-12">
                                        <div class="card-header">
                                            <p class="card-text">
                                             <b>Chi tiết Meta</b>
                                            </p>
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <label>Tên meta</label>
                                            <input name="meta_name" type="text" class="form-control"  placeholder="Meta name"  /> <br>
                                            <label>Nội dung meta</label>
                                            <input name="meta_content" type="text" class="form-control"  placeholder="Meta content"  />
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