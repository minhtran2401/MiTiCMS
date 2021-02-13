@extends('auth.layout-auth')
@section('pagetitle','Đăng Kí')

@section('content')

                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="{{asset('BE')}}/app-assets/images/pages/register-v2.svg" alt="Register V2" /></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Register-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h4 class="card-title mb-1">Đăng Kí Ngay 🚀</h4>
                                <p class="card-text mb-2">Nhiều dịch vụ với giá cực kì ưu đãi</p>
                                <form class="auth-register-form mt-2" id="form-res" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="name">Họ và Tên</label>
                                        <input class="form-control" id="name" type="text" name="name" placeholder="Họ Tên" aria-describedby="register-username" autofocus="" tabindex="1" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email</label>
                                        <input class="form-control" id="email" type="email" name="email" placeholder="user@gmail.com" aria-describedby="register-email" tabindex="2" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="password">Mật khẩu</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="password" type="password" name="password" placeholder="············" aria-describedby="register-password" tabindex="3" required />
                                            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="password-confirm">Nhập lại mật khẩu</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="password-confirm" type="password" name="password_confirmation" placeholder="············" aria-describedby="register-password" tabindex="3" required/>
                                            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="checkme" type="checkbox" tabindex="4" />
                                            <label class="custom-control-label" for="checkme">Tôi đồng ý với<a href="javascript:void(0);">&nbsp;Chính sách và Điều khoản bảo mật</a> của website</label>
                                        </div>
                                    </div>

                                    <button id="btnSubmitres" name="btnSubmitres" disabled="disabled" class="btn btn-primary btn-block" tabindex="5">Sign up</button>
                                   
                                </form>
                                <p class="text-center mt-2"><span>Đã có tài khoản?</span><a href="{{route('login')}}"><span>&nbsp;Đăng nhập ngay</span></a></p>
                                <div class="divider my-2">
                                    <div class="divider-text">hoặc</div>
                                </div>
                                <div class="auth-footer-btn d-flex justify-content-center"><a class="btn btn-facebook" href="javascript:void(0)"><i data-feather="facebook"></i></a><a class="btn btn-twitter white" href="javascript:void(0)"><i data-feather="twitter"></i></a><a class="btn btn-google" href="javascript:void(0)"><i data-feather="mail"></i></a><a class="btn btn-github" href="javascript:void(0)"><i data-feather="github"></i></a></div>
                            </div>
                        </div>
                        <!-- /Register-->
       
@endsection
@section('js')
<script src="{{asset('assets')}}/js/sweetalert2@10.js"></script>
<script src="{{asset('assets')}}/js/jquery-3.2.1.min.js"></script>

<script>
     var checker = document.getElementById('checkme');
 var sendbtn = document.getElementById('btnSubmitres');
 // when unchecked or checked, run the function
 checker.onchange = function(){
if(this.checked){
    sendbtn.disabled = false;
} else {
    sendbtn.disabled = true;
}

}
</script>

<script>
    $('#password').on('blur', function(){
    if(this.value.length < 8){ // checks the password value length
        Swal.fire(
                'Thất bại',
                'Mật khẩu phải ít nhất 8 kí tự ',
                'error'
                );
                return false;
       $(this).focus(); // focuses the current field.
       return false; // stops the execution.
    }
});
</script>
<script>
 $(function () {
        $("#btnSubmitres").click(function () {
            var password = $("#password").val();
            var confirmPassword = $("#password-confirm").val();
            if (password != confirmPassword) {
                Swal.fire(
                'Thất bại',
                'Mật khẩu chưa trùng khớp',
                'error'
                )
                return false;
            }
            return true;
        });
    });
</script>
    <script>
        $("#form-res").submit(function(e) {

e.preventDefault(); // avoid to execute the actual submit of the form.

var form = $(this);
var url = form.attr('action');
var reurl = "{{route('login')}}"
$.ajax({
       type: "POST",
       url: url,
       data: form.serialize(), // serializes the form's elements.
       success: function(data)
       {
        //    alert(data); // show response from the php script.
        if(data=="1"){
            Swal.fire(
                'Thành công',
                'Đăng kí thành công, về trang đăng nhập.',
                'success'
                )
            setTimeout(function() {
            window.location = reurl;
            },1500);
          }
       }
       ,error:function(){ 
          
        Swal.fire(
                'Thất bại',
                'Email đã tồn tại trong hệ thống',
                'error'
                )
        }
     });
});
    </script>
@endsection