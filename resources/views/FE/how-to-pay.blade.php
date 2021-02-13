@extends('FE.layout')
<title>@yield('pagetitle','MiTi-Dịch Vụ Mạng')</title>
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row d-flex">
                            
                            <div class="col-lg-12 col-md-6 ftco-animate fadeInUp ftco-animated">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="text-left">Cách thức thanh toán</h3>
                                    <small>* Sau khi đặt hàng, bạn sẽ nhận được mail xác nhận , hãy thanh toán theo một trong những phương
                                        thức mà bạn đã chọn khi mua. Khi nhận tiền thành công, chúng tôi sẽ gửi thông tin tài khoản cho bạn.
                                        Bạn có thể kiểm tra trong Tài khoản > Lịch sử mua. Thời gian nhận tài khoản từ 15 đến 30p sau khi chúng tôi nhận
                                        được tiền.
                                    </small>
                                <hr>
                                           <section id="card-demo-example">
                                    <div class="row match-height">
                                        @foreach ($ds as $row)
                                             <div class="col-md-6 col-lg-4">
                                            <div class="card">
                                                <img class="card-img-top" src="{{asset('image')}}/{{$row->image}}" alt="Card image cap">
                                                <div class="card-body">
                                                    <h4 class="card-title">{{$row->name_payment}}</h4>
                                                    <p class="card-text">
                                                       {!!$row->info_payment!!}
                                                    </p>
                                                    <a href="javascript:void(0)" class=" btn btn-outline-primary waves-effect">Đồng Ý</a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    
                                        @endforeach
                                       
                                    </div>
                                    {{ $ds->links() }}
                                </section>       
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