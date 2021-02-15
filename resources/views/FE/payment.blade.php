@extends('FE.layout')
@section('pagetitle', 'Thanh Toán ')
@section('content')
@if(Session::has("Cart") != null  )
<div class="page-wrapper">
    <div class="content">
        <div class="payment-type">
            <div class="card p-3">
            
        @if(isset($key_vps))
   
        <div class="container">
            <div class="row justify-content-center mb-2">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2 class="mb-4">Đăng Kí VPS</h2>
            <p>Mua ngay một VPS để phục vụ công việc nào.</p>
          </div>
        </div>
                   
        <div class="container mt-3 mb-3">
            <div class="d-flex justify-content-between align-items-center ">
                <div class="d-flex flex-row align-items-center">
                    <h4 class=" mt-1">Yêu cầu thêm</h4> <span class="ml-2"></span>
                </div> <a href="{{route('index')}}" class="cancel com-color"><i class="fa fa-backward"></i>

                    Hủy và chọn mua dịch vụ khác</a>
            </div>
            <div class="row">
                <div class="col-md-6">
                   <form class="" action="{{route('check_out')}}" method="post">
                    @csrf
                    <div class="about">
                        <div class="d-flex justify-content-between">
                        </div>
                        <p>Chọn thêm hệ điều hành và khu vực , Mặc định là khu vực singapo - Window Server 2016.</p>
                        <textarea class="form-control mb-1" placeholder="Chọn khu vực và hệ điều hành, có thể ghi thêm yêu cầu nếu cần." name="invoice_note" id="" cols="30" rows="3" required></textarea>
                        <p>Hiện tại đang có khu vực và hệ điều hành sau : </p>
                       
                        @php
                            $locations =DB::table('location_vps')->get();
                            $oss = DB::table('os_vps')->get();
                        @endphp
                        <div class="p-2 d-flex justify-content-between bg-pay align-items-center"> <span>Hệ điều hành : 
                        @foreach ($locations as $location)
                            {{$location->name_location}}, 
                        @endforeach    
                        </span>  </div>
                        <div class="p-2 d-flex justify-content-between bg-pay align-items-center"> <span>Khu vực : 
                        @foreach ($oss as $os)
                            {{$os->name_os}}, 
                        @endforeach     
                        </span>  </div>
                        <div class="d-flex justify-content-between align-items-center">
                       
                          <div class="d-flex flex-row mt-2">
                              <h6>Phương thức thanh toán</h6>
                              {{-- <h6 class="text-success font-weight-bold ml-1"> $13.24</h6> --}}
                          </div>
                          
                      </div>
                     
                      <div class="d-flex flex-row">
                          <select class="form-control" name="invoice_payment" id="">
                            @php
                              $payment_method = DB::table('payment_method')->where('display','1')->get(); 
                            @endphp
                            @foreach ($payment_method as $pm)
                            <option value="{{$pm->id}}">{{$pm->name_payment}} </option>
                            @endforeach
                             

                          </select>
                      </div>
                        <hr>

                        <div class="buttons checkoutform"> <button class="btn btn-success btn-block">Xác nhận thanh toán</button> </div>
                    </div>
                </div>
                <div class="col-md-2"> </div>
                <div class="col-md-4">
                    <div class="bg-pay p-3"> <span class="font-weight-bold">Chi tiết hóa đơn</span>
                     
                        <div class="d-flex justify-content-between mt-2"> <span class="fw-500">{{Session('Cart')->products['product']->name}}</span> <span></span> </div>
                        <div class="d-flex justify-content-between mt-2"> <span class="fw-500">Thời hạn</span> <span>{{Session('Cart')->products['time']}}</span> </div>
                        <div class="d-flex justify-content-between mt-2"> <span class="fw-500">Số tiền</span> <span>{{Session('Cart')->products['price']}}</span> </div>
                        <hr>
                        <div class="d-flex justify-content-between mt-2"> <span class="fw-500">Tổng tiền </span> <span class="text-success">{{Session('Cart')->products['price']}}</span> </div>
                       
                        
                        <input hidden type="text" name="service_group_id" value="{{Session('Cart')->products['product']->service_group_id}}" id="">
                        <input hidden type="text" name="service_type_id" value="{{Session('Cart')->products['product']->service_type_id}}" id="">
                        <input hidden type="text" name="sku" value="{{Session('Cart')->products['product']->name}}" id="">
                        <input hidden type="text" name="total_invoice" value="{{Session('Cart')->products['price']}}" id="">
                        <input hidden type="text" name="pack_price" value="{{Session('Cart')->products['time']}} / {{Session('Cart')->products['price']}}" id="">



                      </form>
                    </div>
                </div>
            </div>
        </div>
                          
                
                        </div>
                    </div>
                </div>
              
          
      
                @elseif(isset($key_server))
   
                <div class="container">
                    <div class="row justify-content-center mb-2">
                  <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-4">Đăng Kí Mua Máy Chủ Vật Lí</h2>
                    <p>Mua ngay một Máy chủ vật lí để phục vụ công việc nào.</p>
                  </div>
                </div>
                           
                <div class="container mt-3 mb-3">
                    <div class="d-flex justify-content-between align-items-center ">
                        <div class="d-flex flex-row align-items-center">
                            <h4 class=" mt-1">Yêu cầu thêm</h4> <span class="ml-2"></span>
                        </div> <a href="{{route('index')}}" class="cancel com-color"><i class="fa fa-backward"></i>
        
                            Hủy và chọn mua dịch vụ khác</a>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                           <form action="{{route('check_out')}}" method="post">
                            @csrf
                            <div class="about">
                                <div class="d-flex justify-content-between">
                                </div>
                                <p>Ghi chú khi cài đặt máy chủ vật lí</p>
                                <textarea class="form-control mb-1" placeholder="Ghi thêm yêu cầu nếu cần." name="invoice_note" id="" cols="30" rows="3" required></textarea>
                              
                               
                   
                                <div class="d-flex justify-content-between align-items-center">
                               
                                  <div class="d-flex flex-row mt-2">
                                      <h6>Phương thức thanh toán</h6>
                                      {{-- <h6 class="text-success font-weight-bold ml-1"> $13.24</h6> --}}
                                  </div>
                                  
                              </div>
                             
                              <div class="d-flex flex-row">
                                  <select class="form-control" name="invoice_payment" id="">
                                    @php
                                      $payment_method = DB::table('payment_method')->where('display','1')->get(); 
                                    @endphp
                                    @foreach ($payment_method as $pm)
                                    <option value="{{$pm->id}}">{{$pm->name_payment}} </option>
                                    @endforeach
                                     
      
                                  </select>
                              </div>
                                <hr>
        
                                <div class="buttons checkoutform"> <button class="btn btn-success btn-block">Xác nhận thanh toán</button> </div>
                            </div>
                        </div>
                        <div class="col-md-2"> </div>
                        <div class="col-md-4">
                            <div class="bg-pay p-3"> <span class="font-weight-bold">Chi tiết hóa đơn</span>
                             
                                <div class="d-flex justify-content-between mt-2"> <span class="fw-500">{{Session('Cart')->products['product']->name}}</span> <span></span> </div>
                                <div class="d-flex justify-content-between mt-2"> <span class="fw-500">Thời hạn</span> <span>{{Session('Cart')->products['time']}}</span> </div>
                                <div class="d-flex justify-content-between mt-2"> <span class="fw-500">Số tiền</span> <span>{{Session('Cart')->products['price']}}</span> </div>
                                <hr>
                                <div class="d-flex justify-content-between mt-2"> <span class="fw-500">Tổng tiền </span> <span class="text-success">{{Session('Cart')->products['price']}}</span> </div>
                              
                                
                                <input hidden type="text" name="service_group_id" value="{{Session('Cart')->products['product']->service_group_id}}" id="">
                                <input hidden type="text" name="service_type_id" value="{{Session('Cart')->products['product']->service_type_id}}" id="">
                                <input hidden type="text" name="sku" value="{{Session('Cart')->products['product']->name}}" id="">
                                <input hidden type="text" name="total_invoice" value="{{Session('Cart')->products['price']}}" id="">
                                <input hidden type="text" name="pack_price" value="{{Session('Cart')->products['time']}} / {{Session('Cart')->products['price']}}" id="">
        
        
        
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
                                  
                        
                                </div>
                            </div>
                        </div>
                      
                  
