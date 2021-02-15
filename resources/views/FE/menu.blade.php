<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Nội Dung</li>
                <li class="{{ request()->is('/') ? 'active' : '' }}">
                    <a href="{{route('index')}}"><i class="fa fa-dashboard"></i> <span>Trang Chủ</span></a>
                </li>
                
                <li class="menu-title">Tài Khoản</li>

                <li class="submenu  {{ request()->is('trang-ca-nhan', 'trang-ca-nhan/doi-mat-khau') ? 'active' : '' }}">
                    <a  class="{{ request()->is('trang-ca-nhan') ? 'active' : '' }}" href="#"><i class="fa fa-user"></i> <span>Tài Khoản </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ request()->is('trang-ca-nhan/lich-su-mua') ? 'active' : '' }}" href="{{route('history-buy')}}">Lịch sử mua</a> </li>
                        <li ><a class="{{ request()->is('trang-ca-nhan') ? 'active' : '' }}"  href="{{route('user-profile.profile')}}">Thông tin</a></li>
                        {{-- <li><a href="{{route('user-profile.edit-profile')}}">Cập nhật thông tin</a></li> --}}
                        <li ><a class="{{ request()->is('trang-ca-nhan/doi-mat-khau') ? 'active' : '' }}" href="{{route('user-profile.changepassword')}}">Đổi mật khẩu</a></li>
                    </ul>
                </li>

         

                <li class="menu-title ">Các Gói Dịch Vụ</li>
                <li class="submenu {{ request()->is('ten-mien/*','ten-mien') ? 'active' : '' }}">
                    <a class="{{ request()->is('ten-mien/*','ten-mien') ? 'active' : '' }}" href="#"><i class="fa fa-globe"></i> <span> Tên Miền </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('domainprice.index')}}"> <i class="fa fa-dot-circle-o" style="font-size: 80%;" aria-hidden="true"></i> Bảng giá</a></li>
                        <li><a href="{{route('checkdomain.view')}}"><i class="fa fa-dot-circle-o" style="font-size: 80%;" aria-hidden="true"></i> Kiểm tra tên miền</a></li>
                       
                       
                    </ul>
                </li>
                <li class="submenu {{ request()->is('server/*') ? 'active' : '' }}">
                    <a class="{{ request()->is('server/*') ? 'active' : '' }}" href="#"><i class="fa fa-database"></i> <span> Máy Chủ Vật Lí </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        @php 
                            $servers = DB::table('service_types')->where('service_group_id','1')->where('display','1')->orderby('service_type_id','desc')->get();
                        @endphp
                        @foreach ($servers as $server)
                              <li><a href="{{route('server.server-type',$server->slug)}}"><i class="fa fa-dot-circle-o" style="font-size: 80%;" aria-hidden="true"></i> {{$server->service_type_name}}</a></li>
                        @endforeach
                      
                      
                    </ul>
                </li>
                <li class="submenu {{ request()->is('vps/*') ? 'active' : '' }}">
                    <a class="{{ request()->is('vps/*') ? 'active' : '' }}" href="#"><i class="fa fa-server"></i> <span> VPS </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        @php 
                            $vpss = DB::table('service_types')->where('service_group_id','2')->where('display','1')->orderby('service_type_id','desc')->get();
                        @endphp
                        @foreach ($vpss as $vps)
                              <li><a href="{{route('vps.vps-type',$vps->slug)}}"><i class="fa fa-dot-circle-o" style="font-size: 80%;" aria-hidden="true"></i> {{$vps->service_type_name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="submenu {{ request()->is('hosting/*') ? 'active' : '' }}">
                    <a class="{{ request()->is('hosting/*') ? 'active' : '' }}" href="{{route('hosting.index')}}"><i class="fa fa-suitcase"></i> <span>Hosting </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        @php 
                        $hostings = DB::table('service_types')->where('service_group_id','3')->where('display','1')->orderby('service_type_id','desc')->get();
                    @endphp
                    @foreach ($hostings as $hosting)
                          <li><a href="{{route('hosting.hosting-type',$hosting->slug)}}"><i class="fa fa-dot-circle-o" style="font-size: 80%;" aria-hidden="true"></i> {{$hosting->service_type_name}}</a></li>
                    @endforeach
                       
                    </ul>
                </li>
                <li class="submenu {{ request()->is('tai-khoan/*') ? 'active' : '' }}">
                    <a class="{{ request()->is('tai-khoan/*') ? 'active' : '' }}" href="{{route('hosting.index')}}"><i class="fa fa-file"></i> <span>Tài khoản các loại </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        @php 
                        $accounts = DB::table('service_types')->where('service_group_id','4')->where('display','1')->orderby('service_type_id','desc')->get();
                    @endphp
                    @foreach ($accounts as $account)
                          <li><a href="{{route('account.account-type',$account->slug)}}"><i class="fa fa-dot-circle-o" style="font-size: 80%;" aria-hidden="true"></i> {{$account->service_type_name}}</a></li>
                    @endforeach
                       
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
                <li class="{{ request()->is('huong-dan-thanh-toan') ? 'active' : '' }}">
                    <a href="{{route('how_to_pay')}}"><i class="fa fa-dollar"></i> <span>Thanh Toán</span></a>
                </li>

                {{-- <li>
                    <a href="doctors.html"><i class="fa fa-user-md"></i> <span>Hỗ Trợ</span></a>
                </li> --}}
                <li class=" {{ request()->is('ho-tro') ? 'active' : '' }}">
                    <a href="{{route('contact')}}"><i class="fa fa-user-md"></i> <span>Hỗ trợ</span></a>
                </li>
               
            </ul>
        </div>
    </div>
</div>