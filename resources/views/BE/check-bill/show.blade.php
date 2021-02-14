@extends('BE.layout.layout')
@section('pagetitle','Đơn hàng')
@section('content')
@section('csspage')
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
@endsection
@section('br-namepage1','Đơn hàng')
@section('br-namepage2','Đơn hàng')
@section('br-namepage3','Danh sách đơn hàng')


        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            <strong>Ghi chú:</strong> Kiểm tra đơn hàng website
                        </div>
                    </div>
                </div>
            </div>

        </div>

          <!-- Basic table -->
          <section id="basic-data" >
            
            <div class="row ">
                <div class="col-12">
                    <div class="card p-2">
                        <div class="card-header border-bottom p-1"><div class="head-label"><h6 class="mb-0">MitiVPS</h6></div>
                        <div class="dt-action-buttons text-right"><div class="dt-buttons d-inline-flex">
                            {{-- <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modals-slide-in">
                               + Thêm dịch vụ
                            </button> --}}
                     </div></div></div>
                        <table class="datatables-basic table" id="table-1">
                            <thead>
                                <tr>
                                    <th> #</th>
                                    <th>Khách hàng</th>
                                    <th>Dịch vụ</th>
                                    <th>Gói giá</th>
                                    <th>Trạng thái</th>
                                    <th>Quản Lí</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ds as $row)
                                <tr>
                                  <th scope="row">
                                    {{$row->id_invoice}}
                                  </th>
                                  <td>
                                      <a class="badge badge-pill badge-light-warning mr-1" href="{{route('user.edit',$row->user_id)}}"> @php
                                    $id =$row->user_id;
                                    $name = App\Models\User::find($id);
                                    echo $name->name;
                                  @endphp</a></td>
                                  <td>
                                      @if($row->service_type_id == 0)
                                        Tên miền <span class="badge badge-pill badge-light-warning mr-1">{{$row->sku}}</span>
                                      @else
                                    
                                       {{$row->sku}}
                                    
                                      @endif
                                  </td>
                                  @if($row->service_type_id == 0)
                                  <td>{{$row->pack_price}} / 100,000 đ</td>
                                  @else
                                  <td>{{$row->pack_price}}</td>
                                  @endif    
                                  <td>
                                    
                                    @switch($row->status)
                                                @case(1)
                                                <span class="badge badge-pill badge-light-warning mr-1"><i data-feather='loader'></i>                                                    @break
                                                    @break
                                                @case(2)
                                                <span class="badge badge-pill badge-light-info mr-1"><i data-feather='check'></i>
                                                    @break
                                                @case(3)
                                                <span class="badge badge-pill badge-light-success mr-1"><i data-feather='dollar-sign'></i>
                                                    @break
                                                @case(4)
                                                <span class="badge badge-pill badge-light-primary mr-1"><i data-feather='alert-triangle'></i>
                                                    @break
                                                @case(5)
                                                <span class="badge badge-pill badge-light-secondary mr-1"><i data-feather='alert-circle'></i>
                                                    @break

                                                @default
                                                    <span>Trạng thái mới, chưa cập nhật</span>
                                            @endswitch
                                        @php
                                        $id =$row->status;
                                        $name = App\Models\StatusInvoice::find($id);
                                        echo $name->name_status_invoice;
                                      @endphp
                                    </span>
                                  </td>
                                 
                                  <td >
                                    <div class="modal fade text-left" id="editgr-{{$row->id_invoice}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel33">Cập nhật tình trạng đơn hàng</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="form-change-group" action="{{route('quick_update_invoice', $row->id_invoice)}}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <label class="badge badge-pill badge-light-warning mr-1 mb-1">Chi tiết đơn hàng </label>
                                                        <div class="form-group">
                                                            <div><span class="text-success">@php
                                                                $id =$row->user_id;
                                                                $name = App\Models\User::find($id);
                                                                echo $name->name;
                                                              @endphp</span>  đã đặt mua <span class="text-success">{{$row->sku}} </span> lúc
                                                              <span class="text-success"> {{\Carbon\Carbon::parse($row->created_at)->addHour(7)}}</span>
                                                              , giá <span class="text-success"> {{$row->pack_price}} {{$row->service_type_id==0? '/ 100,000 đ': ''}}</span>
                                                            ,phương thức thanh toán<span class="text-success"> 
                                                            @php
                                                            $id =$row->invoice_payment;
                                                            $name = App\Models\PaymentMethod::find($id);
                                                            echo $name->name_payment;
                                                          @endphp</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="badge badge-pill badge-light-warning mr-1 mb-1">Trạng thái </label>
                                                            <select name="status" class="form-control" >
                                                                @php
                                                                $status = DB::table('status_invoice')->get();
                                                                @endphp
                                                                @foreach ($status as $s)
                                                                @if($row->status == $s->id)
                                                                   <option value="{{$s->id}}" selected> {{$s->name_status_invoice}}</option> 
                                                                @else
                                                                <option value="{{$s->id}}" > {{$s->name_status_invoice}}</option> 
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="badge badge-pill badge-light-warning mr-1 mb-1">Ghi chú của khách hàng </label>
                                                                <textarea readonly class="form-control" name="" cols="5" rows="3">{{$row->invoice_note}}</textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modals-add-{{$row->id_invoice}}">
                                                        <i data-feather='plus-circle'></i> Gửi tài khoản cho khách
                                                        </button>
                                                        <button type="submit" class="btn btn-primary" ><i  data-feather='upload'></i> Cập nhật trạng thái</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                                                     <!-- Modal to add new record -->
           <div class="modal modal-slide-in fade" id="modals-add-{{$row->id_invoice}}">
            <div class="modal-dialog sidebar-sm">
                <form  method="POST" action="{{route('send_detail_account')}}" class="add-new-record modal-content pt-0">
                    @csrf
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                    <div class="modal-header mb-1">
                        <h5 class="modal-title" id="exampleModalLabel">Gửi tài khoản cho khách</h5>
                      
                    </div>
                    <div class="modal-body flex-grow-1">
                        <div class="header text-success">Đơn hàng đã thanh toán thì mới được gửi </div>
                        <div class="form-group">
                            <label class="form-label badge badge-pill badge-light-warning mr-1" for="basic-icon-default-fullname">Thông tin tài khoản</label>
                            <textarea class="form-control summernote"  name="detail_account" cols="30" rows="10"></textarea>
                        </div>
                        <input  name="id_user" value="{{$row->user_id}}" type="text" hidden>
                        <div class="form-group">
                            <label class="form-label badge badge-pill badge-light-warning mr-1" for="basic-icon-default-fullname">Ngày bắt đầu</label>
                            <input name="day_start" class="form-control" type="date">
                        </div>
                        <div class="form-group">
                            <label class="form-label badge badge-pill badge-light-warning mr-1" for="basic-icon-default-fullname">Ngày kết thúc</label>
                            <input name="day_end" class="form-control" type="date">
                        </div>
                        <input hidden  name="id_invoice" value="{{$row->id_invoice}}" type="text">
                        <div class="form-group" >
                            <small>Lưu ý khi gửi tài khoản
                                <ul>
                                    <li>1. Note lại thông tin tài khoản trong kho</li>
                                    <li>2. Nhập đúng ngày bắt đầu và hết hạn sử dụng</li>
                                    <li>3. Bố cục form gửi cho khách hàng
                                        <ul>
                                            <li>a. Loại dịch vụ ( ghi đúng tên với loại dịch vụ đăng kí )</li>
                                            <li>b. Tài khoản</li>
                                            <li>c. Mật khẩu</li>
                                            <li>d. Thông tin gmail bảo mật đi kèm ( áp dụng với dịch vụ tài khoản )</li>
                                            <li>e. Ngày đăng kí ( tính từ lúc xác nhận đã thanh toán )</li>
                                            <li>f. Ngày hết hạn ( tính theo gói khách hàng mua )</li>
                                        </ul>
                                    </li>
                                   
                                </ul>
                            </small>
                        </div>
                        <button type="submit" class="btn btn-success data-submit mr-1">Gửi tài khoản</button>
                        <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
                     
                                    <button  class="btn btn-icon btn-primary" data-toggle="modal" data-target="#editgr-{{$row->id_invoice}}" > Xem nhanh</button>
                                  
                                
                               

          
                                </td>
                                </tr>
                               @endforeach
                              </tbody>
                        </table>
                    </div>
                </div>
            </div>
          
        </section>
        <!--/ Basic table -->


