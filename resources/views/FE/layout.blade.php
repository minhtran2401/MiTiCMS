<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    @php
    $seo = DB::table('seo')->get();
    @endphp
    @foreach ($seo as $s)
    <meta name="{{$s->meta_name}}" content="{{$s->meta_content}}">

    @endforeach
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets')}}/img/favicon.ico">
    <title>@yield('pagetitle')</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    {{-- <link href="https://fonts.googleapis.com/css2?family=Cuprum&display=swap" rel="stylesheet"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/dataTables.bootstrap4.min.css">
    <!--[if lt IE 9]>
		<script src="{{asset('assets')}}/js/html5shiv.min.js"></script>
		<script src="{{asset('assets')}}/js/respond.min.js"></script>
    <![endif]-->
    @yield('jsc')
</head>
@yield('css')
    <style>
        body{
            /* font-family: 'KoHo', !important; */
            /* font-family: 'Patrick Hand', cursive; */
            /* font-family: 'Mitr', sans-serif !important; */
            font-family: 'Montserrat', Helvetica, Arial, serif;
        }
    </style>
<body>
    <div class="main-wrapper">
        @include('sweetalert::alert')

        @include('FE.header')
        @include('FE.menu')
        
      
        @yield('content')
      

       
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <div class="shin-fixed-footer">
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <!-- End col -->
                    <div class="col-md-6 p-1">
                        <span>Facebook Admin : <a href="https://www.facebook.com/profile.php?id=100005567533403">TNM</a> - 
                        <a href="https://www.facebook.com/ereiai">Shin</a>
                        </span>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-6 p-1 displayfooter">
                        <div class="copyright-menu">
                            <ul>
                                <li>
                                    <a href="{{route('index')}}">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="#">Điều khoản & Chính sách</a>
                                </li>
                               
                                <li>
                                    <a href="{{route('contact')}}">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                   
                </div>
                <!-- End Row -->
            </div>
            <!-- End Copyright Container -->
        </div>
    </div>
    <script src="{{asset('assets')}}/js/jquery-3.2.1.min.js"></script>
    <script src="{{asset('assets')}}/js/sweetalert2@10.js"></script>
	<script src="{{asset('assets')}}/js/popper.min.js"></script>
    <script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('assets')}}/js/jquery.slimscroll.js"></script>
    <script src="{{asset('assets')}}/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets')}}/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('assets')}}/js/Chart.bundle.js"></script>
    <script src="{{asset('assets')}}/js/app.js"></script>
    <script >
        $(document).ready( function () {
            $('#myTable').DataTable(
                {
     "order": [[ 1, "des" ]], // Order on init. # is the column, starting at 0
     // dom: 'Bfrtip',
     // buttons: [
     //     'copy', 'csv', 'excel', 'pdf', 'print'
     // ]
 }
            );
        } );
        </script>
    <script>
        $(document).ready(function () {
          $.get('{{route('index')}}/api/status-web').then(function (response) {
            if (response.protect == 1) {
              truee();
            }
          });
    
        })
    
        function thongbao() {
          
     Swal.fire({
    icon: 'error',
    title: 'Bị chặn',
    text: 'Đừng phá , Cảm ơn ♥',
    footer: '<a href = {{route('contact')}}>Có thắc mắc? Hãy liên hệ để được hỗ trợ !</a>',
    confirmButtonText:
       '<i class="fa fa-thumbs-up"></i> Đồng Ý',
    })
    
          }
    
      function truee() {
    
        $(window).on('keydown',function(event)
      {
      if(event.keyCode==123)
      {
        thongbao();
          return false;
      }
      else if(event.ctrlKey && event.shiftKey && event.keyCode==73 )
      {      thongbao();
    
          return false;  //Prevent from ctrl+shift+i
      }
      else if(event.ctrlKey && event.keyCode==73)
      {      thongbao();
    
          return false;  //Prevent from ctrl+shift+i
      }
      else if(event.ctrlKey && event.keyCode==18)
      {      thongbao();
    
          return false;  //Prevent from ctrl+shift+i
      }
      else if(event.ctrlKey && event.keyCode==83)
      {      thongbao();
    
          return false;  //Prevent from ctrl+shift+i
      }
      
      else if(event.ctrlKey && event.shiftKey && event.keyCode==67 )
      {      thongbao();
    
          return false;  //Prevent from ctrl+shift+c
      }
      else if(event.ctrlKey && event.keyCode==67)
      {      thongbao();
    
          return false;  //Prevent from ctrl+shift+c
      }
      else if(event.ctrlKey && event.shiftKey && event.keyCode==85 )
      {      thongbao();
    
          return false;  //Prevent from ctrl+shift+u
      }
      else if(event.ctrlKey && event.keyCode==85)
      {      thongbao();
    
          return false;  //Prevent from ctrl+shift+u
      }
      else if(event.ctrlKey && event.shiftKey && event.keyCode==74 )
      {        thongbao();
    
          return false;  //Prevent from ctrl+shift+j
      }
      else if(event.ctrlKey && event.shiftKey && event.keyCode==83 )
      {        thongbao();
    
          return false;  //Prevent from ctrl+shift+j
      }
      else if(event.ctrlKey && event.shiftKey && event.keyCode==70 )
      {        thongbao();
    
          return false;  //Prevent from ctrl+shift+j
      }
      else if(event.ctrlKey && event.keyCode==74)
      {      thongbao();
    
          return false;  //Prevent from ctrl+shift+j
      }
    });
    $(document).on("contextmenu",function(e)
    {
    e.preventDefault();
    });
      }
      </script>
    @yield('script')

</body>



</html>