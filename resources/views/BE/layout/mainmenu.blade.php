<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{route('admin.dashboard')}}"><span class="brand-logo">
                        <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
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
                                        <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                        <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                        <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                        <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                        <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                    </g>
                                </g>
                            </g>
                        </svg></span>
                    <h2 class="brand-text">MiTiHost</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    
    @php
    $link = ['admin/group-service','admin/type-service','admin/service/*',];
    $linkvps = ['admin/service/vps','admin/service/vps/create','admin/service/vps/*/edit',];
    $linkaccount = ['admin/service/account','admin/service/account/create','admin/service/account/*/edit',];
    $linkdomain = ['admin/service/domain','admin/service/domain/create','admin/service/domain/*/edit',];
    $linkserver = ['admin/service/server','admin/service/server/create','admin/service/server/*/edit',];
    $linkhost = ['admin/service/hosting','admin/service/hosting/create','admin/service/hosting/*/edit',];
    $linkpost = ['admin/blog','admin/blog-type','admin/blog/*/edit','admin/blog-type/*/edit','admin/blog/create','admin/blog-type/create'];
    $linkgr_ty = ['admin/group-service','admin/type-service','loai-blog/*/edit','loai-blog/create',];
    $linkquickadd = ['admin/quickadd/status-invoice','admin/quickadd/os-system','admin/quickadd/os-location',];
    $linkuser = ['admin/user','admin/user/*/edit',];
    $linkdashboard = ['admin','admin/storage'];
    $linkkhac = ['admin/payment-method','admin/payment-method/create','admin/payment-method/*/edit','admin/seo','admin/seo/edit/*','admin/seo/create']

    @endphp
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item  {{ request()->is($linkdashboard) ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href="{{route('admin.dashboard')}}"><i data-feather="home"></i><span class="menu-title text-truncate" >Thống kê</span></a>
                <ul class="menu-content">
                    <li class=" {{ request()->is('admin') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('admin.dashboard')}}"><i data-feather='trending-up'></i><span class="menu-item">Tổng Quan</span></a>
                    </li>
                    <li class="{{ request()->is('admin/storage') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('storage.index')}}"><i data-feather='package'></i><span class="menu-item">Kho Hàng</span></a>
                    </li>
                    
                </ul>
            </li>


            <li class=" navigation-header"><span >Ứng Dụng &amp; Tiện Ích</span><i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='grid'></i><span class="menu-title text-truncate" >Tiện Ích</span></a>
                <ul class="menu-content">
                    <li class=" nav-item"><a class="d-flex align-items-center" href=""><i data-feather="mail"></i><span class="menu-title text-truncate" >Email</span></a>
                    </li>
                    <li class=" nav-item"><a class="d-flex align-items-center" href=""><i data-feather="message-square"></i><span class="menu-title text-truncate" >Tin nhắn</span></a>
                    </li>
                    <li class=" nav-item"><a class="d-flex align-items-center" href=""><i data-feather="check-square"></i><span class="menu-title text-truncate" >Công việc</span></a>
                    </li>
                    <li class=" nav-item"><a class="d-flex align-items-center" href=""><i data-feather="calendar"></i><span class="menu-title text-truncate">Lịch</span></a>
                    </li>
                </ul>
            </li>


            <li class=" navigation-header"><span >Dịch Vụ</span><i data-feather="more-horizontal"></i>
            </li>

            <li class=" nav-item {{ request()->is($link) ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href="#"><i data-feather="menu"></i><span class="menu-title text-truncate" data-i18n="Menu Levels">Danh sách</span></a>
                <ul class="menu-content">
                    <li class=" {{ request()->is($linkgr_ty) ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href="#"><i data-feather='archive'></i><span class="menu-item" > Nhóm & Loại</span></a>
                        <ul class="menu-content">
                            <li class="{{ request()->is('admin/group-service') ? 'active' : '' }}"><a class="d-flex align-items-center  " href="{{route('group-service.index')}}"><i data-feather='package'></i><span class="menu-item" >Nhóm dịch vụ</span></a>
                                
                            </li>
                            <li class="{{ request()->is('admin/type-service') ? 'active' : '' }}"><a class="d-flex align-items-center  " href="{{route('type-service.index')}}"><i data-feather='package'></i><span class="menu-item" >Loại dịch vụ</span></a>
                               
                            </li>
                        </ul>
                    </li>
                    <li class=" {{ request()->is($linkquickadd) ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href="#"><i data-feather='fast-forward'></i><span class="menu-item" > Thêm Nhanh</span></a>
                        <ul class="menu-content">
                            <li class="{{ request()->is('admin/quickadd/status-invoice') ? 'active' : '' }}"><a class="d-flex align-items-center  " href="{{route('status_invoice')}}"><i data-feather='loader'></i><span class="menu-item" >Tình trạng </span></a>
                                
                            </li>
                            <li class="{{ request()->is('admin/quickadd/os-location') ? 'active' : '' }}"><a class="d-flex align-items-center  " href="{{route('os_system')}}"><i data-feather='slack'></i><span class="menu-item" >Khu Vực </span></a>
                                
                            </li>
                            <li class="{{ request()->is('admin/quickadd/os-system') ? 'active' : '' }}"><a class="d-flex align-items-center  " href="{{route('hdh')}}"><i data-feather='terminal'></i><span class="menu-item" >HĐH</span></a>
                               
                            </li>
                        </ul>
                    </li>
                    <li class=" nav-item {{ request()->is($linkserver) ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href="#"><i data-feather='server'></i><span class="menu-item" > Máy chủ</span></a>
                        <ul class="menu-content">
                            <li class="{{ request()->is('admin/service/server') ? 'active' : '' }}" ><a class="d-flex align-items-center" href="{{route('server.index')}}"><i data-feather='settings'></i><span class="menu-item">Quản Lí</span></a>
                            </li>
                            <li class="{{ request()->is('admin/service/server/create') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('server.create')}}"><i data-feather='plus'></i><span class="menu-item" >Thêm</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class=" nav-item {{ request()->is($linkvps) ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href="#"><i data-feather='cpu'></i><span class="menu-item" > VPS</span></a>
                        <ul class="menu-content">
                            <li class=" {{ request()->is('admin/service/vps') ? 'active' : '' }}"><a class="d-flex align-items-center " href="{{route('vps.index')}}"><i data-feather='settings'></i><span class="menu-item">Quản Lí</span></a>
                            </li>
                            <li class=" {{ request()->is('admin/service/vps/create') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('vps.create')}}"><i data-feather='plus'></i><span class="menu-item" >Thêm</span></a>
                            </li>
      
                        </ul>
                    </li>

                    <li class=" nav-item {{ request()->is($linkhost) ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href="#"><i data-feather='database'></i><span class="menu-item" > Hosting</span></a>
                        <ul class="menu-content">
                            <li class="{{ request()->is('admin/service/hosting') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('hosting.index')}}"><i data-feather='settings'></i><span class="menu-item" >Quản Lí</span></a>
                            </li>
                            <li class="{{ request()->is('admin/service/hosting/create') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('hosting.create')}}"><i data-feather='plus'></i><span class="menu-item" >Thêm</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class=" nav-item {{ request()->is($linkdomain) ? 'has-sub open' : '' }}" ><a class="d-flex align-items-center" href="#"><i data-feather='globe'></i><span class="menu-item" > Tên miền</span></a>
                        <ul class="menu-content">
                            <li class="{{ request()->is('admin/service/domain') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('domain.index')}}"><i data-feather='settings'></i><span class="menu-item" >Quản Lí</span></a>
                            </li>
                            {{-- <li  class="{{ request()->is('admin/service/domain/create') ? 'active' : '' }}"><a class="d-flex align-items-center" href="#"><i data-feather='plus'></i><span class="menu-item" >Thêm</span></a>
                            </li> --}}
                            
                        </ul>
                    </li>

                    <li class=" nav-item {{ request()->is($linkaccount) ? 'has-sub open' : '' }}" ><a class="d-flex align-items-center" href="#"><i data-feather='clipboard'></i><span class="menu-item" > Tài khoản</span></a>
                        <ul class="menu-content">
                            <li class="{{ request()->is('admin/service/account') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('account.index')}}"><i data-feather='settings'></i><span class="menu-item" >Quản Lí</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        
       
            
            <li class=" navigation-header"><span > Người Dùng</span><i data-feather="more-horizontal"></i>
            </li>

            <li class=" nav-item  {{ request()->is($linkuser) ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span class="menu-title text-truncate" >Khách Hàng</span></a>
                <ul class="menu-content">
                    <li class="{{ request()->is('admin/user') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('user.index')}}"><i data-feather="list"></i><span class="menu-item" >Danh sách</span></a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item {{ request()->is('admin/check-bill') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('check-bill.index')}}"><i data-feather='file-text'></i><span class="menu-title text-truncate" >Đơn Hàng</span>
                @php
                $count_bill = DB::table('invoice')->where('status','1')->get();
                @endphp
                 @if(count($count_bill) > 0)
                 <span class="badge badge-light-warning badge-pill ml-auto mr-1">{{count($count_bill)}}</span>
                 @else
                 @endif
            </a>
                
            </li>

            <li class=" navigation-header"><span > Khác</span><i data-feather="more-horizontal"></i>
            </li>

         
            <li  class=" nav-item {{ request()->is($linkpost) ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href="#"><i data-feather='bold'></i><span class="menu-title text-truncate">Bài Viết</span></a>
                <ul class="menu-content">
                    <li  class="{{ request()->is('admin/blog-type') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('blog-type.index')}}"><i data-feather="circle"></i><span class="menu-item" >Thể Loại</span></a>
                    </li>
                    <li  class="{{ request()->is('admin/blog') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('blog.index')}}"><i data-feather="circle"></i><span class="menu-item" >Blog</span></a>
                    </li>
                   
                </ul>
            </li>

            <li class=" nav-item {{ request()->is($linkkhac) ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href="#"><i data-feather='info'></i><span class="menu-title text-truncate">Thông Tin</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="app-user-list.html"><i data-feather='globe'></i><span class="menu-item" >Website</span></a>
                    </li>
                    <li class="{{ request()->is('admin/seo','admin/seo/create','admin/seo/*/edit') ? 'active' : '' }}"> <a class="d-flex align-items-center" href="{{route('seo.index')}}"><i data-feather='bar-chart'></i><span class="menu-item" >SEO</span></a>
                    </li>
                    <li class="{{ request()->is('admin/payment-method','admin/payment-method/create','admin/payment-method/*/edit') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('payment-method.index')}}"><i data-feather='dollar-sign'></i><span class="menu-item" >Thanh toán</span></a>
                    </li>
                   
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{route('show.case')}}"><i data-feather='tool'></i><span class="menu-title text-truncate">Hỗ Trợ</span>
                @php
                $count_case = DB::table('contact')->where('status','0')->get();
                @endphp
                @if(count($count_case) > 0)
                <span class="badge badge-light-warning badge-pill ml-auto mr-1">{{count($count_case)}}</span>
                @else
                @endif
              
            </a>
              
            </li>   
            @php
            $link2 = ['admin/log/admin','admin/type-service','blog/create','loai-blog','loai-blog/*/edit','loai-blog/create',];
            @endphp
            <li class=" nav-item  {{ request()->is($link2) ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href="#"><i data-feather='book-open'></i><span class="menu-title text-truncate">Hoạt động</span></a>
                <ul class="menu-content">
                    <li class="{{ request()->is('admin/log/admin') ? 'active' : '' }}" ><a class="d-flex align-items-center  " href="{{route('admin.log')}}"><i data-feather='user-check'></i><span class="menu-item " >Quản trị viên</span></a>
                    </li>
                   
                </ul>
            </li>
  

           
        </ul>
    </div>
</div>