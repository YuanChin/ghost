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
    @livewireStyles
    @yield('styles')


    <title>@yield('title', 'Ghost') | Ghost 社群</title>
</head>
<body class="bg-gray-800">
    <div id="app">
        @include('layouts.header')
        
        @include('sweetalert::alert')
        <div class="container-fluid mt-4">
            @yield('content')
        </div>

        @include('layouts.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    @livewireScripts
    @yield('scripts')
</body>
</html>