<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>MiTiVPS - Đăng Nhập</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/style.css">

</head>
<style>
body { margin: 0 } /* Removed the default body margin */

.main-image{
    height: 100vh;
    width: 100vw;
    background-image: url('https://ah-cdn.r.worldssl.net/content/wp-content/uploads/2018/05/45cd37e136eae0634d8c429ed6e7b3cf.jpg');
    background-size: cover;
}
</style>
<body>
<section class="row main-image">
    @yield('content')
</section>
<script src="{{asset('assets')}}/js/sweetalert2@10.js"></script>
<script src="{{asset('assets')}}/js/jquery-3.2.1.min.js"></script>
<script src="{{asset('assets')}}/js/popper.min.js"></script>
<script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
<script src="{{asset('assets')}}/js/app.js"></script>
@yield('js')
</body>


</html>