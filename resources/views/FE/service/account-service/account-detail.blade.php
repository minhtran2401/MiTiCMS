{{-- form chi tiết + dang kí mua acc
bao gồm tên, mail, loại acc ( type = hiden)
loại acc ( read only )
số lượng , thời gian combo ( nếu có )
note
nút submit --}}

{{-- trang chủ account, vừa vào là show các div account luôn, rồi click vào thì sẽ ra trang chi tiết account, 
bao gồm info tài khoản, gói combo thời gian mua nếu có ( ví dụ acc phim nexflix combo 3 tháng )
số lượng account muốn mua
Trang chi tiết sẽ chia ra 2 div. ( 2 col 6)
col bên phải sẽ là info acc
col ben tráis sẽ là form đăng kí acc --}}



@extends('FE.layout')
@section('pagetitle', ' Máy Chủ Ảo ')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-3">
                <div class="profile-widget">
                    <h3 class="text-left">Thông tin chi tiết</h3>
                    <hr>
                    <h5 class="shin-service-title" class="mb-2"><a href="profile.html">Tài khoản email EDU US</a></h5>
                    <p class="text-left">
                        - Drive Unlimited <br>
                        - Free Git Student
                    </p>
                    Mua thôi bạn! Chờ éo gì nữa?
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-left">Mua ngay</h3>
                        <hr>
                        <form action="" class="">
                            <div class="row col-lg-12">
                                <input type="text" class="form-control" name="user_name" hidden>
                                <input type="text" class="form-control" name="user_email" hidden>

                                <div class="col-sm-12 col-md-8 col-lg-6 form-group">
                                    <label for="account_type">Tên tài khoản</label>
                                    <input type="text" readonly class="form-control" value="Email EDU US" name="account_type">
                                </div>
                                <div class="col-sm-12 col-md-8 col-lg-6 form-group">
                                    <label for="account_type">Loại tài khoản</label>
                                    <input type="text" readonly class="form-control" value="Mail EDU" name="account_type">
                                </div>
                                <div class="col-sm-12 col-md-8 col-lg-6 form-group">
                                    <label for="account_type">Số lượng</label>
                                    <input type="number" class="form-control" name="user_name">
                                </div>
                            </div>
                        </form>                     
                    <div class="shin-service-okmuahang text-center" >Mua ngay 300.000 đ</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection