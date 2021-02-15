@extends('BE.layout.layout')
@section('pagetitle','Trang Thống Kê')
@section('css1')
<link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/vendors/css/charts/apexcharts.css">
<link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/vendors/css/extensions/toastr.min.css">
@endsection
@section('css3')

<link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/core/menu/menu-types/vertical-menu.css">
<link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/pages/dashboard-ecommerce.css">
<link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/plugins/charts/chart-apex.css">
<link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/css/plugins/extensions/ext-component-toastr.css">



@endsection
@section('content')
@section('br-namepage1','Trang Thống Kê')
@section('br-namepage2','Tổng Quan')
@section('br-namepage3','Thống kê trang web')
<div class="content-body">
    <!-- Dashboard Ecommerce Starts -->
    <section id="dashboard-ecommerce">
        <div class="row match-height">
            <!-- Medal Card -->
            <div class="col-xl-4 col-md-6 col-12">
                <div class="card card-congratulation-medal">
                    <div class="card-body">
                        <h5>Xin chào 🎉 {{Auth::user()->name}}!</h5>
                        <p class="card-text font-small-3">Timihost rất nhớ bạn</p>
                        <h3 class="mb-75 mt-2 pt-50">
                            <a href="javascript:void(0);">Làm gì đó đi nào !</a>
                        </h3>
                        <a href="{{route('check-bill.index')}}"> <button type="button" class="btn btn-primary">Check đơn</button></a>
                        <img src="{{asset('BE')}}/app-assets/images/illustration/badge.svg" class="congratulation-medal" alt="Medal Pic" />
                    </div>
                </div>
            </div>
            <!--/ Medal Card -->

            <!-- Statistics Card -->
            <div class="col-xl-8 col-md-6 col-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <h4 class="card-title">Tổng quát</h4>
                        <div class="d-flex align-items-center">
                            <p class="card-text font-small-2 mr-25 mb-0">Cập nhật liên tục</p>
                        </div>
                    </div>
                    <div class="card-body statistics-body">
                        <div class="row">
                            
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="media">
                                    <div class="avatar bg-light-info mr-2">
                                        <div class="avatar-content">
                                            <i data-feather="user" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0">{{$data['customer']}}</h4>
                                        <p class="card-text font-small-3 mb-0">Khách hàng</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                <div class="media">
                                    <div class="avatar bg-light-danger mr-2">
                                        <div class="avatar-content">
                                            <i data-feather="box" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0">{{$data['allservice']}}</h4>
                                        <p class="card-text font-small-3 mb-0">Sản phẩm</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                <div class="media">
                                    <div class="avatar bg-light-success mr-2">
                                        <div class="avatar-content">
                                            <i data-feather="dollar-sign" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <h4 class="card-text font-small-3 mb-0">{{number_format($data['thunhap'])}} đ</h4>
                                        <p class="card-text font-small-3 mb-0">Tổng thu</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="media">
                                    <div class="avatar bg-light-primary mr-2">
                                        <div class="avatar-content">
                                            <i data-feather="trending-up" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <h4 class="card-text font-small-3 mb-0 mb-0">{{number_format($data['chitieu'])}} đ</h4>
                                        <p class="card-text font-small-3 mb-0">Tổng chi</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Statistics Card -->
        </div>

        <div class="row match-height">
            <div class="col-lg-4 col-12">
                <div class="row match-height">

                    
                    <!-- Clock-->
                    <div class="col-lg-12 col-md-6 col-12">
                        <div class="card card-browser-states">
                            <div class="card-body">
                                <div class="row">
                                   
                                    <div class="col-12">
                                        <div id="clock-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ end clock-->
                    

                    <!-- Bar Chart - Orders -->
                    
                    <div class="col-lg-6 col-md-3 col-6">
                        <div class="card">
                            <div class="card-body pb-50">
                                <h6>HÔM NAY</h6>
                                <div class="small-text mb-1">Đã bán được</div>
                                <h2 class="font-weight-bolder mb-1">{{$data['todaybilled']}}/20 Đơn</h2>
                                @if($data['todaybilled'] < 20)
                                <div class="text-danger">BẠN CHƯA ĐẠT CHỈ TIÊU <i data-feather='alert-triangle'></i></div>
                                @elseif($data['todaybilled'] == 20)
                                <div class="text-primary">BẠN ĐÃ ĐẠT CHỈ TIÊU  <i data-feather='check'></i></div>
                                @else
                                <div class="text-success">BẠN ĐÃ VƯỢT CHỈ TIÊU <i data-feather='award'></i></div>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                    <!--/ Bar Chart - Orders -->

                    <!-- Line Chart - Profit -->
                    <div class="col-lg-6 col-md-3 col-6">
                        <div class="card card-tiny-line-stats">
                            <div class="card-body pb-50">
                                <h6 class="text-primary">Tiền thu hôm nay</h6>
                                <h2 class=" card-text font-small-3 mb-0 font-weight-bolder text-primary">+ {{number_format($data['todayincomes']->total)}} đ    <i data-feather='log-in'  class="avatar-icon font-medium-3"></i></h2>
                               
                            </div>
                            <div class="card-body pb-50">
                                <h6 class="text-danger">Tiền chi hôm nay</h6>
                                <h2 class=" card-text font-small-3 mb-0 font-weight-bolder text-danger">- {{number_format($data['todayfunds']->total)}} đ    <i data-feather='log-out'  class="avatar-icon font-medium-3"></i></h2>
                               
                            </div>
                            <div class="card-body pb-50">
                                <h6 class="text-success">Tiền lời hôm nay</h6>
                                <h2 class=" card-text font-small-3 mb-0 font-weight-bolder text-success">+ {{number_format($data['todaymoney'])}} đ    <i data-feather='pocket'  class="avatar-icon font-medium-3"></i></h2>
                               
                            </div>
                        </div>
                    </div>
                    <!--/ Line Chart - Profit -->

                </div>
            </div>

            <!-- Revenue Report Card -->
            <div class="col-lg-8 col-12">
                <div class="card card-revenue-budget">
                    <div class="row mx-0">
                        <div class="col-md-12 col-12 revenue-report-wrapper">
                            <div class="d-sm-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title mb-50 mb-sm-0">Bộ lọc thống kê</h4>
                                <div class="formRow">
                                 
                                    <div class="formRight">
                                        <form id="shortday" action="{{route('shortday')}}" method="POST">
                                            @csrf
                                            <select class="btn btn-outline-primary btn-sm dropdown-toggle budget-dropdown waves-effect" name="getmonth" id="getmonth">
                                                @for ($i =1; $i <= 12; $i++)
                                               
                                                    @if($i < 10)
                                                    <option value="0{{ $i }}">  Tháng {{ $i }}</option>
                                                    @else
                                                    <option value="{{ $i }}">  Tháng {{ $i }}</option>
                                                    @endif
                        
                                             @endfor  
                        
                                              </select>
                                              <select class="btn btn-outline-primary btn-sm dropdown-toggle budget-dropdown waves-effect" name="getyear" id="getyear">
                                                    <option value="2021">  2021</option>
                                                    <option value="2022">  2022</option>
                                                    <option value="2023">  2023</option>
                                                    <option value="2024">  2024</option>
                                                    <option value="2025">  2025</option>
                                              </select>
                                         
                                            <input type="submit" class="blueB btn btn-primary xemthongke"  value="Xem thống kê" />
                                        </form>
                                    </div>
                                    <div class="clear"></div>
                               </div>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center mr-2">
                                        <span class="bullet bullet-primary font-small-3 mr-50 cursor-pointer"></span>
                                        <span>Lượt truy cập</span>
                                    </div>
                                    <div class="d-flex align-items-center ml-75">
                                        <span class="bullet bullet-secondary font-small-3 mr-50 cursor-pointer"></span>
                                        <span>Ngày</span>
                                    </div>
                                </div>
                            </div>
                            <div id="thongke"></div>
                           
                        </div>
                       
                    </div>
                </div>
            </div>
            <!--/ Revenue Report Card -->
        </div>

        <div class="row match-height">

            
            <!-- Browser States Card -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-browser-states">
                    <div class="card-header">
                        <div>
                            <h4 class="card-title">Trình duyệt</h4>
                            <p class="card-text font-small-2">( Đang phát triển sau )</p>
                        </div>
                        {{-- <div class="dropdown chart-dropdown">
                            <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-toggle="dropdown"></i>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        <div class="browser-states">
                            <div class="media">
                                <img src="{{asset('BE')}}/app-assets/images/icons/google-chrome.png" class="rounded mr-1" height="30" alt="Google Chrome" />
                                <h6 class="align-self-center mb-0">Google Chrome</h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="font-weight-bold text-body-heading mr-1">54.4%</div>
                                <div id="browser-state-chart-primary"></div>
                            </div>
                        </div>
                        <div class="browser-states">
                            <div class="media">
                                <img src="{{asset('BE')}}/app-assets/images/icons/mozila-firefox.png" class="rounded mr-1" height="30" alt="Mozila Firefox" />
                                <h6 class="align-self-center mb-0">Mozila Firefox</h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="font-weight-bold text-body-heading mr-1">6.1%</div>
                                <div id="browser-state-chart-warning"></div>
                            </div>
                        </div>
                        <div class="browser-states">
                            <div class="media">
                                <img src="{{asset('BE')}}/app-assets/images/icons/apple-safari.png" class="rounded mr-1" height="30" alt="Apple Safari" />
                                <h6 class="align-self-center mb-0">Apple Safari</h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="font-weight-bold text-body-heading mr-1">14.6%</div>
                                <div id="browser-state-chart-secondary"></div>
                            </div>
                        </div>
                        <div class="browser-states">
                            <div class="media">
                                <img src="{{asset('BE')}}/app-assets/images/icons/internet-explorer.png" class="rounded mr-1" height="30" alt="Internet Explorer" />
                                <h6 class="align-self-center mb-0">Internet Explorer</h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="font-weight-bold text-body-heading mr-1">4.2%</div>
                                <div id="browser-state-chart-info"></div>
                            </div>
                        </div>
                        <div class="browser-states">
                            <div class="media">
                                <img src="{{asset('BE')}}/app-assets/images/icons/opera.png" class="rounded mr-1" height="30" alt="Opera Mini" />
                                <h6 class="align-self-center mb-0">Opera Mini</h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="font-weight-bold text-body-heading mr-1">8.4%</div>
                                <div id="browser-state-chart-danger"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Browser States Card -->

            <!-- Goal Overview Card -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Thu - Chi</h4>
                        <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                    </div>
                    <div class="card-body p-0">
                        <div id="goal-overview-radial-bar-chart" class="my-2"></div>
                        <div class="row border-top text-center mx-0">
                            <div class="col-6 border-right py-1">
                                <p class="card-text text-muted mb-1">Tiền thu</p>
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#add-incomes">
                                    <i data-feather='plus-circle'></i> Thêm
                                </button>
                                @foreach ($data['incomes'] as $i)
                                    <hr>
                                <h3 class="font-weight-bolder mb-0">{{number_format($i->incomes_value)}} đ</h3>
                                @endforeach
                                <hr>
                                <h3  class="font-weight-bolder mb-0" >....................</h3>
                                
                            
                                <!--! Modal -->
                                <div class="modal fade text-left modal-primary" id="add-incomes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel160">Thêm khoảng thu</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               <form action="{{route('add_incomes')}}" method="POST">
                                                @csrf
                                                   <input hidden value="{{Auth::user()->id}}" type="text" name="id_user">
                                                   <input placeholder="Tên khoản thu" class="form-control mb-1" type="text" name="name_incomes"  required>
                                                   <input placeholder="Chi tiết" class="form-control mb-1" type="text" name="detail_incomes" required>
                                                   <input placeholder="Số tiền" class="form-control mb-1" type="text" name="incomes_value" required>
                                                    <input class="form-control" type="date" name="day_incomes" required>
                                             
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" type="submit"><i data-feather='plus-circle'></i> Thêm</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i data-feather='x-circle'></i> Hủy</button>
                                               
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <!--! End Modal -->
                            </div>
                            <div class="col-6 py-1">
                                <p class="card-text text-muted mb-1">Tiền chi</p>
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#add-funds">
                                    <i data-feather='plus-circle'></i>  Thêm
                                </button>
                           
                                @foreach ($data['funds'] as $i)
                                <hr>
                            <h3 class="font-weight-bolder mb-0">{{number_format($i->funds_value)}} đ</h3>
            
                            @endforeach
                            <hr>
                            <h3  class="font-weight-bolder mb-0" >....................</h3>
                                 <!--! Modal -->
                                 <div class="modal fade text-left modal-primary" id="add-funds" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel160">Thêm khoảng chi</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               <form action="{{route('add_funds')}}" method="POST">
                                                @csrf
                                                   <input hidden value="{{Auth::user()->id}}" type="text" name="id_user">
                                                   <input placeholder="Tên khoản chi" class="form-control mb-1" type="text" name="name_funds"  required>
                                                   <input placeholder="Chi tiết" class="form-control mb-1" type="text" name="detail_funds" required>
                                                   <input placeholder="Số tiền" class="form-control mb-1" type="text" name="funds_value" required>
                                                    <input class="form-control" type="date" name="day_funds" required>
                                             
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" type="submit"><i data-feather='plus-circle'></i> Thêm</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i data-feather='x-circle'></i> Hủy</button>
                                               
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <!--! End Modal -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Goal Overview Card -->

            <!-- Transaction Card -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-transaction">
                    <div class="card-header">
                        <h4 class="card-title">Thu - Chi gần đây</h4>
                        {{-- <div class="dropdown chart-dropdown">
                            <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-toggle="dropdown"></i>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        @foreach ($data['tomtatthuchi'] as $item)
                            @foreach ($item as $i)
                            @if(isset ($i->incomes_value))
                            <div class="transaction-item">
                                <div class="media">
                                    <div class="avatar bg-light-primary rounded">
                                        <div class="avatar-content">
                                            <i data-feather='log-in'  class="avatar-icon font-medium-3"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="transaction-title">{{$i->name_incomes}}</h6>
                                        <small>{{$i->detail_incomes}}</small>
                                    </div>
                                </div>
                                <div class="font-weight-bolder text-success">+ {{number_format($i->incomes_value)}} đ</div>
                            </div>
                            @else
                            <div class="transaction-item">
                                <div class="media">
                                    <div class="avatar bg-light-primary rounded">
                                        <div class="avatar-content">
                                            <i data-feather='log-out'  class="avatar-icon font-medium-3"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="transaction-title">{{$i->name_funds}}</h6>
                                        <small>{{$i->detail_funds}}</small>
                                    </div>
                                </div>
                                <div class="font-weight-bolder text-danger">- {{number_format($i->funds_value)}} đ</div>
                            </div>
                            @endif
                            @endforeach
                             
                        @endforeach
                       
                    
                    </div>
                </div>
            </div>
            <!--/ Transaction Card -->

            <!-- Company Table Card -->
            <div class="col-lg-6 col-12">
                <div class="card card-company-table">
                    <div class="card-body p-0">
                        <div id="khachhangtiemnang"></div>
                    </div>
                </div>
            </div>
            <!--/ Company Table Card -->

            <!-- Developer Meetup Card -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="card card-developer-meetup">
                   
                    <div class="card-body">
                      <div id="thongkedichvu"></div>
                    </div>
                </div>
            </div>
            <!--/ Developer Meetup Card -->

        </div>
    </section>
    <!-- Dashboard Ecommerce ends -->

</div>

@endsection
@section('pagejs')

<script>
    var API_URL = "{{ route('api.index') }}";
    $.get(API_URL + '/thong-ke-truy-cap').then(function (response){
        // alert(response);
    });
  </script>
<script>
     $.get(API_URL + '/thong-ke-truy-cap').then(function (response){
    Highcharts.chart('thongke', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Thống kê truy cập tháng này '
    },
    subtitle: {
        text: 'Nguồn: <a href="">API website</a>'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Koho, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Số lượt truy cập ( lượt )'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Truy cập ngày <b>{point.y:.1f} lượt</b>'
    },
    series: [{
        name: 'Số lượt truy cập',
        
        data: response,
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Koho, sans-serif'
            }
        }
    }]
});
});
</script>



