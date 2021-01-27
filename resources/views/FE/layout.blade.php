<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets')}}/img/favicon.ico">
    <title>@yield('pagetitle')</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/style.css">
    <!--[if lt IE 9]>
		<script src="{{asset('assets')}}/js/html5shiv.min.js"></script>
		<script src="{{asset('assets')}}/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        @include('FE.header')
        @include('FE.menu')
        @yield('content')
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{asset('assets')}}/js/jquery-3.2.1.min.js"></script>
	<script src="{{asset('assets')}}/js/popper.min.js"></script>
    <script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('assets')}}/js/jquery.slimscroll.js"></script>
    <script src="{{asset('assets')}}/js/Chart.bundle.js"></script>
    <script src="{{asset('assets')}}/js/app.js"></script>

</body>



</html>