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
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Tài khoản</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                {{-- <a href="add-doctor.html" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Doctor</a> --}}
            </div>
        </div>
        <div class="row doctor-grid">
            <div class="col-md-4 col-sm-4  col-lg-3">
                <div class="profile-widget">
                    <h5 class="shin-service-title" class="mb-2"><a href="profile.html">Tài khoản mail edu US</a></h5>
                    <p>
                        <span class="shin-service-type">Mail Edu</span>
                    </p>
                    <p style="text-align: left;">- Drive Unlimited <br> - Free gitstudent</p>
                    <div class="shin-service-okmuahang">Mua ngay 300.000 đ</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="see-all">
                    <a class="see-all-btn" href="javascript:void(0);">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection