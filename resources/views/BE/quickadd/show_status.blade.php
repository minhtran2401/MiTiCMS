@extends('BE.layout.layout')
@section('pagetitle','Trạng Thái Hóa Đơn')
@section('csspage')
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('BE')}}/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
@endsection
@section('content')
@section('br-namepage1','Trạng Thái Hóa Đơn')
@section('br-namepage2','Hóa Đơn')
@section('br-namepage3','Trạng Thái Hóa Đơn ')



        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            <strong>Ghi chú:</strong> Trạng thái hóa đơn
                           
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
                          <form class="form-check-inline" action="{{route('status_invoice.reset')}}" method="POST">
                            @csrf
                           
                         <button class="btn btn-outline-danger mr-3" style="border: 0" onclick="xoaha(event)" ><i data-feather='alert-triangle'></i> Reset bảng</button>
                          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modals-slide-in">
                            <i data-feather='plus-circle'></i> Thêm trạng thái
                         </button>
                         
                  </form>
                     </div></div></div>
                     <table class="table table-striped" id="table-1">
                      <thead>
                        <tr>
                          <th class="text-center">
                            #
                          </th>
                          <th>Trạng Thái</th>
                          <th class="text-center" >Quản Lí</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($ds as $row)
                        <tr>
                          <td>{{$row->id}}</td>
                        
                         <td><div>{{$row->name_status_invoice}}</div></td>
                          
                       <td  class="text-center">
                      <form class="form-check-inline" action="{{route('status_invoice.destroy', $row->id)}}" method="POST">
                              @csrf
                             
                           <button class="btn btn-icon btn-danger" style="border: 0" onclick="xoaha(event)" ><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
                      </form>

                    </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="modal modal-slide-in fade" id="modals-slide-in">
              <div class="modal-dialog sidebar-sm">
                  <form id="create-groups-service" method="POST" action="{{route('store.iv.ajax')}}" class="add-new-record modal-content pt-0">
                      @csrf
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                      <div class="modal-header mb-1">
                          <h5 class="modal-title" id="exampleModalLabel">Thêm Tình Trạng Hóa Đon</h5>
                      </div>
                      <div class="modal-body flex-grow-1">
                          <div class="form-group">
                              <label class="form-label" for="basic-icon-default-fullname">Tên Gọi</label>
                              <input type="text" name="name_status_invoice" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="Tên Gọi" required  />
                          </div>
                         
                          <button type="submit" class="btn btn-primary data-submit mr-1">Lưu</button>
                          <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Hủy</button>
                      </div>
                  </form>
              </div>
          </div>
            <!-- Modal to add new record -->
          
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
   // "order": [[ 2, "asc" ]], // Order on init. # is the column, starting at 0
   // dom: 'Bfrtip',
   // buttons: [
   //     'copy', 'csv', 'excel', 'pdf', 'print'
   // ]
} );
} );

</script>
<script>
   $("#create-groups-service").submit(function(e) {

e.preventDefault(); // avoid to execute the actual submit of the form.

var form = $(this);
var url = form.attr('action');
$.ajax({
  type: "POST",
  url: url,
  data: form.serialize(), // serializes the form's elements.
  success: function(data){
   //    alert(data);
       if(data['3']==1){
           $('#table-1').append($('<tr>')
.append($('<td>').html(  data['1'] ))
.append($('<td>').append(data['2']))                           
.append($('<td>').html(" <form class='form-check-inline'>  <button  class='btn btn-icon btn-danger xoaha' style='border: 0' onclick='xoaha(event)' ><i class='fa fa-tras' aria-hidden='true'></i> Xóa</button></form>"))
                             
                             
                            
                               
                                
)


   Swal.fire(
   'Thành công!',
   'Đã thêm trạng thái mới!',
   'success'
   )}
   else{
       Swal.fire(
   'Thất Bại!',
   'Đã có lỗi xảy ra',
   'error'
   )}}
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