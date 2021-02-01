@extends('FE.layout')
@section('pagetitle', ' Máy Chủ Ảo ')
@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                            <div class="col-md-12">
                                <div class="row d-flex">
                                    <div class="col-lg-3 col-md-6 ftco-animate fadeInUp ftco-animated">
                                        <div class="card block-7">
                                            <div class="card-body">
                                                <div class="shin-service-title-info text-center mb-2">Hướng dẫn người mới</div>
                                                <div class="shin-service-info mb-2">
                                                    Mọi thông tin cần hỗ trợ về VPS các bạn có thể liên hệ với Mi bằng nút hỗ trợ bên dưới nhé. <hr>
                                                    <b>Thuê dịch vụ:</b> <br>
                                                    <p>Thông tin chi tiết cấu hình của VPS đầy đủ trong "Cấu hình chi tiết", sau khi chọn gói VPS các bạn sẽ được đưa đến trang thanh toán, tại trang thanh toán các bạn có thể chọn thời gian sử dụng dịch vụ (1 tháng, 3 tháng, 6 tháng, 1 năm, 2 năm...)</p>
                                                </div>
                                                <a href="#"><div class="shin-service-okmuahang text-center">Hỗ trợ</div></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-6 ftco-animate fadeInUp ftco-animated">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="text-left">Liên Hệ</h3>
                                        <hr>
                                        <form action="" class="">
                                            <div class="row col-lg-12">
                                                <div class="col-sm-12 col-md-8 col-lg-6 form-group">
                                                    <label for="user_name">Tên người dùng</label>
                                                    <input type="text" readonly class="form-control" value="Kudo Shin" name="user_name">
                                                </div>

                                                <div class="col-sm-12 col-md-8 col-lg-6 form-group">
                                                    <label for="user_email">Email người dùng</label>
                                                    <input type="text" readonly class="form-control" value="admin@shin520.com" name="user_email">
                                                </div>
                                                
                                                <div class="col-sm-12 col-md-8 col-lg-12 form-group">
                                                    <label for="form_subject">Chủ đề</label>
                                                    <input type="text" class="form-control" name="form_subject">
                                                </div>

                                                <div class="col-sm-12 col-md-8 col-lg-12 form-group">
                                                    <label for="form_content">Nội dung</label>
                                                    <textarea class="form-control" name="form_content" rows="3"></textarea>
                                                </div>
                                                <div class="col-sm-12 col-md-8 col-lg-12 form-group">
                                                    <input type="submit" class="btn btn-success text-center" value="Gửi">
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