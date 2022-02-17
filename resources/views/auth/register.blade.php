<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/animation.css') }}">

    <title>會員註冊 | Ghost 社群</title>
</head>
<body class="bg-gray-900">
    <div class="container">
        <!---remove custom style-->
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="row justify-content-center">
            <div class="col-md-10">

                <!-- Register_Form start-->
                <div class="card border-0 rounded-none shadow-lg my-5">
                    <div class="row no-gutters">

                        <div class="col-md-7">
                            <img src="https://i0.hippopx.com/photos/823/780/947/dog-the-most-obvious-labrador-black-preview.jpg" class="w-100 h-100" alt="dog">
                            <!-- remove custom style -->
                            <ul class="circles">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                        </div>

                        <div class="col-md-5">
                            <div class="card-body m-2">
                                <div class="text-center h4 mb-4 text-blue-400">
                                    <p>註冊成為Ghost會員</p>
                                </div>
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name" value="{{ old('name') }}" required autofocus placeholder="請輸入您要註冊的姓名 …">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" value="{{ old('email') }}" required placeholder="請輸入您要註冊的信箱 …">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password" required placeholder="請輸入您要註冊的密碼 …">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control"
                                            name="password_confirmation" required
                                            placeholder="請再一次輸入您要註冊的密碼 …">
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}"
                                               name="captcha" required placeholder="請輸入驗證碼 …">
                                        <img class="mt-3 mb-2" src="{{ captcha_src('flat') }}"
                                            onclick="this.src='/captcha/flat?' + Math.random()" title="點擊圖片重新獲取驗證碼">
                                        @if ($errors->has('captcha'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('captcha') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block rounded-pill">
                                        {{ __('註冊') }}
                                    </button>

                                </form>
                                <div class="text-center mt-2">
                                    <a class="small btn-link" href="{{ route('login') }}">已經有帳號了嗎？ 點我登入！</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Register_form end -->

            </div>
        </div>
        
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>