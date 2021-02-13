@extends('FE.layout')
@section('pagetitle', ' Hỗ Trợ ')
@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                            <div class="col-md-12">
                                <div class="row d-flex">
                                    <div class="col-lg-3 col-md-6 ftco-animate fadeInUp ftco-animated">
                                        <div class="card block-7">
                                            <div class="card-body">
                                                <div class="shin-service-title-info text-center mb-2">Hướng dẫn người mới</div>
                                                <div class="shin-service-info mb-2">
                                                    Mọi thông tin cần hỗ trợ về VPS các bạn có thể liên hệ với Mi bằng nút hỗ trợ bên dưới nhé. <hr>
                                                   <p>Chúng tôi sẽ gửi mail cho bạn sau khi xử lí xong vấn đề.</p>
                                                </div>
                                                <a href="#"><div class="shin-service-okmuahang text-center">Hỗ trợ</div></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-6 ftco-animate fadeInUp ftco-animated">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="text-left">Hỗ Trợ</h3>
                                        <hr>
                                        <form action="{{route('send_support')}}" class="" method="POST">
                                            @csrf
                                            <div class="row col-lg-12">
                                                
                                                
                                                <div class="col-sm-12 col-md-8 col-lg-12 form-group">
                                                    <label for="form_subject">Chủ đề</label>
                                                    <input type="text" class="form-control" name="subject" required>
                                                </div>

                                                <div class="col-sm-12 col-md-8 col-lg-12 form-group">
                                                    <label for="form_content">Nội dung</label>
                                                    <textarea class="form-control" name="content" rows="3" required></textarea >
                                                </div>
                                                <div class="col-sm-12 col-md-8 col-lg-12 form-group">
                                                    {{-- <input type="submit" class="btn btn-success text-center" value="Gửi"> --}}
                                                    <button class="g-recaptcha btn btn-success text-cente" data-sitekey="6LceVFYaAAAAACxNACGes6AHiimwVVmE-Gbm5JOR" data-callback="YourOnSubmitFn">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </form>                     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>

                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="card p-3">
                        <div class="row d-flex">
                          
                            <div class="card-body">
                                <label for="">Lịch sử hỗ trợ</label>
                                <table class="table table-striped " id="myTable">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tiêu đề</th>
                                        <th scope="col">Ngày gửi</th>
                                        <th scope="col">Trạng thái</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $history = DB::table('contact')->where('id_user',Auth::user()->id)
                                        ->orderby('id','desc')
                                        ->get();
                                        @endphp
                                        @foreach ($history as $h)
                                        <tr>
                                        <th scope="row">{{$h->id}}</th>
                                        <td>{{$h->subject}}</td>
                                        <td>{{$h->created_at}}</td>
                                        <td>@if($h->status==0)
                                            Chưa xử lí
                                            @else
                                            Đã xử lí
                                            @endif
                                        </td>
                                      </tr>
                                        @endforeach
                                  
                                 
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

@endsection
@section('script')
<script src='https://www.google.com/recaptcha/api.js' async defer></script>

@endsection