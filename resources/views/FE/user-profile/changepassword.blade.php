@extends('FE.layout')
@section('pagetitle', ' Máy Chủ Ảo ')
@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="shin-title-page mb-4">
                    <h3>Bảo mật</h3>
                </div>
                <div class="row">
                            <div class="col-md-12">
                                <div class="row d-flex">
                                    <div class="col-lg-3 col-md-6 ftco-animate fadeInUp ftco-animated">
                                        <div class="card block-7">
                                            <div class="card-body">
                                                <div class="shin-service-title-info text-center mb-2">Hướng dẫn</div>
                                                <div class="shin-service-info mb-2">
                                                    Mọi thông tin cần hỗ trợ, các bạn có thể liên hệ với Mi bằng nút hỗ trợ bên dưới nhé. <hr>
                                                    <b>Số điện thoại:</b> <br>
                                                    <p>Bạn có thể khôi phục mật khẩu bằng số điện thoại của mình</p>
                                                </div>
                                                <a href="#"><div class="shin-service-okmuahang text-center">Hỗ trợ</div></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-6 ftco-animate fadeInUp ftco-animated">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="text-left">Đổi mật khẩu</h3>
                                        <hr>
                                        <form action="{{route('postCredentials')}}" class="" method="post">
                                            @csrf
                                            <div class="row col-lg-12">
                                                
                                                <div class="col-sm-12 col-md-8 col-lg-12 form-group">
                                                    <label for="user_email">Email người dùng</label>
                                                    <input type="text" readonly class="form-control" value="{{Auth::user()->email}}" name="user_email">
                                                </div>
                                                
                                                <div class="col-sm-12 col-md-8 col-lg-12 form-group">
                                                    <label for="password">Mật khẩu cũ</label>
                                                    <input type="password" class="form-control" placeholder="Mật khẩu cũ" name="current-password">
                                                </div>
                                                
                                                <div class="col-sm-12 col-md-8 col-lg-12 form-group">
                                                    <label for="password">Mật khẩu mới</label>
                                                    <input type="password" class="form-control" placeholder="Mật khẩu mới" name="password">
                                                </div>

                                                <div class="col-sm-12 col-md-8 col-lg-12 form-group">
                                                    <label for="password">Nhập lại mật khẩu mới</label>
                                                    <input type="password" class="form-control" placeholder="Nhập lại mật khẩu mới" name="password_confirmation">
                                                </div>

                                                <div class="col-sm-12 col-md-8 col-lg-12 form-group">
                                                    <input type="submit" class="btn btn-success text-center" value="Thay đổi">
                                                </div>
                                            </div>
                                        </form>                     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection