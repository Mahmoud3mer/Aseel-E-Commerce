@extends('layouts.auth')

@section('title', __('auth.register'))

@section('content')
    <div class="auth-form">
        <h1>{{ __('auth.register') }}</h1>
        <form method="POST" action="{{ route('register.post') }}" class='w-100' style='padding-inline:15px;'>
            @csrf
            <div class="mb-3">
                <label>{{ __('auth.name') }}</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>{{ __('auth.email') }}</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
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
            <div class="mb-3">
                <label>{{ __('auth.confirm_pass') }}</label>
                <input type="password" name="password_confirmation" class="form-control"
                    value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                <button type="submit" class="btn submit-btn">{{ __('auth.register') }}</button>
                {{-- <a href="{{ route('auth.google') }}" class="google-icon">
                        Google <img src="{{asset('google.png')}}" alt="">
                    </a> --}}
                <a href="{{ route('login') }}" class="btn btn-link">{{ __('auth.have_an_account') }} {{ __('auth.login') }}</a>
            </div>
        </form>
    </div>
@endsection
