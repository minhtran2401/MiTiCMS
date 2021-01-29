@extends('FE.layout')
@section('pagetitle', 'Đăng Ki Tên Miền ')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <section class="ftco-section">
                    <div class="container">
                        <div class="row justify-content-center mb-5">
                      <div class="col-md-7 text-center heading-section ftco-animate">
                        <h2 class="mb-4">Đăng Kí Tên Miền</h2>
                        <p>Mua ngay cho mình một tên miền ưu thích.</p>
                      </div>
                    </div>
                          <form action="">
                            <div class="col-md-12 row">
                             
                                  <div class="col-md-6 ">
                                    <label for="domain-name">Tên Miền</label>
                                    <input class="form-control mb-2" type="text" name="" id="">
                                    <label for="domain-name">DNS Cloudflare 1</label>
                                    <div> <small>Nếu bạn chưa biết cách xem DNS , <a href="#">Xem hướng dẫn</a></small></div>
                                    <input class="form-control mb-2" type="text" name="" id="">
                                    <label for="domain-name">DNS Cloudflare 2</label>
                                    <input class="form-control mb-2" type="text" name="" id="">
                                    <button type="submit" class="btn btn-primary ">Đặt mua</button>
                                  </div>
                              
                                  <div class="col-md-6">
                                    <label style="text-center">Bảng giá một số tên miền được mua nhiều</label>
                                    <table class="table">
                                      <thead>
                                        <tr>
                                          <th scope="col">Phổ Biến</th>
                                          <th scope="col">Việt Nam</th>
                                          <th scope="col">Quốc Tế</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>Mark giá 100k</td>
                                          <td>Otto/100k</td>
                                          <td>@mdo/100k</td>
                                        </tr>
                                        <tr>
                                          <td>Mark/100k</td>
                                          <td>Otto/100k</td>
                                          <td>@mdo/100k</td>
                                        </tr>
                                        </tr>
                                        <tr>
                                          <td>Mark/100k</td>
                                          <td>Otto/100k</td>
                                          <td>@mdo/100k</td>
                                        </tr>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                            </div>
                          </form>
                        </div>
                    
                </section>
                
          
            </div>
        </div>
    </div>
</div>

@endsection