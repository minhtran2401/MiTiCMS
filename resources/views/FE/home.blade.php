@extends('FE.layout')
<title>@yield('pagetitle','MiTi-Dịch Vụ Mạng')</title>
@section('content')
<div class="page-wrapper">
  <div class="content">
      <div class="card ">
          <div class="card-body">
            @php
            $ads = DB::table('ads')->orderby('ads_id','desc')->get()
            @endphp
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    @foreach ($ads as $key => $a)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}" class=" {{ $key==0?'active':'' }}"></li>
                    @endforeach
                  </ol>
                  <div class="carousel-inner">
                    @foreach ($ads as $key => $a)
                    <div class="carousel-item {{ $key==0?'active':'' }}">
                      <img class="d-block w-100" src="{{asset('image')}}/{{$a->ads_image}}" alt="First slide">
                    </div>
                    @endforeach
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

      <div class="card">
        <div class="card-body row">
          <div class="col-sm-8 col-4">
              <h4 class="page-title mb-0">Bài viết nổi bật</h4>
          </div>
          <div class="col-sm-4 col-8 text-right">
              <div class="shin-active-a">Tìm kiếm bài viết <br>
                <div class="shin-hidden-a form-group m-0">
                  <input type="text" name="country_name" id="country_name" class="form-control input-lg" placeholder="Tìm kiếm bài viết" />
                  <div id="countryList"></div>
                  {{ csrf_field() }} 
              </div>
              </div>
              
          </div>
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
                          <div class="post-right"> <a href="#."><i class="fa fa-eye"></i>899</a> </div>
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

   $(document).on('click', '.liz', function(){  
    $('#country_name').val($(this).text());  
    $('#countryList').fadeOut();  
  });  

 });
</script>
@endsection