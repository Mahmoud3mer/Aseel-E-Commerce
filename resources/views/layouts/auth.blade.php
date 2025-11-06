<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- My CSS Code --}}
    <link rel="stylesheet" href="{{ asset('assets/css/myCss/style.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Caprasimo&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap');

        body {
            font-family: "Tajawal", sans-serif;
            margin: 0;
            background: linear-gradient(135deg, #495057, #343a40);
            /* background-color: #e9ecef; */
            color: #f28123;
        }

        .auth-container {
            width: 100vw !important;
            min-height: 100dvh !important;
            padding: 0;
            display: flex;
            position: relative;
        }

        .auth-image {
            flex: 4;
            position: relative;
        }

        .auth-form {
            flex: 3;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 10px;
            padding: 25px 20px;
        }

        @media screen and (max-width: 992px) {
            .auth-form {
                flex: 0;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                min-width: min(100% - 40px, 600px);
                background-color: #343a40a3;
                border-radius: 11px;
            }
        }

        .bg-color-glass {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
            background-color: #000000b0;
        }

        input {
            background-color: transparent !important;
            color: #fff !important;
            border: 1px solid #f28123 !important;
            margin-top: 5px;
        }

        input:focus {
            box-shadow: 0 0 5px #f28123 !important;
            border: 1px solid #f28123 !important;
        }

        .submit-btn {
            background-color: #f28123;
            width: 100%;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        .submit-btn:hover {
            background-color: #051922;
        }

        .btn-link {
            color: #f28123;
            margin-top: 10px;
        }
    </style>
</head>

<body style="overflow-x:hidden; overflow-y:auto">
    <div class="auth-container">
        <div class="auth-image" style="height: 100vh">
            <img src="{{ asset('assets/img/login.png') }}" class="w-100 h-100" alt="">
            <div class="bg-color-glass"></div>
        </div>

        @yield('content')
    </div>
</body>

</html>
