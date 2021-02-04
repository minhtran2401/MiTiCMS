@extends('BE.layout.layout')
@section('pagetitle','Dịch vụ tên miền')
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
@section('br-namepage1','Tên miền')
@section('br-namepage2','Dịch vụ')
@section('br-namepage3','Dịch vụ tên miền')



        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            <strong>Ghi chú:</strong> Dịch vụ tên miền của website.
                           
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
                               + Thêm nhanh tên miền
                            </button>
                     </div></div></div>
                        <table class="datatables-basic table" id="table-1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Loại</th>
                                    <th>Tên miền</th>
                                    <th>Giá năm</th>
                                    <th>Combo giá</th>
                                    <th>Trạng thái</th>
                                    <th>Quản Lí</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ds as $row)
                                <tr>
                                  <th scope="row">{{$row->domain_id}}</th>
                                  <td>  
                                    @if($row->domain_type == 1)
                                    <div>Phổ Biến</div>
                                    @elseif($row->domain_type==2)
                                    <div>Việt Nam</div>
                                    @elseif($row->domain_type==3)
                                    <div>Quốc Tế</div>
                                    @endif
                                  </td>
                                  <td>{{$row->domain_name}}</td>
                                 
                                  <td>{{number_format($row->price_show)}} đ</td>
                                  <td>
                                    @php
                                    $prices = \DB::table('service_price')->where('sku',$row->sku)->get();
                                    @endphp
                                    <select class="form-control" >
                                      @foreach ($prices as $price)
                                      <option>{{number_format($price->service_price)}} đ/ {{$price->service_time}}</option>
                                      @endforeach
                                    
                                  </select>
                                  </td>
                                  <td data-id="{{ $row->domain_id }}">
                                    <div class="custom-control custom-switch custom-control-inline">
                                        <input type="checkbox" id="dm-{{$row->domain_id}}"  class="custom-control-input change-status"  {{ $row->status==1?'checked':'' }}>
                                        <label for="dm-{{$row->domain_id}}" class="custom-control-label content-status" >{{ $row->status==1?'Hiện':'Ẩn'}}</label>
                                    </div>
                                  </td>

                                  <td >
                                   

                                    
                                    <form class="form-check-inline"  method="GET">
                                      {{ method_field('UPDATE')}}
                                      @csrf
                                      <a href="{{route('domain.edit', $row->domain_id)}}"  title="Sửa" class="btn btn-icon btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Sửa</a>
                                    </form>
                                  
                                  <form class="form-check-inline" action="{{route('domain.destroy', $row->domain_id)}}" method="POST">
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
                    <form id="create-domain" method="POST" action="{{route('store.dm.ajax')}}" class="add-new-record modal-content pt-0">
                        @csrf
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                        <div class="modal-header mb-1">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm Nhanh Tên Miền</h5>
                        </div>
                        <div class="modal-body flex-grow-1">
                          {{-- <div class=" form-group">
                            <label >Nhóm Dịch Vụ</label>
                            <select name="getgroup" class="select2 form-control ">
                                <option value="0">---NHÓM DỊCH VỤ---</option>
                                  @foreach ($gr as $group)
                                  <option value='{{$group->service_group_id}}'>{{$group->service_group_name}}</option>  
                                  @endforeach
                          </select>
                        </div>


                        <div class="form-group">
                            <label >Loại Dịch Vụ</label>
                            <select name="gettype" class="select2 form-control">
                              <option value="0">---LOẠI DỊCH VỤ---</option>
                          </select>
                        </div> --}}
                        
                            <div class="form-group">
                                <label class="form-label" for="basic-icon-default-fullname">Tên miền</label>
                                <input type="text" name="domain_name" class="form-control dt-full-name" placeholder=".com , .net ,..." required  />
                            </div>

                            <div class="form-group">
                              <label class="form-label" for="basic-icon-default-fullname">Nhóm tên miền ( 1, 2, 3 )</label>
                              <input type="text" name="domain_type" class="form-control dt-full-name" placeholder="1-PB, 2-VN, 3-QT" required  />
                          </div>
                          <div class="form-group">
                            <label class="form-label" for="basic-icon-default-fullname">Giá một năm</label>
                            <input type="text" name="price_show" class="form-control dt-full-name" placeholder="70000, 100000, ..." required  />
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
                  url:"{{ route('changeStatus.domain-service') }}",
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
                      return;
                  }
                 
                  if(result==1){
                      change.prop('checked','checked')
                      content.text('Hiện')
                      Swal.fire(
                        'Thành công',
                        'Domain đang được hiển thị',
                        'success'
                      )
                      return;
                  }  
                      change.prop('checked','')
                      content.text('Ẩn')
                      Swal.fire(
                      'Thành công!',
                      'Domain đang được ẩn đi',
                      'success'
                    )
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
        $("#create-domain").submit(function(e) {

e.preventDefault(); // avoid to execute the actual submit of the form.

var form = $(this);
var url = form.attr('action');
$.ajax({
       type: "POST",
       url: url,
       data: form.serialize(), // serializes the form's elements.
       success: function(data){
          //  alert(data);
            if(data['3']==1){
                $('#table-1').append($('<tr>')
                  .append($('<td>').html('<b>' + data['5'] + '</b>'))
    .append($('<td>').html(" Loại " + data['4']))
    .append($('<td>').html(data['1']))
    .append($('<td>').append(data['2'] + " đ "))
      .append($('<td>').append(" <select class='form-control' >" +
                                      "<option></option>"+
                                  "</select>"))
    .append($('<td>').append(" <div class='custom-control custom-switch custom-control-inline'><input type='checkbox' checked  class='custom-control-input change-status'  ><label  class='custom-control-label content-status' >Hiện</label> </div>"))
    .append($('<td>').html(" <button  class='btn btn-icon btn-primary' >  Sửa</button> <form class='form-check-inline'>  <button  class='btn btn-icon btn-danger xoaha' style='border: 0' onclick='xoaha(event)' ><i class='fa fa-tras' aria-hidden='true'></i> Xóa</button></form>"))                                                                  
                                     
  )


        Swal.fire(
        'Thành công!',
        'Đã thêm tên miền mới!',
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