@extends('BE.layout.layout')
@section('pagetitle','Sửa Phương Thức')
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
@section('br-namepage1','Phương thức thanh toán')
@section('br-namepage2','Phương thức thanh toán')
@section('br-namepage3','Sửa phương thức thanh toán')
       <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            <strong>Ghi chú:</strong> Sửa phương thức thanh toán.
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
                                
                                <form class="" id="form_validation" method="POST" action="{{route('payment-method.update',$row->id)}}" enctype="multipart/form-data" >
                                    {{csrf_field()}}
                                    @method('patch')

                                    <div class="form-group row" >
                                    <div class="col-md-6 row">
                                    <div class="form-group col-md-6">
                                        <label for="name_payment">Tên Phương Thức</label>
                                        <input type="text" class="form-control" placeholder="Tên" value="{{$row->name_payment}}" name="name_payment">
                                        @foreach($errors->get('name_payment') as $error)
                                          <span class="badge badge-danger">{{ $error }}</span>
                                        @endforeach
                                    
                                    </div>
                
                                    <div class="form-group col-md-6">
                                        <label for="name_blog">Trạng thái</label>
                                        <div class="form-group ">
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="display" id="Hien" class="form-check-input" value="1" @if($row->display ==1 )checked @endif >
                                                <label class="form-check-label" for="Hien">Hiện</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="display" id="An" class="form-check-input" value="0" @if($row->display == 0) checked @endif>
                                                <label class="form-check-label" for="An">Ẩn</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="image">Hình ảnh</label>
                                          <input type="file" class="form-control"  name="image" >
                                          @foreach($errors->get('image') as $error)
                                        <span class="badge badge-danger">{{ $error }}</span> 
                                      @endforeach
                                      </div>
                                     
                
                               
                                      
                                </div>
                
                                <div class="col-md-6">   
                                    <div class="form-group col-md-12">
                                        <label for="blog_summary"> Thông tin phương thức thanh toán </label>
                                        <textarea id="summernote" name="info_payment" id="" cols="30" rows="10">{{$row->info_payment}}</textarea>
                                        @foreach($errors->get('info_payment') as $error)
                                        <span class="badge badge-danger">{{ $error }}</span> 
                                      @endforeach
                                        </div>
                                </div>
                
                                </div>
                
                                <button class="btn btn-raised btn-primary waves-effect" type="submit">LƯU DATABASE</button>
                                <button class="btn btn-danger" type="reset">HỦY</button>
                                      </div>
                                    
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

    <script>
    $(document).ready(function() {
$('#summernote2').summernote();
});
</script>

    <!-- END: Page JS-->

@endsection