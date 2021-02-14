@extends('BE.layout.layout')
@section('pagetitle','Kho tài khoản')
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
@section('br-namepage1','Kho tài khoản')
@section('br-namepage2','Kho')
@section('br-namepage3','Kho tài khoản')


        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            <strong>Ghi chú:</strong> Kho tài khoản để cung cấp cho khách hàng
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
                        <div class="card-header border-bottom p-1"><div class="head-label"><h6 class="mb-0">TiMiHost</h6></div>
                        <div class="dt-action-buttons text-right"><div class="dt-buttons d-inline-flex">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modals-slide-inz">
                               + Nhập kho
                            </button>
                     </div></div></div>
                        <table class="datatables-basic table" id="table-1">
                            <thead>
                                <tr>
                                    <th> #</th>
                                    <th>Người nhập kho</th>
                                    <th>Thời gian</th>
                                    <th>Tên tài khoản</th>
                                    <th>Chi tiết</th>
                                    <th>Quản Lí</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ds as $row)
                                <tr>
                                  <th scope="row">
                                    {{$row->id}}
                                  </th>
                                  <td>
                                      <div class="badge badge-pill badge-light-warning mr-1"> @php
                                    $id =$row->id_user;
                                    $name = App\Models\User::find($id);
                                    echo $name->name;
                                  @endphp</div></td>
                                  <td>
                                    {{$row->created_at}}
                                  </td>
                                 
                                  <td>
                                    {{$row->name_account}}
                                  </td>
                                 
                                  <td>
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#editgr-{{$row->id}}">
                                        Xem
                                     </button>
                                  </td>

                                  <td >
                                    <div class="modal fade text-left" id="editgr-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel33">Cập nhật tình trạng đơn hàng</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="form-change-group" action="{{route('storage.quickupdate')}}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <label class="badge badge-pill badge-light-warning mr-1 mb-1">Chi tiết tài khoản </label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="name_account" value="{{$row->name_account}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea name="detail_account" class="form-control summernote" id="" cols="30" rows="10">{!!$row->detail_account!!}</textarea>
                                                        </div>

                                                        <input type="text"  name="id" value="{{$row->id}}" hidden>
                                                    </div>
                                                    
                                                    <div class="modal-footer">
                                                        <button class="btn btn-danger" >Hủy</button>
                                                        <button type="submit" class="btn btn-primary" ><i  data-feather='upload'></i> Cập nhật </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
              
                                    <form class="form-check-inline" action="{{route('storage.destroy', $row->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                       <button  class="btn btn-icon btn-danger xoaha" style="border: 0" onclick="xoaha(event)" ><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
                                  </form>
                                  

                                </td>
                                </tr>
                               @endforeach
                              </tbody>
                        </table>
                    </div>
                </div>
            </div>
                                                                              <!-- Modal to add new record -->
                                                                              <div class="modal modal-slide-in fade" id="modals-slide-inz">
                                                                                <div class="modal-dialog sidebar-sm">
                                                                                    <form id="create-groups-service" method="POST" action="{{route('add_storage')}}" class="add-new-record modal-content pt-0">
                                                                                        @csrf
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                                                                        <div class="modal-header mb-1">
                                                                                            <h5 class="modal-title" id="exampleModalLabel">Nhập kho tài khoản</h5>
                                                                                          
                                                                                        </div>
                                                                                        <div class="modal-body flex-grow-1">
                                                                                            <div class="header text-success">Ghi chú cẩn thật tất cả các thông tin của tài khoản </div>
                                                                                            <div class="form-group" >
                                                                                                <label class="form-label badge badge-pill badge-light-warning mr-1" for="basic-icon-default-fullname">Tên tài khoản</label>
                                                                                                <input type="text" class="form-control mt-1 mb-1" name="name_account" placeholder="Tên tài khoản">
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label class="form-label badge badge-pill badge-light-warning mr-1" for="basic-icon-default-fullname">Thông tin tài khoản</label>
                                                                                                <textarea class="form-control summernote" placeholder="Ghi theo đúng bố cục bên dưới" name="detail_account" id="" cols="30" rows="20"></textarea>
                                                                                            </div>
                                                                                         
                                                                                           
                                                                                     
                                                                                            <button type="submit" class="btn btn-success data-submit mr-1">Nhập kho</button>
                                                                                            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Hủy</button>
                                                                                        </div>
                                                                                    </form>
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