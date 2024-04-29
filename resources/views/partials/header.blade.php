
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
                    <a  class="{{ request()->is('/') ? 'active' : '' }}" href="{{route("home")}}">Главная</a>
                    <a href="{{route("posts.index")}}" class="{{ request()->is('posts') ? 'active' : '' }}">Уроки</a>
                </div>
                <p class="nav-p-inf">étape pour dessiner</p>
                <div class="nav-profile-inf">
                    <input type="checkbox" id="burger">
                    <label for="burger" class="{{ request()->is('profile') ? 'active_label' : '' }}"></label>
                    <nav class="nav">
                        <ul>
                            @auth("web")
                            <li><a href="{{ route('user.show') }} " class="{{ request()->is('profile') ? 'active' : '' }}">Профиль</a></li>
                            <li><a href="{{ route('logout') }}">Выйти</a></li>
                            @endauth
                            @guest("web")
                            <li><a href="{{ route('login') }} " class="{{ request()->is('login') ? 'active' : '' }}">Войти</a></li>
                            <li><a href="{{ route("register") }}" class="{{ request()->is('register') ? 'active' : '' }}">Регистрация</a></li>
                            @endguest
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
