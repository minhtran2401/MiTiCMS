@extends('auth.layout-auth')
@section('content')
<div class="main-wrapper account-wrapper">
    <div class="account-page">
        <div class="account-center">
            <div class="account-box">
                <form method="POST" action="{{ route('login') }}" class="form-signin">
                    @csrf
                    <div class="account-logo">
                        <a href="{{route('home')}}"><img src="assets/img/logo-dark.png" alt=""></a>
                    </div>
                  
                    <div class="form-group">
                        <label> Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group ">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Lưu tài khoản') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Quên mật khẩu ?') }}
                        </a>
                    @endif
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary account-btn">Đăng Nhập</button>
                    </div>
                    <div class="text-center register-link">
                        Không có tài khoản ? <a href="{{route('register')}}">Đăng Kí Ngay</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
