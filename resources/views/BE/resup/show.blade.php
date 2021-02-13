@extends('BE.layout.layout')
@section('pagetitle','Hỗ trợ khách hàng')
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
@section('br-namepage1','Hỗ trợ')
@section('br-namepage2','Hỗ trợ')
@section('br-namepage3','Xử lí hỗ trợ của khách hàng')


        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            <strong>Ghi chú:</strong> Xử lí hỗ trợ của khách hàng
                           
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
                        <div class="card-header border-bottom p-1"><div class="head-label"><h6 class="mb-0">TimiVPS</h6></div>
                        <div class="dt-action-buttons text-right"><div class="dt-buttons d-inline-flex">
                            
                     </div></div></div>
                        <table class="datatables-basic table" id="table-1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Khách hàng</th>
                                    <th>Tiêu đề</th>
                                    <th>Thời gian</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ds as $row)
                                <tr>
                                  <th scope="row">{{$row->id}}</th>
                                  <td>
                                    <a class="badge badge-pill badge-light-warning mr-1" href="{{route('user.edit',$row->id_user)}}"> @php
                                  $id =$row->id_user;
                                  $name = App\Models\User::find($id);
                                  echo $name->name;
                                  
                                @endphp</a>
                              
                            </td>

                                <td>{{$row->subject}}</td>
                               
                                @php
                                    \Carbon\Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt.

                                @endphp
                                <td>{{ $diff = Carbon\Carbon::parse($row->created_at)->diffForHumans(Carbon\Carbon::now()) }}</td>
                                <td>@if($row->status==0)
                                   <span class="text-danger">Chưa xử lí</span>
                                    @else
                                    <span class="text-success">Đã xử lí</span>
                                    @endif
                                </td>
                                  <td >
                                    <div class="modal fade text-left" id="editgr-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel33">Gửi mail cho khách</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="form-change-group" action="{{route('send_resup')}}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <label>Nội dung khách hàng nhắn </label>
                                                        <div class="form-group">
                                                          <textarea class="form-control " readonly name="content" cols="30" rows="2">{{$row->content}}</textarea>
                                                        </div>
                                                        <label>Phản hồi khách hàng</label>
                                                        <textarea placeholder="nội dung này sẽ được gửi qua mail cho khách hàng" class="form-control summernote3" name="resup"  cols="30" rows="10" required></textarea>
                                                        <input hidden type="text" name="id_case" value="{{$row->id}}" id="">
                                                        <input hidden  type="text" value="{{$name->email}}" name="email" id="">    
                                                        <input hidden type="text" name="subject" value="{{$row->subject}}"  id="">
                                                    </div>
                                                    <div class="modal-footer">
                                                     
                                                        <button type="submit" class="btn btn-primary" >Gửi mail</button>
                                                        <button type="button" data-dismiss="modal" class="btn btn-danger" >Hủy</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <button  class="btn btn-icon btn-primary" data-toggle="modal" data-target="#editgr-{{$row->id}}" > <i class="fa fa-eye" aria-hidden="true"></i> Xem</button>
                                  
                                  
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
    
@endsection

@section('pagejs')

<script>
    $(document).ready(function() {
$('.summernote3').summernote();
});
</script>

@endsection