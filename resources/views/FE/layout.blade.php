<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
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

    @yield('script')

</body>



</html>