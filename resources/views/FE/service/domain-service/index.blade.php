@extends('FE.layout')
@section('pagetitle', ' Tên Miền ')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
          <div class="col-sm-12">
                <div class="card mb-4">
                  <div class="card-body">
                  <section class="ftco-section">
                      <div class="container">
                          <div class="row justify-content-center mb-5">
                        <div class="col-md-7 text-center heading-section ftco-animate">
                          <h2 class="mb-4">Bảng giá tên miền</h2>
                          <p>Tất cả tên miền tại TiMiHost đều đồng giá 100.000 đ </p>
                        </div>
                      </div>
                      @php
                      $domain = DB::table('domain_service')->orderby('domain_id','desc')->limit(10)->get();
                      @endphp
                          <div class="row">
                              <div class="col-md-12 ftco-animate">
                                  <div class="table-responsive">
                                      <table class="table">
                                          <thead class="thead-primary">
                                            <tr>
                                              <th>Đuôi</th>
                                              <th>Thời gian</th>
                                              <th>Giá đăng kí</th>
                                            
                                              <th>Thao tác</th>
                                            </tr>
                                          </thead>
                                          <tbody>

                                            @foreach ($domain as $item)
                                                 <tr>
                                              <td class="color">{{$item->name}}</td>
                                              <td>1 năm</td>
                                              <td>{{number_format($item->price_show)}} đ</td>
                                              
                                              <td><a href="{{route('domain.check')}}" class="btn btn-primary">Đăng kí</a></td>
                                            </tr> 
                                            @endforeach
                                          
                                        
                                          </tbody>
                                        </table>
                                    </div>
                              </div>
                          </div>
                      </div>
                  </section>
                  
                  <section class="ftco-section ftco-no-pt ftc-no-pb">
                      <div class="container">
                          <div class="row">
                              <div class="col-lg-6 py-5">
                                  <img src="images/undraw_podcast_q6p7.svg" class="img-fluid" alt="">
                                  <div class="heading-section ftco-animate mt-5">
                              <h2 class="mb-4">Dịch vụ của chúng tôi</h2>
                              <p>
                                TiMiHost cung cấp tất cả các dịch vụ website với giá cực kì ưu đãi, bảo hành 1-1 trong suốt quá trình sử dụng.
                              </p>
                            </div>
                              </div>
                              <div class="col-lg-6 py-5">
                                  <div class="row">
                                      <div class="col-md-6 ftco-animate">
                                          <div class="media block-6 services border text-center">
                                      <div class="icon d-flex align-items-center justify-content-center">
                                          <span class="flaticon-cloud-computing"></span>
                                      </div>
                                    <div class="mt-3 media-body media-body-2">
                                      <h3 class="heading">Hosting</h3>
                                      <p>Hosting không giới hạn</p>
                                    </div>
                                  </div>
                                      </div>
                                      <div class="col-md-6 ftco-animate">
                                          <div class="media block-6 services border text-center">
                                      <div class="icon d-flex align-items-center justify-content-center">
                                          <span class="flaticon-cloud"></span>
                                      </div>
                                    <div class="mt-3 media-body media-body-2">
                                      <h3 class="heading">Tên miền</h3>
                                      <p>Đồng giá 100k/1 năm</p>
                                    </div>
                                  </div>
                                      </div>
                                      <div class="col-md-6 ftco-animate">
                                          <div class="media block-6 services border text-center">
                                      <div class="icon d-flex align-items-center justify-content-center">
                                          <span class="flaticon-server"></span>
                                      </div>
                                    <div class="mt-3 media-body media-body-2">
                                      <h3 class="heading">VPS</h3>
                                      <p>Giá cực rẻ chỉ từ 30k/tháng</p>
                                    </div>
                                  </div>
                                      </div>
                                      <div class="col-md-6 ftco-animate">
                                          <div class="media block-6 services border text-center">
                                      <div class="icon d-flex align-items-center justify-content-center">
                                          <span class="flaticon-database"></span>
                                      </div>
                                    <div class="mt-3 media-body media-body-2">
                                      <h3 class="heading">Máy chủ</h3>
                                      <p>Chỉ từ 1300k 1 tháng</p>
                                    </div>
                                  </div>
                                      </div>
                                  </div>
                        </div>
                          </div>
                      </div>
                  </section>
                </div>
               </div>
              
          </div>
        </div>
    </div>
</div>

@endsection