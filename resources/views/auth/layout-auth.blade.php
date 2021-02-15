<!DOCTYPE html>
<html class="loading" lang="vi" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @php
    $seo = DB::table('seo')->get();
    @endphp
    @foreach ($seo as $s)
    <meta name="{{$s->meta_name}}" content="{{$s->meta_content}}">

    @endforeach
    <title>@yield('pagetitle','Trang Chủ')</title>
    <link rel="apple-touch-icon" href="{{asset('BE')}}/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('BE')}}/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">


    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->
    @yield('css1')
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/themes/bordered-layout.css">
    @yield('css2')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/pages/page-auth.css">
    <!-- END: Page CSS-->
    @yield('css3')
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/assets/css/style.css">
    <!-- END: Custom CSS-->
    <script src='https://www.google.com/recaptcha/api.js'></script>


</head>

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo-->
                        <a class="brand-logo" href="javascript:void(0);">
                            <img class="nav-item d-none d-lg-block" src="{{asset('image')}}/logo-timi-site.png" height="64" alt="">
                        </a>
                        <!-- /Brand logo-->
                        
                        <!-- Forgot password-->
    @yield('content')
</div>
</div>
</div>
</div>
</div>

@yield('js')

<script src="{{asset('assets')}}/js/sweetalert2@10.js"></script>
<script src="{{asset('assets')}}/js/jquery-3.2.1.min.js"></script>
<script src="{{asset('assets')}}/js/popper.min.js"></script>
<script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
<script src="{{asset('assets')}}/js/app.js"></script>
  <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('BE')}}/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->

    <script src="{{asset('BE')}}/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('BE')}}/app-assets/js/core/app-menu.js"></script>
    <script src="{{asset('BE')}}/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('BE')}}/app-assets/js/scripts/pages/page-auth-login.js"></script>
    <script src="{{asset('BE')}}/app-assets/js/scripts/forms/form-validation.js"></script>

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

</body>
<!-- END: Body-->

</html>