@endsection

@section('pagevendor')
<script src="{{asset('BE')}}/app-assets/vendors/js/extensions/toastr.min.js"></script>
<script src="{{asset('BE')}}/app-assets/js/scripts/extensions/ext-component-toastr.js"></script>
<script src="{{asset('BE')}}/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>

<script src="{{asset('BE')}}/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<script src="{{asset('BE')}}/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
<script src="{{asset('BE')}}/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js"></script>
<script src="{{asset('BE')}}/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
<script src="{{asset('BE')}}/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>

<script src="{{asset('BE')}}/app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
<script src="{{asset('BE')}}/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="{{asset('BE')}}/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="{{asset('BE')}}/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="{{asset('BE')}}/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="{{asset('BE')}}/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
<script src="{{asset('BE')}}/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>



    <script>
       $(document).ready(function() {
    $('#table-1').DataTable( {
        "order": [[ 1, "asc" ]], // Order on init. # is the column, starting at 0
        // dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
    } );
} );

    </script>
   
     
     <script>
         $(".form-change-group").submit(function(e) {

e.preventDefault(); // avoid to execute the actual submit of the form.

var form = $(this);
var url = form.attr('action');
// basic-datatable

$.ajax({
       type: "POST",
       url: url,
       data: form.serialize(), // serializes the form's elements.
       success: function(data)
       {
            if(data==1){
               
                Swal.fire(
  'Thành công',
  'Đã cập nhật tình trạng đơn hàng ',
  'success'
)

            }
            else{
                Swal.fire(
  'Lỗi',
  'Đã có lỗi xảy ra',
  'error'
)
            }
    }
     });


});
     </script>

<script>
    function xoaha(event) {
    event.preventDefault(); // prevent form submit
    var form = event.target.form; // storing the form
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger mr-1'
      },
      buttonsStyling: false
    })
    
    swalWithBootstrapButtons.fire({
      title: 'Xác nhận',
      text: "Bạn có muốn xóa thật không",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Có ',
      cancelButtonText: 'Không !!!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        form.submit();          // submitting the form when user press yes
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Đã hủy',
          'Chưa xóa đâu =))',
          'error'
        )
      }
    })
    }
      </script>
@endsection

@section('pagejs')
    <!-- BEGIN: Page JS-->
    {{-- <script src="{{asset('BE')}}/app-assets/js/scripts/tables/table-datatables-basic.js"></script> --}}
    <!-- END: Page JS-->

@endsection