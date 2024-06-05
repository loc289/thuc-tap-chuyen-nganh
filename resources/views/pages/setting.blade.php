@extends('welcome')

@section('content')
<div class="login">
    <style>
        .login__label {
            position: initial;
            color: #000;
            padding: 0;
        }
    </style>
    <form method="POST" action="{{ route('web.update-profile') }}" class="login__form">
        @csrf
        <h1 class="login__title">Cập nhật thông tin</h1>
        <div class="login__content">

            <div class="login__box">
                <label for="login-name" class="login__label">Họ và tên</label>
                <input value="{{$user->name}}" type="text" name="name" class="login__input" id="login-name" placeholder=" " required>
            </div>

            <div class="login__box">
                <label for="login-email" class="login__label">Email</label>
                <input value="{{$user->email}}" type="text" name="email" class="login__input" id="login-email" placeholder=" " required>
            </div>

            <div class="login__box">
                <label for="login-username" class="login__label">Tên đăng nhập</label>
                <input value="{{$user->username}}" type="text" name="username" class="login__input" id="login-username" placeholder=" " required>
            </div>

            <div class="login__box">
                <label for="login-password" class="login__label">Mật khẩu</label>
                <input value="" type="password" name="password" class="login__input" id="login-password" placeholder=" " required>
            </div>
        </div>
        <button type="submit" class="login__button">Cập nhật</button>
    </form>
</div>

@endsection
