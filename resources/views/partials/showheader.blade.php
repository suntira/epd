
        <link href="{{ asset('css/showstyle.css') }}" rel="stylesheet">
        {{-- @if (Route::has('login'))
            <div >
                @auth
                    <a href="{{ url('/home') }}" >Home</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" >Register</a>
                    @endif
                @endauth
            </div>
        @endif --}}

    <header>
        <div class="container_first">
            <div class="navigation">
                <div class="nav-main-inf">
                    <a href="{{route("home")}}">Главная</a>
                    <a href="{{route("posts.index")}}">Уроки</a>
                </div>
                <p class="nav-p-inf">étape pour dessiner</p>
                <div class="nav-profile-inf">
                    <input type="checkbox" id="burger">
                    <label for="burger"></label>
                    <nav class="nav">
                        <ul>
                            @auth("web")
                            <li><a href="{{ route('user.show') }}">Профиль</a></li>
                            <li><a href="{{ route('logout') }}">Выйти</a></li>
                            @endauth
                            @guest("web")
                            <li><a href="{{ route('login') }}">Войти</a></li>
                            <li><a href="{{ route("register") }}">Регистрация</a></li>
                            @endguest
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
