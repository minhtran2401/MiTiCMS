@extends('auth.layout-auth')
@section('content')
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                   <form id="form-res" method="POST" action="{{ route('register') }}"  class="form-signin">
                        @csrf

						<div class="account-logo">
                            <a href="index-2.html"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="form-group ">
                            <label for="email">{{ __('Họ và Tên') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                              
                        </div>

                        <div class="form-group ">
                            <label for="email">{{ __('Địa Chỉ Email') }}</label>
                             <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                              
                        </div>

                        <div class="form-group ">
                            <label for="email">{{ __('Mật Khẩu') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                          
                        </div>
                        <div class="form-group ">
                            <label for="password-confirm" >{{ __('Nhập lại mật khẩu') }}</label>
                             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="form-group text-center">
                            <button id="btnSubmitres" class="btn btn-primary account-btn" type="submit">Đăng Kí</button>
                        </div>
                        <div class="text-center login-link">
                            Đã có tài khoản? <a href="{{route('login')}}">Đăng Nhập</a>
                        </div>
                    </form>
                </div>
			</div>
        </div>
    </div>
@endsection
@section('js')
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