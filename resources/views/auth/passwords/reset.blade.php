@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="resetPassword">{{ __('Reset Password') }}</h1>
    <div class="reset-password-form">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
                <label for="email" class="noColor">{{ __('E-Mail Address') }}</label>
                <div class="group">
                    <i class="fas fa-envelope"></i>
                    <input id="email" type="email" class="form-control noBorder {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="noColor">{{ __('Password') }}</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input id="password" type="password" class="form-control noBorder {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group ">
                <label for="password-confirm" class="noColor">{{ __('Confirm Password') }}</label>

                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input id="password-confirm" type="password" class="form-control noBorder" name="password_confirmation" required>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection