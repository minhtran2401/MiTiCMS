@extends('FE.layout')
@section('pagetitle', ' Máy Chủ Ảo ')
@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="shin-title-page mb-4">
                    <h3>Cập nhật thông tin</h3>
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
                                                    <b>Email:</b> <br>
                                                    <p>Bạn sẽ nhận được thông tin dịch vụ, đơn hàng và hóa đơn thanh toán dịch vụ bằng Email của mình</p> <hr>
                                                    <b>Số điện thoại:</b> <br>
                                                    <p>Bạn chỉ có thể khôi phục mật khẩu bằng số điện thoại của mình</p>
                                                </div>
                                                <a href="#"><div class="shin-service-okmuahang text-center">Hỗ trợ</div></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-6 ftco-animate fadeInUp ftco-animated">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="text-left">Chỉnh sửa thông tin</h3>
                                        <hr>
                                        <form action="" class="">
                                            <div class="row col-lg-12">
                                                <div class="col-sm-12 col-md-8 col-lg-12 form-group">
                                                    <label for="user_name">Tên người dùng</label>
                                                    <input type="text" class="form-control" value="Kudo Shin" name="user_name">
                                                </div>

                                                <div class="col-sm-12 col-md-8 col-lg-12 form-group">
                                                    <label for="user_email">Email người dùng</label>
                                                    <input type="text" class="form-control" value="admin@shin520.com" name="user_email">
                                                </div>
                                                
                                                <div class="col-sm-12 col-md-8 col-lg-12 form-group">
                                                    <label for="form_subject">Số điện thoại</label>
                                                    <input type="text" value="0834518640" class="form-control" name="form_subject">
                                                </div>
                                                <div class="col-sm-12 col-md-8 col-lg-12 form-group">
                                                    <input type="submit" class="btn btn-success text-center" value="Cập nhật">
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