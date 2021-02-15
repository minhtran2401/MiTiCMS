<!DOCTYPE html>
<html  lang="vi">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Đăng Nhập Quản Trị</title>
    <link rel="apple-touch-icon" href="{{asset('BE')}}/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('BE')}}/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/themes/bordered-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/pages/page-auth.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2">
                    <div class="auth-inner py-2">
                        <!-- Login v1 -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="brand-logo">
                                    <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="28">
                                        <defs>
                                            <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                                <stop stop-color="#000000" offset="0%"></stop>
                                                <stop stop-color="#FFFFFF" offset="100%"></stop>
                                            </lineargradient>
                                            <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                                <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                                <stop stop-color="#FFFFFF" offset="100%"></stop>
                                            </lineargradient>
                                        </defs>
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                                <g id="Group" transform="translate(400.000000, 178.000000)">
                                                    <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill: currentColor"></path>
                                                    <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                                    <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                                    <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                                    <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <h2 class="brand-text text-primary ml-1">Admin MiTi</h2>
                                </a>

                                <h4 class="card-title mb-1">Chào mừng bạn đến với quản trị website! 👋</h4>
                                <p class="card-text mb-2">Hãy đăng nhập để vào trang quản trị</p>

                                <form id="form-login-admin" class="auth-login-formz mt-2" action="{{route('admin.login.process')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="login-email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="login-email" name="email" placeholder="john@example.com" aria-describedby="login-email" tabindex="1" autofocus />
                                    </div>

                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="login-password">Mật khẩu</label>
                                            <a href="{{route('index')}}">
                                                <small>Quên mật khẩu?</small>
                                            </a>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge" id="login-password" name="password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="remember-me" tabindex="3" />
                                            <label class="custom-control-label" for="remember-me"> Nhớ tài khoản </label>
                                        </div>
                                    </div>
                                    <button  class="btn btn-primary btn-block" tabindex="4">Đăng nhập</button>
                                </form>

                                <p class="text-center mt-2">
                                    <span>Không có tài khoản ?</span>
                                    <a href="{{route('index')}}">
                                        <span>Xin mời đi ra cho</span>
                                    </a>
                                </p>

                            </div>
                        </div>
                        <!-- /Login v1 -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <script src="{{asset('BE')}}/app-assets/vendors/js/vendors.min.js"></script>
    <script src="{{asset('BE')}}/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="{{asset('BE')}}/app-assets/js/core/app-menu.js"></script>
    <script src="{{asset('BE')}}/app-assets/js/core/app.js"></script>
    <script src="{{asset('BE')}}/app-assets/js/scripts/pages/page-auth-login.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    <script src="{{asset('assets')}}/js/sweetalert2@10.js"></script>
    <script src="{{asset('assets')}}/js/jquery-3.2.1.min.js"></script>
        <script>

    $("#form-login-admin").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    
    var form = $(this);
    var url = form.attr('action');
    var reurl = "{{route('admin.dashboard')}}"

    
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
                setTimeout(function() {
                    window.location = reurl;
                    },1500);
                    
                    
                }
               
                
              else{
                Swal.fire(
                    'Thất bại',
                    'Kiểm tra lại thông tin đăng nhập và thử lại',
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
</body>
<!-- END: Body-->

</html>