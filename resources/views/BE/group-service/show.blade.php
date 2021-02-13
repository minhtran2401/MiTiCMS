@extends('BE.layout.layout')
@section('pagetitle','Nhóm dịch vụ')
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
@section('br-namepage1','Loại dịch vụ')
@section('br-namepage2','Dịch vụ')
@section('br-namepage3','Nhóm dịch vụ')


        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            <strong>Ghi chú:</strong> Nhóm dịch vụ của website.
                           
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
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modals-slide-in">
                               + Thêm dịch vụ
                            </button>
                     </div></div></div>
                        <table class="datatables-basic table" id="table-1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên dịch vụ</th>
                                    <th>Trạng thái</th>
                                    <th>Quản Lí</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ds as $row)
                                <tr>
                                  <th scope="row">{{$row->service_group_id}}</th>
                                  <td>{{$row->service_group_name}}</td>

                                  <td data-id="{{ $row->service_group_id }}">
                                    <div class="custom-control custom-switch custom-control-inline">
                                        <input type="checkbox" id="gr-{{$row->service_group_id}}"  class="custom-control-input change-status"  {{ $row->display==1?'checked':'' }}>
                                        <label for="gr-{{$row->service_group_id}}" class="custom-control-label content-status" >{{ $row->display==1?'Hiện':'Ẩn'}}</label>
                                    </div>
                                  </td>

                                  <td >
                                    <div class="modal fade text-left" id="editgr-{{$row->service_group_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel33">Sửa nhóm dịch vụ</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="form-change-group" action="{{route('group-service.update', $row->service_group_id)}}" method="POST">
                                                    @csrf
                                                    @method('patch')
                                                    <div class="modal-body">
                                                        <label>Tên Mới </label>
                                                        <div class="form-group">
                                                            <input name="name_group" type="text" value="{{$row->service_group_name}}" class="form-control" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label  for="">Trạng thái</label>
                                                            <select name="display" class="form-control" >
                                                                @if ($row->display == 1)  
                                                                <option value="0">Ẩn</option>
                                                                <option value="1" selected>Đang Hiện</option>
                                                                @else
                                                                <option value="0" selected>Đang Ẩn</option>
                                                                <option value="1" >Hiện</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary" >Sửa</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <button  class="btn btn-icon btn-primary" data-toggle="modal" data-target="#editgr-{{$row->service_group_id}}" > <i class="fa fa-eye" aria-hidden="true"></i> Sửa</button>
                                  
                                  <form class="form-check-inline" action="{{route('group-service.destroy', $row->service_group_id)}}" method="POST">
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
            <div class="modal modal-slide-in fade" id="modals-slide-in">
                <div class="modal-dialog sidebar-sm">
                    <form id="create-groups-service" method="POST" action="{{route('store.gr.ajax')}}" class="add-new-record modal-content pt-0">
                        @csrf
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                        <div class="modal-header mb-1">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm Nhóm Dịch Vụ Mới</h5>
                        </div>
                        <div class="modal-body flex-grow-1">
                            <div class="form-group">
                                <label class="form-label" for="basic-icon-default-fullname">Tên Nhóm</label>
                                <input type="text" name="name_group_service" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="Tên Nhóm" required  />
                            </div>
                            <div class="form-group" >
                                <small>Thêm thêm thứ tự 
                                    <ul>
                                        <li>1. Máy chủ vât lí</li>
                                        <li>2. VPS</li>
                                        <li>3. Hosting</li>
                                        <li>4. Tài khoản các loại</li>
                                        <li>5. Domain</li>
                                    </ul>
                                </small>
                            </div>
                            <button type="submit" class="btn btn-primary data-submit mr-1">Lưu</button>
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
    
  
$("#table-1").on("click", ".change-status", function(e){
// $(document).ready(function(){
    $('.change-status').change(function(e){
        // ngăn sự kiện change-status này khi click sẽ lan ra các sự kiện khác
        //thường áp dụng cho các button form hoặc thẻ link ( tag a )
          e.preventDefault();

          //lấy id nhóm sản phẩm từ thẻ td ( data-id )
          var id=$(this).parent().parent().data('id');

        
        var status=$(this).prop('checked')?1:0;
   
          //tạo biến global cho element đang click
          var change=$(this)
          var content=$(this).parent().find('.content-status')
          //nếu có id thì mới gửi ajax
          if(id){
              $.ajax({
                  //tên route có url là ....
                  url:"{{ route('changeStatus.group-service') }}",
                  // kiểu method nên là post
                  type:"post",

                  //truyền biến id bà status
                  data:{
                      id:id,
                      status:status,
                      "_token": "{{ csrf_token() }}",
                    
                    }

                  //nếu gửi thành công
              }).done(function(result){
                //nếu k nhận dc id
                  if(result=='error'){
                      alert("Không nhận được id.");
                  let old= change.prop('checked')?false:true;
                    change.prop('checked',old)
                      //k cho chạy lệnh bên dưới nhờ return
                      return;
                  }


                  //nếu status là 1 ( hiện )
                  if(result==1){
                    
                      change.prop('checked','checked')
                      content.text('Hiện')
                      //k cho chạy lệnh bên dưới nhờ return
                      return;
                  }
                  //nếu status là 0 ( ẩn )
                     
                      change.prop('checked','')
                      content.text('Ẩn')
                    //nếu gửi thất bại
              }).fail(function(){
                  let old= change.prop('checked')?false:true;
                    change.prop('checked',old)
                  alert("Xảy ra lỗi từ phía server.");
              })
          }
      })
    })
</script>


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
    .append($('<td>').html('<b>' + data['1'] + '</b>'))
    .append($('<td>').append(data['2']))
    .append($('<td>').append(" <div class='custom-control custom-switch custom-control-inline'><input type='checkbox' checked  class='custom-control-input change-status'  ><label  class='custom-control-label content-status' >Hiện</label> </div>"))
                                        
                                        
                                   
    .append($('<td>').html(" <button  class='btn btn-icon btn-primary' >  Sửa</button> <form class='form-check-inline'>  <button  class='btn btn-icon btn-danger xoaha' style='border: 0' onclick='xoaha(event)' ><i class='fa fa-tras' aria-hidden='true'></i> Xóa</button></form>"))
                                  
                                  
                                 
                                    
                                     
  )


        Swal.fire(
        'Thành công!',
        'Đã thêm nhóm mới!',
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
  'Đã cập nhật lại nhóm sản phẩm',
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