<!--!-------------------------------------------------------------------------------------->

<!--!-------------------------------------------------------------------------------------->


@elseif(isset($key_hosting))
   
<div class="container">
    <div class="row justify-content-center mb-2">
  <div class="col-md-7 text-center heading-section ftco-animate">
    <h2 class="mb-4">Đăng Kí Hosting</h2>
    <p>Mua ngay một Hosting để phục vụ công việc nào.</p>
  </div>
</div>
           
<div class="container mt-3 mb-3">
    <div class="d-flex justify-content-between align-items-center ">
        <div class="d-flex flex-row align-items-center">
            <h4 class=" mt-1">Yêu cầu thêm</h4> <span class="ml-2"></span>
        </div> <a href="{{route('index')}}" class="cancel com-color"><i class="fa fa-backward"></i>

            Hủy và chọn mua dịch vụ khác</a>
    </div>
    <div class="row">
        <div class="col-md-6">
           <form action="{{route('check_out')}}" method="post">
            @csrf
            <div class="about">
                <div class="d-flex justify-content-between">
                </div>
                <p>Chọn khu vực hosting, mặc định là singapore </p>
                <textarea class="form-control mb-1" placeholder="Chọn khu vực , nhập domain của bạn, nếu bạn k nhập domain, chúng tôi sẽ lấy một domain ngẫu nhiên.." name="invoice_note" id="" cols="30" rows="3" required></textarea>
                <p>Hiện tại đang có khu vực sau : </p>
               
                @php
                   
                    $oss = DB::table('os_vps')->get();
                @endphp
              
                <div class="p-2 d-flex justify-content-between bg-pay align-items-center"> <span>Khu vực : 
                @foreach ($oss as $os)
                    {{$os->name_os}}, 
                @endforeach     
                </span>  </div>
                <div class="d-flex justify-content-between align-items-center">
               
                  <div class="d-flex flex-row mt-2">
                      <h6>Phương thức thanh toán</h6>
                      {{-- <h6 class="text-success font-weight-bold ml-1"> $13.24</h6> --}}
                  </div>
                  
              </div>
             
              <div class="d-flex flex-row">
                  <select class="form-control" name="invoice_payment" id="">
                    @php
                      $payment_method = DB::table('payment_method')->where('display','1')->get(); 
                    @endphp
                    @foreach ($payment_method as $pm)
                    <option value="{{$pm->id}}">{{$pm->name_payment}} </option>
                    @endforeach
                     

                  </select>
              </div>
                <hr>

                <div class="buttons checkoutform"> <button class="btn btn-success btn-block">Xác nhận thanh toán</button> </div>
            </div>
        </div>
        <div class="col-md-2"> </div>
        <div class="col-md-4">
            <div class="bg-pay p-3"> <span class="font-weight-bold">Chi tiết hóa đơn</span>
             
                <div class="d-flex justify-content-between mt-2"> <span class="fw-500">{{Session('Cart')->products['product']->name}}</span> <span></span> </div>
                <div class="d-flex justify-content-between mt-2"> <span class="fw-500">Thời hạn</span> <span>{{Session('Cart')->products['time']}}</span> </div>
                <div class="d-flex justify-content-between mt-2"> <span class="fw-500">Số tiền</span> <span>{{Session('Cart')->products['price']}}</span> </div>
                <hr>
                <div class="d-flex justify-content-between mt-2"> <span class="fw-500">Tổng tiền </span> <span class="text-success">{{Session('Cart')->products['price']}}</span> </div>
              
                
                <input hidden type="text" name="service_group_id" value="{{Session('Cart')->products['product']->service_group_id}}" id="">
                <input hidden type="text" name="service_type_id" value="{{Session('Cart')->products['product']->service_type_id}}" id="">
                <input hidden type="text" name="sku" value="{{Session('Cart')->products['product']->name}}" id="">
                <input hidden type="text" name="total_invoice" value="{{Session('Cart')->products['price']}}" id="">
                <input hidden type="text" name="pack_price" value="{{Session('Cart')->products['time']}} / {{Session('Cart')->products['price']}}" id="">



              </form>
            </div>
        </div>
    </div>
