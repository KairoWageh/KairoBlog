@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="registerTitle">Kairo Blog Register Form</h1>

    <div class="register-form">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="name" class="noColor">{{ __('Name') }}</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input id="name" type="text" class="form-control noBorder {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="noColor">{{ __('E-Mail Address') }}</label>

                <div class="group">
                    <i class="fas fa-envelope"></i>
                    <input id="email" type="email" class="form-control noBorder {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="noColor">{{ __('Password') }}</label>

                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input id="password" type="password" class="form-control noBorder {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password-confirm" class="noColor">{{ __('Confirm Password') }}</label>

                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input id="password-confirm" type="password" class="form-control noBorder" name="password_confirmation" required>
                </div>
            </div>
            <div class="form-group">
                <button type="submit">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
        <p class="login-p">Already registered?<a href="/" class="login"> Login</a></p>
    </div>
</div>
@endsection
