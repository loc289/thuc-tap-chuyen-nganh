@extends('layouts.app')
@section('content')
<div class="login">
    <form autocomplete="off" action="{{ route('login') }}" method="POST" class="login__form">
        @csrf
        <!-- Token CSRF để bảo mật -->
        <h1 class="login__title">Đăng nhập</h1>

        <div class="login__content">
            <!-- Box Nhập Số Điện Thoại -->

            <div class="login__box">
                <input type="text" name="phone" class="login__input" id="login-phone" placeholder=" " required>
                <label for="login-phone" class="login__label">Phone</label>
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
                <input type="checkbox" name="remember" class="login__check-input" id="login-check">
                <label for="login-check" class="login__check-label">Remember me</label>
            </div>

            <!-- Link Quên Mật Khẩu -->
            <a href="{{ route('password.request') }}" class="login__forgot">Forgot Password?</a>
        </div>

        <!-- Nút Đăng Nhập -->
        <button type="submit" class="login__button">Login</button>

        <!-- Liên kết Đăng Ký Tài Khoản Mới -->
        <p class="login__register">
            Don't have an account? <a href="{{ route('register') }}">Register</a>
        </p>
    </form>


</div>
@endsection