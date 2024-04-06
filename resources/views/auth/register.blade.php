@extends('layouts.app')

@section('content')
<div class="login">

    <form method="POST" action="{{ route('register') }}" class="login__form">
        @csrf
        <h1 class="login__title">Register</h1>
        <div class="login__content">

            <div class="login__box">
                <input type="text" name="name" class="login__input" id="login-name" placeholder=" " required>
                <label for="login-name" class="login__label">Name</label>
            </div>

            <div class="login__box">
                <input type="text" name="email" class="login__input" id="login-email" placeholder=" " required>
                <label for="login-email" class="login__label">Email</label>
            </div>

            <div class="login__box">
                <input type="text" name="password" class="login__input" id="login-password" placeholder=" " required>
                <label for="login-password" class="login__label">Password</label>
            </div>

            <div class="login__box">
                <input type="text" name="confirm-pass" class="login__input" id="login-confirm-pass" placeholder=" "
                    required>
                <label for="login-confirm-pass" class="login__label">Confirm Password</label>
            </div>
        </div>
        <button type="submit" class="login__button">Register</button>

        <div class="login__line"></div>
        <a href="#!" class="login__button login__google">
            <img src="{{ asset('static/assets/icons/google.svg') }}" class="google-link" alt="">
            Or sign in with Google</a>

        <!-- Liên kết Đăng nhập -->
        <p class="login__register">
            I have an account ? <a href="{{ route('login') }}">Login</a>
        </p>
    </form>
</div>

@endsection