</div>
                  
        
                </div>
            </div>
        </div>
      
  

<!--!-------------------------------------------------------------------------------------->

<!--!-------------------------------------------------------------------------------------->

        @elseif(isset($key_domain))
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
                          <form action="{{route('check_out_domain')}}" method="post">
                            @csrf
                            <div class="col-md-12 row">
                             
                                  <div class="col-md-6 ">
                                    <label for="domain-name">Tên Miền</label>
                                    <input class="form-control mb-2" type="text" name="sku" id="" value="{{Session('Cart')->products['product']}}">
                                    <label for="domain-name">DNS Cloudflare 1 & 2</label>
                                    <div> <small>Nếu bạn chưa biết cách xem DNS , <a href="#">Xem hướng dẫn</a></small></div>
                                    <input class="form-control mb-2" placeholder="ngăn cách nhau bởi dấu phẩy" type="text" name="invoice_note" id="" required>
                                    {{-- <label for="domain-name">DNS Cloudflare 2</label>
                                    <input class="form-control mb-2" type="text" name="invoice_note[]" id="" required> --}}
                                    <input hidden type="text" name="service_group_id" value="5" id="">
                                    <input hidden type="text" name="service_type_id" value="0" id="">
                                    <input hidden type="text" name="total_invoice" value="100,000 đ" id="">
                                    <input hidden type="text" name="pack_price" value="1 năm" id="">
                                    <div class="d-flex">
                                      <h6>Phương thức thanh toán</h6>
                                      {{-- <h6 class="text-success font-weight-bold ml-1"> $13.24</h6> --}}
                                  </div>
                                  
                            
                             
                              <div class="d-flex flex-row mb-2">
                                  <select class="form-control" name="invoice_payment" id="">
                                    @php
                                      $payment_method = DB::table('payment_method')->where('display','1')->get(); 
                                    @endphp
                                    @foreach ($payment_method as $pm)
                                    <option value="{{$pm->id}}">{{$pm->name_payment}} </option>
                                    @endforeach
                                     
              
                                  </select>
                              </div>
                              
                                    <button type="submit checkoutform" class="btn btn-primary mb-2">Đặt mua</button>
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
                                          <td>.com giá 100k</td>
                                          <td>.vn giá 100k</td>
                                          <td>.net giá 100k</td>
                                        </tr>
                                        <tr>
                                          <td>vn giá 100k</td>
                                          <td>.name.vn giá 100k</td>
                                          <td>.us giá 100k</td>
                                        </tr>
                                        </tr>
                                        <tr>
                                          <td>.net giá 100k</td>
                                          <td>.com.vn giá 100k</td>
                                          <td>.info giá 100k</td>
                                        </tr>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
                </section>
                
              
            </div>
        </div>   
        
        @elseif(isset($key_account))
   
