<div class="header">
    
    <div class="header-left">
        <a href="{{route('index')}}" class="logo">
            <img src="{{asset('assets')}}/img/logo.png" width="35" height="35" alt=""> <span>TiMiHost</span>
        </a>
    </div>
    <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars mt-3"></i></a>
    <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
  
    <ul class="nav user-menu float-right">
       
        @php
        $noti = DB::table('invoice')->where('user_id',Auth::user()->id)->where('status','2')->get();
        @endphp
        <li class="nav-item dropdown d-none d-sm-block">
            @if(count($noti) > 0)
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge badge-pill bg-danger float-right">{{count($noti)}}</span></a>
            @else
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i> </a>

            @endif
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span>Thông báo</span>
                </div>
                <div class="drop-scroll">
                    <ul class="notification-list">
                       @if(count($noti) > 0)
                        @foreach ($noti as $n)
                             <li class="notification-message">
                            <a href="{{route('history-buy')}}">
                                <div class="media">
                                    <span class="avatar">
                                        <img alt="John Doe" src="{{asset('assets')}}/img/user.jpg" class="img-fluid">
                                    </span>
                                    <div class="media-body">
                                        @php
                                        \Carbon\Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt.
                                    @endphp
                                        <p class="noti-details"><span class="noti-title"></span> Đơn hàng <b><span class="text-success" >{{$n->sku}}</span> </b> đang chờ bạn thanh toán </p>
                                        <p class="noti-time"><span class="notification-time">{{ $diff = Carbon\Carbon::parse($n->created_at)->diffForHumans(Carbon\Carbon::now()) }}</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                        @else
                        <li class="notification-message text-center mt-1">Không có thông báo</li>
                        @endif
                       
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="{{route('history-buy')}}">Xem tất cả đơn hàng</a>
                </div>
            </div>
        </li>
       
        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                <span class="user-img">
                    <img class="rounded-circle" src="{{asset('assets')}}/img/user.jpg" width="24" alt="Admin">
                    <span class="status online"></span>
                </span>
                <span> {{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('user-profile.profile')}}">Đổi thông tin</a>
                <a class="dropdown-item" href="{{route('user-profile.changepassword')}}">Đổi mật khẩu</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-desktop').submit();">
                                        {{ __('Đăng xuất') }}
                </a>
                <form id="logout-desktop" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
           
        </li>
       
    </ul>
    <div class="dropdown mobile-user-menu float-right">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             {{ __('Đăng xuất') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
  
</div>

