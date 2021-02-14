@extends('FE.layout')
@section('pagetitle', ' Dịch vụ đã mua ')
@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="shin-title-page mb-4">
                    <h3>MiTiVPS - Dịch vụ đã mua</h3>
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
                                                    <b>Hướng dẫn:</b> <br>
                                                    <p>Những đơn hàng bạn đã thanh toán thì sẽ có thông tin tài khoản , mật khẩu</p>
                                                    <p>Xem <a href="{{route('how_to_pay')}}">hướng dẫn thanh toán </a> nếu như bạn chưa biết cách.</p>
                                                </div>
                                                <a href="#"><div class="shin-service-okmuahang text-center">Hỗ trợ</div></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-6 ftco-animate fadeInUp ftco-animated">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="text-left">Dịch vụ đã mua</h3>
                                        <hr>
                                        <table class="table " id="myTable">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Tên dịch vụ</th>
                                                <th scope="col">Thanh toán</th>
                                                <th scope="col">Số tiền</th>
                                                <th scope="col">Trạng thái</th>
                                                <th scope="col">Thao tác</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($ds as $key => $ls)
                                              <tr>
                                                <th scope="row">{{$key + 1}}</th>
                                                <td>{{$ls->sku}}</td>
                                                <td>
                                                    @php
                                                    $id =$ls->invoice_payment;
                                                    $name = App\Models\PaymentMethod::find($id);
                                                    echo $name->name_payment;
                                                  @endphp
                                                </td>
                                                <td>{{$ls->total_invoice}}</td>
                                                <td>

                                                    @switch($ls->status)
                                                    @case(1)
                                                    <span class="custom-badge status-orange"><i data-feather='loader'></i>                                                    @break
                                                        @break
                                                    @case(2)
                                                    <span class="custom-badge status-blue"><i data-feather='check'></i>
                                                        @break
                                                    @case(3)
                                                    <span class="custom-badge status-green"><i data-feather='dollar-sign'></i>
                                                        @break
                                                    @case(4)
                                                    <span class="custom-badge status-red"><i data-feather='alert-triangle'></i>
                                                        @break
                                                    @case(5)
                                                    <span class="custom-badge status-grey"><i data-feather='alert-circle'></i>
                                                        @break
    
                                                    @default
                                                        <span>Trạng thái mới, chưa cập nhật</span>
                                                @endswitch
                                                        @php
                                                        $id =$ls->status;
                                                        $name = App\Models\StatusInvoice::find($id);
                                                        echo $name->name_status_invoice;
                                                      @endphp
                                                    </span>
                                                  </td>
                                                 
                                                <td>
                                                    @if($ls->status==3)
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter-{{$ls->id_invoice}}">
                                                        Xem tài khoản
                                                      </button>
                                                      @else
                                                      <button type="button" class="btn btn-secondary" disabled>
                                                        Chưa thanh toán
                                                      </button>
                                                      @endif
                                                </td>
                                              </tr>
                                                                 <!-- Modal -->
                                                <div class="modal fade" id="exampleModalCenter-{{$ls->id_invoice}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Thông tin tài khoản</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        @php
                                                            $info = DB::table('detail_account')->where('id_invoice',$ls->id_invoice)
                                                            ->orderby('id','desc')
                                                            ->first();
                                                           
                                                        @endphp
                                                        <div class="modal-body">
                                                            @if($info)
                                                            {{$info->detail_account}}
                                                            
                                                        </div>
                                                        @php
                                                        $start = $info->day_start;
                                                        $end = $info->day_end;
                                                        $diff = Carbon\Carbon::parse($start)->diffInDays($end);
                                                        \Carbon\Carbon::setLocale('vi');
                                                        @endphp
                                                        @if($diff > 1000)
                                                         <div class="modal-body text-primary">Thời hạn : vĩnh viễn
                                                        @else
                                                        <div class="modal-body text-primary">Thời hạn : còn {{$diff}} ngày
                                                        @endif
                                                        </div>
                                                         @else
                                                           chưa có thông tin tài khoản, nhắn tin admin để được hỗ trợ
                                                         @endif
                                                        <div class="modal-footer">
                                                       
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                                       
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                @empty
                                              <tr>
                                                <td colspan="4"> Bạn chưa mua dịch vụ nào.</td>
                                            </tr>
                                            @endforelse
                                             
                                            </tbody>
                                          </table>                   
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