@extends('layouts.auth')

@section('title', __('auth.login'))

@section('content')
    <div class="auth-form">
        <h1>{{ __('auth.login') }}</h1>

        @if (session('error'))
            <div class="alert alert-danger" style="margin-top: 15px;">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}" class='w-100' style='padding-inline:15px;'>
            @csrf
            <div class="mb-3">
                <label>{{ __('auth.email') }}</label>
                <input type="email" name="email" class="form-control"
                    value="{{ old('email', request()->cookie('remember_email')) }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>{{ __('auth.password') }}</label>
                <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3" style="text-align: center">
                <input type="checkbox" name="remember" class="form-check-input mx-2" {{ old('remember') ? 'checked' : '' }}>
                <label>{{ __('auth.remember_me') }}</label>
            </div>

            <div style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                <button type="submit" class="btn submit-btn">{{ __('auth.login') }}</button>
                <a href="{{ route('auth.google') }}" class="google-icon">
                    {{ __('auth.google') }} <img src="{{ asset('assets/google.png') }}" alt="">
                </a>
                <a href="{{ route('register') }}" class="btn btn-link">{{ __('auth.create_new_account') }}</a>
            </div>
        </form>
    </div>
@endsection
