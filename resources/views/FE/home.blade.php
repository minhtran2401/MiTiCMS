@extends('FE.layout')
<title>@yield('pagetitle','MiTi-Dịch Vụ Mạng')</title>
@section('content')
<div class="page-wrapper">
    <div class="content">
             <div class="col-lg-12 col-md-12 ftco-animate fadeInUp ftco-animated">
                                <div class="card ">
                                    <div class="card-body">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                            </ol>
                                            <div class="carousel-inner">
                                              <div class="carousel-item active">
                                                <img class="d-block w-100" src="https://media.istockphoto.com/photos/child-hands-formig-heart-shape-picture-id951945718?k=6&m=951945718&s=612x612&w=0&h=ih-N7RytxrTfhDyvyTQCA5q5xKoJToKSYgdsJ_mHrv0=" alt="First slide">
                                              </div>
                                              <div class="carousel-item">
                                                <img class="d-block w-100" src="https://chetankejriwal.files.wordpress.com/2011/11/1206131983ikx95fp.jpg" alt="Second slide">
                                              </div>
                                              <div class="carousel-item">
                                                <img class="d-block w-100" src="https://www.webphunudep.com/kcfinder/upload/images/20170826_042858_094877_nhung-cau-noi-hay-ve-.max-600x600.jpg" alt="Third slide">
                                              </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                              <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                              <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-8 col-4">
                                    <h4 class="page-title">Bài viết</h4>
                                </div>
                                <div class="col-sm-4 col-8 text-right m-b-30">
                                    <div class="form-group">
                                        <input type="text" name="country_name" id="country_name" class="form-control input-lg" placeholder="Tìm kiếm bài viết" />
                                        <div id="countryList"></div>
                                        
                                    </div>
                                      {{ csrf_field() }} 
                                </div>
                            </div>
                            @php
                              $blog= DB::table('blog')->where('display','1')->orderby('blog_id','desc')->paginate(3);
                            @endphp
                            <div class="row">
                                    @foreach ($blog as $ds)
                                        <div  class="col-sm-6 col-md-6 col-lg-4">
                                    <div class="blog grid-blog">
                                        <div class="blog-image">
                                            <a href="{{route('blog_detail',$ds->slug)}}"><img class="img-fluid" src="{{asset('image')}}/{{$ds->blog_image}}" alt="{{$ds->blog_name}}"></a>
                                        </div>
                                        <div class="blog-content">
                                            <h3 class="blog-title"><a href="{{route('blog_detail',$ds->slug)}}">{{$ds->blog_name}}</a></h3>
                                            <p>{!!$ds->blog_summary!!}</p>
                                            <a href="{{route('blog_detail',$ds->slug)}}" class="read-more"><i class="fa fa-long-arrow-right"></i> Xem tiếp</a>
                                            <div class="blog-info clearfix">
                                                <div class="post-left">
                                                    <ul>
                                                        <li><a href="#."><i class="fa fa-calendar"></i> <span>{{date('d-m-Y', strtotime($ds->blog_post_time))}}</span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="post-right"> <a href="#."><i class="fa fa-eye"></i>8</a> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach 
                            </div>
                            {{ $blog->links() }}
                        </div>
</div>
@endsection
@section('script')
<script>
  $(document).ready(function(){

   $('#country_name').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
    var query = $(this).val(); //lấy gía trị ng dùng gõ
    if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
    {
     var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
     $.ajax({
      url:"{{ route('searchblog') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
      method:"POST", // phương thức gửi dữ liệu.
      data:{query:query, _token:_token},
      success:function(data){ //dữ liệu nhận về
       $('#countryList').fadeIn();  
       $('#countryList').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
     }
   });
   }
 });

   $(document).on('click', 'li', function(){  
    $('#country_name').val($(this).text());  
    $('#countryList').fadeOut();  
  });  

 });
</script>
@endsection