@extends('auth.layout-auth')
@section('pagetitle','Đăng Nhập')
@section('content')

                    <!-- Left Text-->
                    <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="{{asset('BE')}}/app-assets/images/pages/login-v2.svg"  /></div>
                    </div>
                    <!-- /Left Text-->
                    <!-- Login-->
                    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                            <h4 class="card-title mb-1">Chào mừng bạn đến với MiTi! 👋</h4>
                            <p class="card-text mb-2">Đăng nhập để sử dụng những dịch vụ của MiTi</p>
                            <form  id="formz-login" method="POST" action="{{ route('loginz') }}" class="auth-login-form mt-2">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <input class="form-control" type="text" name="email" placeholder="gmail@example.com" aria-describedby="login-email" autofocus="" tabindex="1" />
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">Mật khẩu</label><a href="{{ route('password.request') }}"><small>Quên mật khẩu</small></a>
                                    </div>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input class="form-control form-control-merge" type="password" name="password" placeholder="············" aria-describedby="login-password" tabindex="2" />
                                        <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                    </div>
                                    <input type="text" hidden name="active" value="1" id="">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="rememberz" >
                                        <label class="custom-control-label" for="rememberz"> Nhớ tài khoản</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block" tabindex="4">Đăng nhập</button>
                            </form>
                            <p class="text-center mt-2"><span>Thành viên mới ?</span><a href="{{route('register')}}"><span>&nbsp;Đăng Kí Ngay</span></a></p>
                            <div class="divider my-2">
                                <div class="divider-text">Hoặc</div>
                            </div>
                            <div class="auth-footer-btn d-flex justify-content-center"><a class="btn btn-facebook" href="javascript:void(0)"><i data-feather="facebook"></i></a><a class="btn btn-twitter white" href="javascript:void(0)"><i data-feather="twitter"></i></a><a class="btn btn-google" href="javascript:void(0)"><i data-feather="mail"></i></a><a class="btn btn-github" href="javascript:void(0)"><i data-feather="github"></i></a></div>
                        </div>
                    </div>
                    <!-- /Login-->
   
@endsection
@section('js')
<script src="{{asset('assets')}}/js/sweetalert2@10.js"></script>
<script src="{{asset('assets')}}/js/jquery-3.2.1.min.js"></script>
    <script>
        $("#formz-login").submit(function(e) {

e.preventDefault(); // avoid to execute the actual submit of the form.

var form = $(this);
var url = form.attr('action');
var reurl = "{{route('index')}}"

$.ajax({
       type: "POST",
       url: url,
       data: form.serialize(), // serializes the form's elements.
       success: function(data)
       {
          if(data==1){
            Swal.fire(
                'Thành công',
                'Đăng nhập thành công',
                'success'
                )
            // window.location = reurl; 
            setTimeout(function() {
  window.location = reurl;
},1500);
          }
          else if(data==0){
            Swal.fire(
                'Thất bại',
                'Kiểm tra lại thông tin đăng nhập và thử lại.',
                'error'
                )
          }
          else {
            Swal.fire(
                'Thất bại',
                'Tài khoản của bạn đã bị khóa , liên hệ admin để mở khóa.',
                'error'
                )
          }
       }
     });
});
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
@endsection
