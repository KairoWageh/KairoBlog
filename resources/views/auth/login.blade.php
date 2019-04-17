@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="loginTitle">Kairo Blog Login Form</h1>
    <div class="login-form">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email" class="noColor">{{ __('E-Mail') }}</label>
                <div class="group">
                    <i class="fas fa-envelope"></i>
                    <input id="email" type="email" class="noBorder {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="noColor">{{ __('Password') }}</label>

                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input id="password" type="password" class=" noBorder{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                </div>
            </div>
            <div class="form-group forgot">
                @if (Route::has('password.request'))
                    <a  href="{{ route('password.request') }}">
                        {{ __('Forgot Password?') }}
                    </a>
                @endif
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
            <div class="form-group">
                <button type="submit">
                    {{ __('Login') }}
                </button>
            </div>
        </form>
        <p class="register-p">Don't have an account?<a href="/register" class="register"> Register</a></p>
    </div>
</div>
@endsection
