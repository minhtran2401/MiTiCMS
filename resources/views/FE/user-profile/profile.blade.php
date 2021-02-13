@extends('FE.layout')
@section('pagetitle', ' Máy Chủ Ảo ')
@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="shin-title-page mb-4">
                    <h3>MiTiVPS - Trang cá nhân</h3>
                </div>
                <div class="row">
                            <div class="col-md-12">
                                <div class="row d-flex">
                                    <div class="col-lg-3 col-md-6 ftco-animate fadeInUp ftco-animated">
                                        <div class="card block-7">
                                            <div class="card-body">
                                                <div class="shin-service-title-info text-center mb-2">Hướng dẫn</div>
                                                <div class="shin-service-info ">
                                                    Mọi thông tin cần hỗ trợ, các bạn có thể liên hệ với Mi bằng nút tin nhắn hoặc form hỗ trợ bên dưới nhé. <hr>
                                                    <b>Thông tin liên hệ:</b> <br>
                                                    <p>Đảm bảo rằng thông tin của bạn hoàn toàn chính xác để tránh những sự cố ngoài ý muốn.</p>
                                                </div>
                                                <a href="#"><div class="shin-service-okmuahang text-center">Hỗ trợ</div></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-6 ftco-animate fadeInUp ftco-animated">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="text-left">Cập nhật thông tin</h3>
                                        <hr>
                                        <form action="{{route('update_info',Auth::user()->id)}}" class="" method="post">
                                            @csrf
                                            <div class="row col-lg-12">
                                                <div class="col-sm-12 col-md-8 col-lg-12">
                                                    <p>
                                                        <b>Tên : </b><input id="namechangeinfo" required placeholder="nhập tên của bạn" style="border:none" type="text" name="name" value=" {{ Auth::user()->name }}" ><br> 
                                                        {{-- <span style="display: block; margin-top: 10px; color: grey;"> [ Bạn sẽ nhận được thông tin dịch vụ, hóa đơn thanh toán dịch vụ bằng Email của mình ]</span> --}}
                                                    </p>
                                                    <hr>
                                                </div>
                                                <div class="col-sm-12 col-md-8 col-lg-12">
                                                    <p>
                                                        <b>Email : </b><input readonly style="border:none" type="text"  value=" {{ Auth::user()->email }}"> <br> 
                                                        <span style="display: block; margin-top: 10px; color: grey;"> (Bạn sẽ nhận được thông tin dịch vụ, đơn hàng và hóa đơn thanh toán dịch vụ bằng Email này</span>
                                                        <span style="display: block; margin-top: 5px; color: grey;" >Để đổi email, vui lòng nhắn tin vào hỗ trợ.)</span>
                                                    </p>
                                                    <hr>
                                                </div>
                                                <div class="col-sm-12 col-md-8 col-lg-12">
                                                    <p>
                                                        <b>Link facebook : </b><input name="facebook" placeholder="điền link facebook" required style="border:none" type="text"  value=" {{ Auth::user()->facebook }}"> <br> 
                                                        <span style="display: block; margin-top: 10px; color: grey;"> (Chúng tôi sẽ dễ dàng liên lạc với bạn hơn qua facebook)</span>
                                                    </p>
                                                    <hr>
                                                </div>
                                                <div class="col-sm-12 col-md-8 col-lg-12">
                                                    <p>
                                                        <b>Số điện thoại:</b> <input id="phonechangeinfo" required placeholder="vui lòng nhập sđt" style="border:none" class="form" type="text" value="{{ Auth::user()->phone }}" name="phone" id=""> <br> 
                                                        <span style="display: block; margin-top: 10px; color: grey;"> (Bạn có thể khôi phục mật khẩu bằng số điện thoại này)</span>
                                                    </p>
                                                    <hr>
                                                </div>
                                                
                                                <div class="col-sm-12 col-md-8 col-lg-12">
                                                    <input type="submit" class="btn btn-success text-center" value="Cập nhật thông tin">
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
@section('script')
        <script>
            $(document).ready(function(){
  $("#namechangeinfo").attr('maxlength',"15");
  $("#phonechangeinfo").attr('maxlength',"10");
});  
        </script>
@endsection