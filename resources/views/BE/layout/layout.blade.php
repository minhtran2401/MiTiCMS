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
    <title>@yield('pagetitle')</title>
    <link rel="apple-touch-icon" href="{{asset('BE')}}/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('BE')}}/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- BEGIN: Vendor CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/vendors/css/extensions/sweetalert2.min.css">
    @yield('csspage')
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
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/assets/css/style.css">
    <!-- END: Custom CSS-->
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>



</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

@php
if(Auth::user()->theme == 1){
    $theme = "";
}
else{
    $theme = "dark-layout";
}
@endphp

<body class="vertical-layout vertical-menu-modern {{$theme}} navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
    @include('sweetalert::alert')

    <!-- BEGIN: Header-->
    @include('BE.layout.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
  
    @include('BE.layout.mainmenu')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">@yield('br-namepage1')</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Trang chủ</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="@yield('br-link2')">@yield('br-namepage2')</a>
                                    </li>
                                    <li class="breadcrumb-item active">@yield('br-namepage3')
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="#"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="#"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="#"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
    @yield('content')

</div>
  
</div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="ml-25" href="#" target="_blank">TiMiHost</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-right d-none d-md-block">TNM & NVT made with<i data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->
   

    <script src="{{asset('assets')}}/js/sweetalert2@10.js"></script>
    <script src="{{asset('assets')}}/js/jquery-3.2.1.min.js"></script>


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('BE')}}/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    @yield('pagevendor')
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('BE')}}/app-assets/js/core/app-menu.js"></script>
    <script src="{{asset('BE')}}/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    @yield('pagejs')
    <!-- END: Page JS-->
    @include('BE.layout.jspage')


    
</body>
<!-- END: Body-->

</html>