@extends('auth.layout-auth')
@section('content')
<div class="main-wrapper account-wrapper">
    <div class="account-page">
        <div class="account-center">
            <div class="account-box">
                <form class="form-signin" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="account-logo">
                        <a href="{{route('index')}}"><img src="{{asset('assets')}}/img/logo-dark.png" alt=""></a>
                    </div>
                    <div class="form-group">
                        <label for="email" >{{ __('Địa Chỉ Email') }}</label>

                          
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary account-btn" type="submit">Gửi Mã </button>
                    </div>
                    <div class="text-center register-link">
                        <a href="{{route('login')}}">Vê Đăng Nhập</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection