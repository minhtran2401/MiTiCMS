@php
 \Carbon\Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt.
@endphp
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons">
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Email"><i class="ficon" data-feather="mail"></i></a></li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Chat"><i class="ficon" data-feather="message-square"></i></a></li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Calendar"><i class="ficon" data-feather="calendar"></i></a></li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Todo"><i class="ficon" data-feather="check-square"></i></a></li>
                
            </ul>
            @php
            $timi = DB::table('miti_info')->first();
            @endphp
            <ul class="nav navbar-nav nav-item d-none d-lg-block">
            <div class="custom-control custom-switch custom-control-inline ">
                <input type="checkbox"  id="change-status-web" class="custom-control-input change-special change-status "{{ $timi->protect==1?'checked':'' }} >
                <label for="change-status-web" class="custom-control-label content-status" >Bảo vệ web</label>
            </div>
            </ul>
            
               
            <ul class="nav navbar-nav bookmark-icons">
               
                    @if($timi->status == 0)
              <a href="#" class="nav-link nav-link-lg ">
                <form action="{{ route('shutdown') }}" method="post">
                  @csrf
                  <button onclick="xacnhan(event)" style="submit" class="btn btn-outline-danger waves-effect"><i data-feather='power'></i> BẢO TRÌ</button>
              </form>
              </a>
              @else
              <a href="#" class="nav-link nav-link-lg ">
                <form action="{{ route('start') }}" method="post">
                  @csrf
                  <button onclick="xacnhan2(event)" style="submit" class="btn btn-outline-success waves-effect"><i data-feather='power'></i> KHỞI ĐỘNG</button>
              </form>
              </a>
              @endif
              
            </ul>
              @if(Auth::user()->id == 1 && 2 )
            <ul class="nav navbar-nav bookmark-icons">
                      <a href="#" class="nav-link nav-link-lg ">
                <form action="{{ route('our_backup_database') }}" method="get">
                  <button style="submit" class="btn btn-outline-warning waves-effect"><i data-feather='database'></i> DATABASE</button>
              </form>
              </a>
            </ul>
            @else
            @endif
              
      
        </div>
        <ul class="nav navbar-nav  align-items-center ml-auto">
            <li data-id="{{ Auth::user()->id}}" class="nav-item d-none d-lg-block">
                <div class="custom-control custom-switch custom-control-inline">
                    <input type="checkbox" id="changetheme"  class="custom-control-input change-status nav-link-style"  {{ Auth::user()->theme == 1?'checked':'' }}>
                    <label for="changetheme" class="custom-control-label content-status" ><i  data-feather='{{ Auth::user()->theme == 1?'sun':'moon' }}'></i></label>
                </div>
            </li>

            <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon" data-feather="search"></i></a>
                <div class="search-input">
                    <div class="search-input-icon"><i data-feather="search"></i></div>
                    <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="-1" data-search="search">
                    <div class="search-input-close"><i data-feather="x"></i></div>
                    <ul class="search-list search-list-main"></ul>
                </div>
            </li>
            @php
                    $noti_bill = DB::table('invoice')->where('status',1)->orderby('id_invoice','asc')->get();
                    @endphp
                       @php
                       $noti_sup = DB::table('contact')->where('status',0)->orderby('id','asc')->get();
                       @endphp
                       @php $total = count($noti_bill) + count($noti_sup) @endphp
            <li class="nav-item dropdown dropdown-notification mr-25"><a class="nav-link" href="javascript:void(0);" data-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span class="badge badge-pill badge-danger badge-up">{{$total}}</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 mr-auto">Thông báo</h4>
                            <div class="badge badge-pill badge-light-primary">{{$total}} Tin</div>
                        </div>
                    </li>
                   
                    <li class="scrollable-container media-list">
                        @if(isset($noti_bill))
                        @foreach ($noti_bill as $key => $nb)
                            <a class="d-flex" href="{{route('check-bill.index')}}">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar bg-light-success"><span class="avatar-content">{{$key + 1}}</span></div>
                                </div>
                                <div class="media-body">
                                    <p class="media-heading"><span class="font-weight-bolder">@php
                                        $id_user =$nb->user_id;
                                        $tl = App\Models\USer::find($id_user);
                                        echo $tl->name;
                                      @endphp 🎉</span>đã đặt đơn hàng {{$nb->sku}}</p><small class="notification-text"> {{ $diff = Carbon\Carbon::parse($nb->created_at)->diffForHumans(Carbon\Carbon::now()) }}</small>
                                </div>
                            </div>
                        </a>
                        @endforeach
                        @else
                        @endif
                    
                        <div class="media d-flex align-items-center">
                            <h6 class="font-weight-bolder mr-auto mb-0">Thông báo hỗ trợ</h6>
                            <div class="custom-control custom-control-primary custom-switch">
                                <input class="custom-control-input" id="systemNotification" type="checkbox" checked="">
                                <label class="custom-control-label" for="systemNotification"></label>
                            </div>
                        </div>
                        @if(isset($noti_sup))
                        @foreach ($noti_sup as $ns)
                            <a class="d-flex" href="{{route('show.case')}}">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar bg-light-danger">
                                        <div class="avatar-content"><i class="avatar-icon" data-feather="settings"></i></div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p class="media-heading"><span class="font-weight-bolder">@php
                                        $id_user =$ns->id_user;
                                        $tl = App\Models\USer::find($id_user);
                                        echo $tl->name;
                                      @endphp</span>&nbsp;đã gửi một hỗ trợ</p><small class="notification-text">{{ $diff = Carbon\Carbon::parse($ns->created_at)->diffForHumans(Carbon\Carbon::now()) }}</small>
                                </div>
                            </div>
                        </a>
                        @endforeach
                        @else
                        @endif
                        
                       
                    </li>
                    <li class="dropdown-menu-footer"><a class="btn btn-primary btn-block" href="javascript:void(0)">Đọc tất cả thông báo</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">{{ Auth::user()->name }}</span><span class="user-status">Admin</span></div><span class="avatar"><img class="round" src="{{asset('image')}}/{{Auth::user()->avatar}}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" data-toggle="modal" data-target="#changepassadmin" href="#"><i data-feather='key'></i> Đổi mật khẩu </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    <i class="mr-50" data-feather="power"></i> {{ __('Đăng xuất') }}
                </a>
                    <form id="logout-form" action="{{ route('logout.admin') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>

</nav>


<div class="modal fade text-left modal-primary" id="changepassadmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">Primary Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tart lemon drops macaroon oat cake chocolate toffee chocolate bar icing. Pudding jelly beans
                carrot cake pastry gummies cheesecake lollipop. I love cookie lollipop cake I love sweet gummi
                bears cupcake dessert.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
            </div>
        </div>
    </div>
</div>
@section('pagevendor')

@endsection