@extends('layouts.app_web')
@section('content')
<div class="login" data-bg="{{ asset('static/assets/imgs/bg-login.webp') }}">

    <form autocomplete="off" action="{{ route('web.post-login') }}" method="POST" class="login__form">
        @csrf
        <!-- Token CSRF để bảo mật -->
        <h1 class="login__title">Login</h1>

        <div class="login__content">
            @if (Session::has('error'))
            <p class="text-danger">{{ Session::get('error') }}</p>
            @endif
            <!-- Box Nhập Số Điện Thoại -->

            <div class="login__box">
                <input type="text" name="login" class="login__input" id="login-phone" placeholder=" " required>
                <label for="login-phone" class="login__label">Username</label>
            </div>

            <!-- Box Nhập Mật Khẩu -->
            <div class="login__box">
                <input type="password" name="password" class="login__input" id="login-pass" placeholder=" " required>
                <label for="login-pass" class="login__label">Password</label>
                <i class="ri-eye-off-line login__eye" id="login-eye"></i>
            </div>
        </div>

        <!-- Checkbox Ghi Nhớ Tài Khoản -->
        <div class="login__check">
            <div class="login__check-group">
                <input type="checkbox" id="switch" name="remember" /><label class="toggle" for="switch">Toggle</label>
                <label for="login-check" class="login__check-label">Remember me</label>
            </div>

            <!-- Link Quên Mật Khẩu -->
            <a href="{{ route('password.request') }}" class="login__forgot">Forgot Password?</a>
        </div>

        <!-- Nút Đăng Nhập -->
        <button type="submit" class="login__button">Login</button>
        <div class="login__line"></div>
        <a href="{{ route('web.login-google') }}" class="login__button login__google">
            <img src="{{ asset('static/assets/icons/google.svg') }}" class="google-link" alt="">
            Or sign in with Google</a>


        <!-- Liên kết Đăng Ký Tài Khoản Mới -->
        <p class="login__register">
            Don't have an account? <a href="{{ route('web.register') }}">Register</a>
        </p>
    </form>


</div>
@endsection
