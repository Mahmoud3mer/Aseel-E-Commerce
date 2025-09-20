@extends('layouts.auth')

@section('title', 'تسجيل الدخول')

@section('content')
    <div class="col-md-6 col-12 order-1 md:order-2"
        style="display: flex; justify-content: center; align-items: center; height: 100vh; flex-direction: column;">

        <h1>تسجيل الدخول</h1>

        @if (session('error'))
            <div class="alert alert-danger" style="margin-top: 15px;">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}" class='w-100' style='padding-inline:15px;'>
            @csrf
            <div class="mb-3">
                <label>البريد الإلكتروني</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>كلمة المرور</label>
                <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3" style="text-align: center">
                <input type="checkbox" name="remember" class="form-check-input mx-2" {{ old('remember') ? 'checked' : '' }}>
                <label>تذكرني</label>
            </div>

            <div style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                <button type="submit" class="btn submit-btn">تسجيل الدخول</button>
                <a href="{{ route('auth.google') }}" class="google-icon">
                    Google <img src="{{asset('assets/google.png')}}" alt="">
                </a>
                <a href="{{ route('register') }}" class="btn btn-link">إنشاء حساب جديد</a>
            </div>
        </form>
    </div>
@endsection
