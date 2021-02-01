@extends('BE.layout.layout')
@section('pagetitle','Dịch Vụ VPS')
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
@section('br-namepage1','VPS')
@section('br-namepage2','Dịch vụ')
@section('br-namepage3','Dịch vụ VPS')



        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            <strong>Ghi chú:</strong> Dịch vụ VPS của website.
                           
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
                               + Thêm VPS
                            </button>
                     </div></div></div>
                        <table class="datatables-basic table" id="table-1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên</th>
                                    <th>Cấu Hình</th>
                                    <th class="text-center">Giá</th>
                                    <th>Trạng thái</th>
                                    <th>Quản Lí</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                  <th scope="row">1</th>
                                  <td>Mark</td>
                                  <td>Otto</td>
                                  <td width="15%"><select class="form-control" aria-label="Default select example">
                                    <option value="1">20.000 đ/ 1 tháng</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                  </select></td>
                                  <td>Mark</td>
                                  <td>Otto</td>
                                </tr>
                              
                              </tbody>
                            <tbody>
                                @foreach ($ds as $row)
                                <tr>
                                  <th scope="row">{{$row->service_type_id}}</th>
                                  {{-- <td>  @php
                                    $service_group_id =$row->service_group_id;
                                    $tl = App\Models\GroupService::find($service_group_id);
                                    echo $tl->service_group_name;
                                    @endphp</td>
                                  <td>{{$row->service_type_name}}</td> --}}
                                 
{{-- 
                                  <td data-id="{{ $row->service_group_id }}">
                                    <div class="custom-control custom-switch custom-control-inline">
                                        <input type="checkbox" id="gr-{{$row->service_group_id}}"  class="custom-control-input change-status"  {{ $row->display==1?'checked':'' }}>
                                        <label for="gr-{{$row->service_group_id}}" class="custom-control-label content-status" >{{ $row->display==1?'Hiện':'Ẩn'}}</label>
                                    </div>
                                  </td> --}}

                                  {{-- <td >
                                    <div class="modal fade text-left" id="editgr-{{$row->service_type_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel33">Sửa loại dịch vụ</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="form-change-group" action="{{route('type-service.update', $row->service_type_id)}}" method="POST">
                                                    @csrf
                                                    @method('patch')
                                                    <div class="modal-body">
                                                        <label>Nhóm </label>
                                                        <div class="form-group">
                                                            <select name="id_group" class="form-control" >
                                                                @php
                                                                $kq = App\Models\GroupService::select("service_group_id", "service_group_name")->get();
                                                            @endphp
                                                                @foreach ($kq as $nsp)
                                                                @if ($row->service_group_id == $nsp->service_group_id)
                                                                    <option value='{{$row->service_group_id}}'
                                                                            selected>{{$nsp->service_group_name}}</option>
                                                                @else
                                                                    <option value='{{$nsp->service_group_id}}'>{{$nsp->service_group_name}}</option>
                                                                @endif
                                                            @endforeach
                                                            </select>
                                                        </div>
                                                        <label>Tên Mới </label>
                                                        <div class="form-group">
                                                            <input name="name_type" type="text" value="{{$row->service_type_name}}" class="form-control" />
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

                                    
                                    <button  class="btn btn-icon btn-primary" data-toggle="modal" data-target="#editgr-{{$row->service_type_id}}" > <i class="fa fa-eye" aria-hidden="true"></i> Sửa</button>
                                  
                                  <form class="form-check-inline" action="{{route('type-service.destroy', $row->service_type_id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                       <button  class="btn btn-icon btn-danger xoaha" style="border: 0" onclick="xoaha(event)" ><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
                                  </form>
          
                                </td> --}}
                                </tr>
                                @endforeach
                              </tbody>
                        </table>
                    </div>
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
                  url:"{{ route('changeStatus.type-service') }}",
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
    .append($('<td>').html(data['4']))
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