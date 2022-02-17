<nav class="navbar navbar-expand-lg text-gray-400 bg-gray-600 navbar-static-top sticky-top shadow">
    <!-- Branding Image -->
    <a class="navbar-brand text-gray-50" href="{{ url('/') }}"><i class="fa-solid fa-skull-crossbones mr-2"></i>Ghost</a>
        
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav">
            <!-- Authentication Links -->
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">登入</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">註冊</a></li>
        </ul>
    </div>
</nav>