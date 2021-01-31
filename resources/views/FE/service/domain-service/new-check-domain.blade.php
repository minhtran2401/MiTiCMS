@extends('FE.layout')
@section('pagetitle', ' Lưu Trữ ')
@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card" style="overflow: hidden">
                    <div class="shin-title-page">
                        <h3>MiTiVPS - Domain - Kiểm tra tên miền</h3>
                    </div>
                    <div class="card-body">
                        <section class="ftco-section">
                            <div class="container">
                                <div class="row d-flex align-items-center pt-5">
                                    <div class="col-lg-6 heading-white mb-4 mb-sm-4 mb-lg-0 ftco-animate">
                                        <h2 >TÌM KIẾM TÊN MIỀN</h2>
                                        <p>Chọn một tên miền thật đẹp theo ý của bạn</p>
                                    </div>
                                    <div class="col-lg-6 py-lg-6 ftco-wrap ftco-wrap-2 ftco-animate">
                                        <form id="check-domain-form" method="POST" action="{{route('domain.check')}}" class="domain-form d-flex mb-3">
                                            @csrf
                                  <div class="form-group domain-name">
                                    <input name="name-domain" type="text" class="form-control name px-4" required placeholder="Tìm tên miền...">
                                  </div>
                                  <div class="form-group domain-select d-flex">
                                    <input type="submit" class="search-domain btn btn-primary text-center" value="Tìm">
                                    </div>
                                </form>
                            
                                <p class="domain-price mt-2">
                                    <span><small>.com</small> $9.75</span> 
                                    <span><small>.net</small> $9.50</span> 
                                    <span><small>.biz</small> $8.95</span> 
                                    <span><small>.co</small> $7.80</span>
                                    <span><small>.me</small> $7.95</span>
                                </p>
                                <div id="mutext" class="mutex mb-2"><p id="alert-domain"></p></div>
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