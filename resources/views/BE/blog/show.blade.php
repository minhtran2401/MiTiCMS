@extends('BE.layout.layout')
@section('pagetitle','Trang Blog')
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
@section('br-namepage1','Blog')
@section('br-namepage2','Blog')
@section('br-namepage3','Danh sách blog')



        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            <strong>Ghi chú:</strong> Blog website
                           
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
                           
                              <a  class="btn btn-outline-primary" href="{{route('blog.create')}}"> + Thêm blog</a>
                            
                     </div></div></div>
                     <table class="table table-striped" id="table-1">
                      <thead>
                        <tr>
                          <th class="text-center">
                            #
                          </th>
                          <th>Tên Blog</th>
                          <th  >Người Đăng  </th>
                          
                         
                          <th>Nổi Bật</th>
                          <th>Trạng Thái</th>
                          <th class="text-center" >Quản Lí</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($ds as $row)
                        <tr>
                          <td>
                            <div> {{ $row->blog_id}} </div> 
                           

                          </td>
                          <td width="25%">
                          <div>{{$row->blog_name}}</div>
                          <div>
                            @php
                            $id_loaiblog =$row->blog_type_id;
                            $tl = App\Models\BlogType::find($id_loaiblog);
                            echo $tl->name_blog_type_name;
                          @endphp</div>
                         </td>
                         
                         <td>
                          @php
                          $id_user =$row->user_id;
                          $tl = App\Models\USer::find($id_user);
                          echo $tl->name;
                        @endphp
                         </td>
                        
                          

                         <td data-id="{{ $row->blog_id }}">
                          <div class="custom-control custom-switch custom-control-inline">
                              <input type="checkbox" id="sp-{{$row->blog_id}}"  class="custom-control-input change-special"  {{ $row->blog_special==1?'checked':'' }}>
                              <label for="sp-{{$row->blog_id}}" class="custom-control-label content-status" >{{ $row->blog_special==1?'Nổi bật':'Tin thường'}}</label>
                          </div>
                        </td>

                        <td data-id="{{ $row->blog_id }}">
                          <div class="custom-control custom-switch custom-control-inline">
                              <input type="checkbox" id="dp-{{$row->blog_id}}"  class="custom-control-input change-status"  {{ $row->display==1?'checked':'' }}>
                              <label for="dp-{{$row->blog_id}}" class="custom-control-label content-status" >{{ $row->display==1?'Hiện':'Ẩn'}}</label>
                          </div>
                        </td>
                          
                      <td  class="text-center">
                        <form class="form-check-inline" action="{{route('blog.edit', $row->blog_id)}}" >
                       <button style="border: 0" class="btn btn-icon btn-primary" >  <i class="fa fa-eye" aria-hidden="true"></i> Sửa</button>
                      </form>
                      <form class="form-check-inline" action="{{route('blog.destroy', $row->blog_id)}}" method="POST">
                              @csrf
                              {!! method_field('delete') !!}
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
                  url:"{{ route('changeStatus.blog') }}",
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
                        'Blog đang được hiển thị',
                        'success'
                      )
                      return;
                  }  
                      change.prop('checked','')
                      content.text('Ẩn')
                      Swal.fire(
                      'Thành công!',
                      'Blog đang được ẩn đi',
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
  $("#table-1").on("click", ".change-special", function(e){
  // $(document).ready(function(){
      $('.change-special').change(function(e){
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
                    url:"{{ route('changeStatus.blogspecial') }}",
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
                          'Blog đang là nổi bật',
                          'success'
                        )
                        return;
                    }  
                        change.prop('checked','')
                        content.text('Ẩn')
                        Swal.fire(
                        'Thành công!',
                        'Blog đang là tin thường',
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