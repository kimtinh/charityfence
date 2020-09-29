<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light navbar-kindmate">
        <div class="container">
            <!-- <a class="navbar-brand big" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a> -->
            <a class="navbar-brand logo big" href="{{ url('/') }}"><img src="{{asset('images/logo.png')}}" width="100%" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('view.explore')}}">Các chiến dịch</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('view.articles')}}">Tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('view.about')}}">Về chúng tôi</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold text-primary" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" href="{{ route('register') }}">{{ __('Tạo tài khoản') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold text-primary" href="{{ route('view.articles.create') }}">{{ __('Tạo tin tức') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold text-primary" href="{{ route('view.campaign.create') }}">{{ __('Tạo chiến dịch') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(auth()->user()->is_admin != 1)
                            <a class="dropdown-item" href="{{ route('view.profile', Auth()->user()->id) }}">
                                {{ __('Trang cá nhân') }}
                            </a>

                            <a class="dropdown-item border-bottom" href="{{ route('view.change-password') }}">
                                {{ __('Đổi mật khẩu') }}
                            </a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Đăng xuất') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>