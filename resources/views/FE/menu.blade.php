<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Nội Dung</li>
                <li class="active">
                    <a href="index-2.html"><i class="fa fa-dashboard"></i> <span>Trang Chủ</span></a>
                </li>
                
                <li class="menu-title">Tài Khoản</li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-user"></i> <span>Thông Tin Tài Khoản </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('user-profile.profile')}}">Thông tin</a></li>
                        <li><a href="{{route('user-profile.edit-profile')}}">Cập nhật thông tin</a></li>
                        <li><a href="{{route('user-profile.changepassword')}}">Đổi mật khẩu</a></li>
                    </ul>
                </li>

         

                <li class="menu-title">Các Gói Dịch Vụ</li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-user"></i> <span> Tên Miền </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('domainprice.index')}}">Bảng giá</a></li>
                        <li><a href="{{route('checkdomain.view')}}">Kiểm tra tên miền</a></li>
                        <li><a href="{{route('view.domain.reg')}}">Đăng kí tên miền</a></li>
                       
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-user"></i> <span> Máy Chủ Vật Lí </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        @php 
                            $servers = DB::table('service_types')->where('service_group_id','1')->where('display','1')->orderby('service_type_id','desc')->get();
                        @endphp
                        @foreach ($servers as $server)
                              <li><a href="">{{$server->service_type_name}}</a></li>
                        @endforeach
                      
                      
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-user"></i> <span> VPS </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        @php 
                            $vpss = DB::table('service_types')->where('service_group_id','2')->where('display','1')->orderby('service_type_id','desc')->get();
                        @endphp
                        @foreach ($vpss as $vps)
                              <li><a href="{{route('vps.vps-type',$vps->slug)}}">{{$vps->service_type_name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="submenu">
                    <a href="{{route('hosting.index')}}"><i class="fa fa-user"></i> <span>Hosting </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        @php 
                        $hostings = DB::table('service_types')->where('service_group_id','3')->where('display','1')->orderby('service_type_id','desc')->get();
                    @endphp
                    @foreach ($hostings as $hosting)
                          <li><a href="{{route('hosting.hosting-type',$hosting->slug)}}">{{$hosting->service_type_name}}</a></li>
                    @endforeach
                       
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-user"></i> <span> Tài Khoản </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('domain.index')}}">Loop loại ra</a></li>
                     
                       
                    </ul>
                </li>
           

 
                <li class="menu-title">Khác</li>
          
                {{-- <li class="submenu">
                    <a href="javascript:void(0);"><i class="fa fa-share-alt"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Level 1</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><span>Level 1</span></a>
                        </li>
                    </ul>
                </li> --}}
                <li>
                    <a href="doctors.html"><i class="fa fa-user-md"></i> <span>Thanh Toán</span></a>
                </li>

                {{-- <li>
                    <a href="doctors.html"><i class="fa fa-user-md"></i> <span>Hỗ Trợ</span></a>
                </li> --}}
                <li>
                    <a href="{{route('contact')}}"><i class="fa fa-user-md"></i> <span>Liên Hệ</span></a>
                </li>
               
            </ul>
        </div>
    </div>
</div>