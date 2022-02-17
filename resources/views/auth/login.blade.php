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

    <title>登入 | Ghost 社群</title>
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
                <!-- Login Form-->
                <div class="card border-0 rounded-none shadow-lg my-5">
                    <div class="row no-gutters">

                        <div class="col-md-7">
                            <img src="https://i0.hippopx.com/photos/740/19/598/dog-hovawart-black-pet-preview.jpg" class="w-100 h-100" alt="dog">
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
                            <div class="card-body m-3">
                                <div class="text-center h4 mb-4 text-blue-400">
                                    <p>登入Ghost會員</p>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                               name="email" value="{{ old('email') }}" required autocomplete="email"
                                               autofocus placeholder="請輸入您的信箱 …">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="current-password"
                                               placeholder="請輸入您的密碼 …">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}"
                                               name="captcha" required placeholder="請輸入驗證碼 …">
                                        <img class="mt-3 mb-2" src="{{ captcha_src('flat') }}"
                                             onclick="this.src='/captcha/flat?' + Math.random()" title="點擊圖片重新獲取驗證碼">
                                        @error('captcha')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __('輸入驗證碼有誤！') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('記住我') }}
                                            </label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block rounded-pill">
                                                {{ __('登入') }}
                                    </button>
                                </form>

                                <hr>

                                <div class="text-center">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link small" href="{{ route('password.request') }}">
                                            {{ __('忘記您的密碼?') }}
                                        </a>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <a class="btn btn-link small" href="{{ route('register') }}">創建帳號點我 !</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End -- Login Form-->
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>