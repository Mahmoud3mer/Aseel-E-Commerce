@extends('layouts.auth')

@section('title', 'التسجيل')

@section('content')
    <div class="col-md-6 col-12 order-1 md:order-2"
        style="display: flex; justify-content: center; align-items: center; height: 100vh; flex-direction: column;">
        <h1>التسجيل</h1>
        <form method="POST" action="{{ route('register.post') }}" class='w-100' style='padding-inline:15px;'>
            @csrf
            <div class="mb-3">
                <label>الاسم</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
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
            <div class="mb-3">
                <label>تأكيد كلمة المرور</label>
                <input type="password" name="password_confirmation" class="form-control"
                    value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                <button type="submit" class="btn submit-btn">التسجيل</button>
                {{-- <a href="{{ route('auth.google') }}" class="google-icon">
                        Google <img src="{{asset('google.png')}}" alt="">
                    </a> --}}
                <a href="{{ route('login') }}" class="btn btn-link">لديك حساب؟ تسجيل الدخول</a>
            </div>
        </form>
    </div>
@endsection
