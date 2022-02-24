<nav class="navbar navbar-expand-lg text-gray-400 bg-gray-600 navbar-static-top sticky-top shadow">
    
    <!-- Branding Image -->
    <a class="navbar-brand text-gray-50" href="{{ url('/') }}">
        <div class="d-flex flex-row">
            <div class="d-flex align-items-center mr-2">
                <i class="fa-solid fa-skull-crossbones"></i>
            </div>
            <div class="d-flex">
                Ghost
            </div>
        </div>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa-solid fa-bars fa-2x text-gray-300"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav">
            @guest
            <!-- Authentication Links -->
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">登入</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">註冊</a></li>
            @else
            <li class="nav-item dropdown">
                <a class="nav-link text-gray-400 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://cdn.learnku.com/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/60/h/60" class="rounded-circle img-responsive img-circle" width="30px" height="30px">
                    <span class="ml-1">{{ Auth::user()->name }}</span>
                </a>
                <div class="user-menu dropdown-menu bg-gray-700 mt-1" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-gray-50" href="{{ route('users.show', Auth::id()) }}">
                        <i class="far fa-user mr-2"></i>
                        個人中心
                    </a>
                    <a class="dropdown-item text-gray-50" href="{{ route('users.edit', Auth::id()) }}">
                        <i class="far fa-edit mr-2"></i>
                        編輯資料
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" id="logout" href="#">
                        <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('您確定要退出嗎？');">
                        {{ csrf_field() }}
                        <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                        </form>
                    </a>
                </div>
            </li>
            @endguest
        </ul>
    </div>
</nav>