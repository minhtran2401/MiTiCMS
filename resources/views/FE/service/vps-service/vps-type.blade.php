@extends('FE.layout')
@section('pagetitle', " $vps_type->service_type_name ")
@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card" style="overflow: hidden">
                    <div class="shin-title-page">
                        <h3>MiTiVPS - VPS - {{$vps_type->service_type_name}}</h3>
                    </div>
                    <div class="card-body">
                        <section class="ftco-section">
                                <div class="container">
                                    <div class="row justify-content-center mb-5">
                                        <div class="col-12 text-center heading-section ftco-animate">
                                            {{-- <h4>Dịch vụ cho thuê máy chủ ảo - hỗ trợ trực tiếp hướng dẫn sử dụng!</h4> --}}
                                            <div class="row justify-content-center mb-3">
                                                <div class="">
                                                    @php 
                            $vpss = DB::table('service_types')->where('service_group_id','2')->where('display','1')->orderby('service_type_id','desc')->get();
                        @endphp
                        @foreach ($vpss as $vps)
                         <div class="shin-service-menu-type"><a style="color: white" href="{{route('vps.vps-type',$vps->slug)}}">{{$vps->service_type_name}}</a></div>
                             
                        @endforeach
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 ftco-animate">
                                            <section class="ftco-section">
                                                <div class="container">
                                                    <div class="row d-flex">

                                                        @foreach ($vps_detail as $detail)

                                                        <div class="col-lg-3 col-md-6 ftco-animate fadeInUp ftco-animated">
                                                            <div style="box-shadow: 0 0 3px grey;" class="card block-7">
                                                                <div class="card-body">
                                                                    <div class="text-center">
                                                                        
                                                                        <h2 class="heading">{{$detail->vps_name}}</h2>
                                                                        <div class="shin-service-type mb-2">{{$vps_type->service_type_name}}</div>
                                                                        <div class="shin-service-title-info mb-2">Thông tin cấu hình</div>
                                                                        <div class="shin-service-info mb-2">
                                                                           {!!$detail->vps_profile!!}
                                                                        </div>
                                                                        <a data-toggle="modal" data-target="#price-{{$detail->sku}}" href="#"><div class="shin-service-okmuahang">Xem giá cả</div></a>
                                                                        <!-- Button trigger modal -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <!-- Modal -->
  <div class="modal fade" id="price-{{$detail->sku}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Giá gói</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Thời gian</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Chọn</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $vps_price = DB::table('service_price')->where('sku',$detail->sku)->get();
                   @endphp
                    @foreach ($vps_price as $key => $price)
                  <tr>
                     
                    <th scope="row">{{$key +1}}</th>
                    <td>{{$price->service_time}}</td>
                    <td>{{number_format($price->service_price)}} đ</td>
                    <td><button class="btn btn-primary">Mua</button></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
     
        </div>
      </div>
    </div>
  </div>
                                                        @endforeach
                                                  </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                        </section>
                </div>
           </div>
        </div>
    </div>
</div>
 
@endsection