<div class="container">
    <div class="row justify-content-center mb-2">
  <div class="col-md-7 text-center heading-section ftco-animate">
    <h2 class="mb-4">Mua tài khoản</h2>
    <p>Rất nhiều loại tài khoản cho anh em lựa chọn</p>
  </div>
</div>
           
<div class="container mt-3 mb-3">
    <div class="d-flex justify-content-between align-items-center ">
        <div class="d-flex flex-row align-items-center">
            <h4 class=" mt-1">Yêu cầu thêm</h4> <span class="ml-2"></span>
        </div> <a href="{{route('index')}}" class="cancel com-color"><i class="fa fa-backward"></i>

            Hủy và chọn mua dịch vụ khác</a>
    </div>
    <div class="row">
        <div class="col-md-6">
           <form  action="{{route('check_out')}}" method="post">
            @csrf
            <div class="about">
                <div class="d-flex justify-content-between">
                </div>
                <p>Nếu khách hàng có nhu cầu mua số lượng lớn, hãy điền thông tin vào đây, chúng tôi sẽ liên lạc lại ngay. </p>
                <textarea class="form-control mb-1" placeholder="Họ tên , Sdt, số lượng cần mua" name="invoice_note" id="" cols="30" rows="3" required></textarea>
               
                <div class="d-flex justify-content-between align-items-center">
               
                  <div class="d-flex flex-row mt-2">
                      <h6>Phương thức thanh toán</h6>
                      {{-- <h6 class="text-success font-weight-bold ml-1"> $13.24</h6> --}}
                  </div>
                  
              </div>
             
              <div class="d-flex flex-row">
                  <select class="form-control" name="invoice_payment" id="">
                    @php
                      $payment_method = DB::table('payment_method')->where('display','1')->get(); 
                    @endphp
                    @foreach ($payment_method as $pm)
                    <option value="{{$pm->id}}">{{$pm->name_payment}} </option>
                    @endforeach
                     

                  </select>
              </div>
                <hr>

                <div class="buttons checkoutform"> <button class="btn btn-success btn-block">Xác nhận thanh toán</button> </div>
            </div>
        </div>
        <div class="col-md-2"> </div>
        <div class="col-md-4">
            <div class="bg-pay p-3"> <span class="font-weight-bold">Chi tiết hóa đơn</span>
             
                <div class="d-flex justify-content-between mt-2"> <span class="fw-500">{{Session('Cart')->products['product']->name}}</span> <span></span> </div>
                <div class="d-flex justify-content-between mt-2"> <span class="fw-500">Thời hạn</span> <span>{{Session('Cart')->products['time']}}</span> </div>
                <div class="d-flex justify-content-between mt-2"> <span class="fw-500">Số tiền</span> <span>{{Session('Cart')->products['price']}}</span> </div>
                <hr>
                <div class="d-flex justify-content-between mt-2"> <span class="fw-500">Tổng tiền </span> <span class="text-success">{{Session('Cart')->products['price']}}</span> </div>
            
                
                <input hidden type="text" name="service_group_id" value="{{Session('Cart')->products['product']->service_group_id}}" id="">
                <input hidden type="text" name="service_type_id" value="{{Session('Cart')->products['product']->service_type_id}}" id="">
                <input hidden type="text" name="sku" value="{{Session('Cart')->products['product']->name}}" id="">
                <input hidden type="text" name="total_invoice" value="{{Session('Cart')->products['price']}}" id="">
                <input hidden type="text" name="pack_price" value="{{Session('Cart')->products['time']}} / {{Session('Cart')->products['price']}}" id="">



              </form>
            </div>
        </div>
    </div>
</div>
                  
        
                </div>
            </div>
        </div>
      
  

<!--!-------------------------------------------------------------------------------------->

<!--!-------------------------------------------------------------------------------------->

        @endif

       


    </div>
</div>
@else
<div class="page-wrapper">
  <div class="content">
      <div class="payment-type">
          <div class="card p-3">
          
    
 
      <div class="container">
          <div class="row justify-content-center mb-2">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <h2 class="mb-4">Trang thanh toán</h2>
          <p>Bạn chưa chọn mua dịch vụ nào</p>
        </div>
      </div>
      </div>
          </div></div></div></div>
  @endif
@endsection
@section('script')
    <script>
      $(".checkoutform").click(function() {

let timerInterval
Swal.fire({
  title: 'Đang xử lí',
  html: 'Vui lòng đợi một lát',
  timer: 9000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    // console.log('I was closed by the timer')
  }
})
});

    </script>
@endsection