<script>
    // this is the id of the form
    
$("#shortday").submit(function(e) {

e.preventDefault(); // avoid to execute the actual submit of the form.
var get_month = $('#getmonth').val();
var get_year = $('#getyear').val();
var form = $(this);
var url = form.attr('action');

$.ajax({
       type: "POST",
       url: url,
       data: form.serialize(),
       success: function(res)
      
       {
        //    alert(get_month); // show response from the php script.
        Highcharts.chart('thongke', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Thống kê truy cập tháng ' + get_month + ' năm ' + get_year
    },
    subtitle: {
        text: 'Nguồn: <a href="">API website</a>'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Koho, sans-serif'
                
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Số lượt truy cập ( lượt )'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Truy cập ngày <b>{point.y:.1f} lượt</b>'
    },
    series: [{
        name: 'Số lượt truy cập',
        
        data: res,
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Koho, sans-serif'
            }
        }
    }]
});
       }
     });


});
</script>


<script>
    
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $(document).ready(function(){
    $('#change-status-web').change(function(e){
        // ngăn sự kiện change-status này khi click sẽ lan ra các sự kiện khác
        //thường áp dụng cho các button form hoặc thẻ link ( tag a )
          e.preventDefault();
    
          //lấy id nhóm sản phẩm từ thẻ td ( data-id )
          var status=$(this).prop('checked')?1:0;
         
          //tạo biến global cho element đang click
          var change=$(this)
          var content=$(this).parent().find('.content-status')
          //nếu có id thì mới gửi ajax
          if(status){
              $.ajax({
                  //tên route có url là ....
                  url:"{{ route('changeStatus.web') }}",
                  // kiểu method nên là post
                  type:"post",
                    
                  //truyền biến id bà status
                  data:{status:status,
                    "_token": "{{ csrf_token() }}",

                }
    
                  //nếu gửi thành công
              }).done(function(result){
                //nếu k nhận dc id
                  if(result=='error'){
                      alert("Không nhận được id.");
                  let old= change.prop('checked')?false:true;
                    change.prop('checked',old)
                      //k cho chạy lệnh bên dưới nhờ return
                      return;
                  }
    
    
                  //nếu status là 1 ( hiện )
                  if(status==1){
                      change.prop('checked','checked')
                      content.text('Đang bật bảo vệ trang web')
                   
                      //k cho chạy lệnh bên dưới nhờ return
                      return;
                  }
                  else
                  //nếu status là 0 ( ẩn )
                     
                      change.prop('checked','')
                      content.text('Đang tắt bảo vệ trang web')
                    //nếu gửi thất bại
              }).fail(function(){
                  let old= change.prop('checked')?false:true;
                    change.prop('checked',old)
                  alert("Xảy ra lỗi từ phía server.");
              })
          }
      })
    }
    )
    
    
    
    </script>

@endsection