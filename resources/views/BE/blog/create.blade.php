@extends('BE.layout.layout')
@section('pagetitle','Thêm Hosting')
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
@section('br-namepage1','Dịch Vụ Hosting')
@section('br-namepage2','Dịch vụ')
@section('br-namepage3','Hosting')
       <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            <strong>Ghi chú:</strong> Thêm dịch vụ hosting của website.
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
                                
                                <form class="" id="form_validation" method="POST" action="{{route('blog.store')}}" enctype="multipart/form-data" >
                                    {{csrf_field()}}
                
                                    <div class="form-group row" >
                                    <div class="col-md-6 row">
                                    <div class="form-group col-md-6">
                                        <label for="name_blog">Tên Blog</label>
                                        <input type="text" class="form-control" placeholder="Tên" name="blog_name">
                                        @foreach($errors->get('blog_name') as $error)
                                          <span class="badge badge-danger">{{ $error }}</span>
                                        @endforeach
                                    <input type="text" hidden class="form-control"  value="{{ auth::id() }}" name="user_id">
                                    </div>
                
                                    <div class="form-group col-md-6">
                                        <label for="name_blog">Tên Thể Loại</label>
                                        <select  name="blog_type_id" class="form-control">
                                          
                                            <option value="0">Chọn thể loại</option>
                                          
                                            <?php
                                                $kq = App\Models\BlogType::select("blog_type_id", "blog_type_name")->get();
                                                ?>
                                                @foreach ($kq as $theloai)
                                        <option value='{{$theloai->blog_type_id}}'>{{$theloai->blog_type_name}}</option>  
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="image">Hình ảnh</label>
                                          <input type="file" class="form-control"  name="image" >
                                          @foreach($errors->get('image') as $error)
                                        <span class="badge badge-danger">{{ $error }}</span> 
                                      @endforeach
                                      </div>
                                      <div class="form-group col-md-12">
                                        <label for="blog_post_time">Ngày Đăng</label>
                                          <input type="date" class="form-control datepicker"  name="blog_post_time" >
                                      </div>
                
                                      <div class="form-group col-md-12">
                                        <label for="blog_tag">Tag</label>
                                          <input type="text" class="form-control " placeholder="Các tag ngăn cách nhau bời dấu phẩy"  name="blog_tag">
                                          @foreach($errors->get('blog_tag') as $error)
                                        <span class="badge badge-danger">{{ $error }}</span> 
                                      @endforeach
                                      </div>
                
                                      
                                </div>
                
                                <div class="col-md-6">   
                                    <div class="form-group col-md-12">
                                        <label for="blog_summary"> Tóm Tắt </label>
                                        <textarea id="summernote" name="blog_summary" id="" cols="30" rows="10"></textarea>
                                        @foreach($errors->get('blog_summary') as $error)
                                        <span class="badge badge-danger">{{ $error }}</span> 
                                      @endforeach
                                        </div>
                                </div>
                
                                </div>
                
                                <div class="col-sm-md mb-3">
                                    <label for="blog_content"> Nội Dung </label>
                                        <textarea name="blog_content" id="summernote2"></textarea>
                                        @foreach($errors->get('blog_content') as $error)
                                        <span class="badge badge-danger">{{ $error }}</span> 
                                      @endforeach
                                </div>
                
                
                
                                 
                                  
                                {{-- <div class="col-md-12 row">
                                    <div class="form-group col-md-4">
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="Anhien" id="Hien" class="form-check-input" value="1" checked="" >
                                            <label class="form-check-label" for="Hien">Hiện</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="Anhien" id="An" class="form-check-input" value="0" >
                                            <label class="form-check-label" for="An">Ẩn</label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                      <div class="form-check form-check-inline">
                                          <input type="radio" name="noibat" id="co" class="form-check-input" value="1" checked="" >
                                          <label class="form-check-label" for="co">Nổi Bật</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                          <input type="radio" name="noibat" id="khong" class="form-check-input" value="0" >
                                          <label class="form-check-label" for="khong">Tin Thường</label>
                                      </div>
                                  </div>
                
                                </div> --}}
                
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