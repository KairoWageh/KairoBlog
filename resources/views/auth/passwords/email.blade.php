@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="resetEmail">{{ __('Reset Password') }}</h1>
    <div class="reset-password-form">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
                <label for="email" class="noColor">{{ __('E-Mail Address') }}</label>

                <div class="group">
                    <i class="fas fa-envelope"></i>
                    <input id="email" type="email" class="form-control noBorder {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" >
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
