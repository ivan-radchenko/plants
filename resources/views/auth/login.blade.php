@extends('layouts.main')

@section('content')
    <link href="{{ asset('css/auth/login.css') }}" rel="stylesheet">
    <div class="wrapper">
        <form class="form" action="{{ route('login') }}" method="post">
            @csrf
            @if (session('status'))
                <span class="status">{{ session('status') }}</span>
            @endif
            <div class="email form-item">
                <label for="email">Email</label>
                <input class="form-input" type="email" name="email" id="email" value="{{old('email')}}">
                @error('email')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="password form-item">
                <div class="password-item">
                    <label for="password">Пароль</label>
                    <svg id="show" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                    </svg>
                </div>
                <input class="form-input" type="password" name="password" id="password" value="{{old('password')}}">
                <div class="remember-wrapper">
                    <div class="checkbox-wrapper">
                        <label for="remember">Запомнить меня</label>
                        <input type="checkbox" id="remember" name="remember" value="true">
                    </div>
                    <a class="forgot-password" href="{{route('password.request')}}">Забыли пароль?</a>
                </div>
                @error('password')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <button class="button" type="submit">Войти</button>
        </form>
    </div>

    <script>
        document.getElementById('show').addEventListener('click', event => {
            const x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        })
    </script>
@endsection
