<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> @yield('title')</title>
        <!-- Fonts -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/showstyle.css') }}" rel="stylesheet">
        <link href="{{ asset('css/pag.css') }}" rel="stylesheet">
    </head>
    <body >
        <header>
            <div class="container_first">
                <div class="navigation_admin">
                    <div class="nav-main-inf_admin">
                        <a href="{{route("admin.posts.index")}} " class="{{ request()->is('admin/posts') ? 'active' : '' }}">Новые посты</a>
                        <a href="{{route("admin.users.index")}}" class="{{ request()->is('admin/users') ? 'active' : '' }}">Пользователи</a>
                        <a href="{{route("admin.comments.index")}}" class="{{ request()->is('admin/comments') ? 'active' : '' }}">Комментарии</a>
                    </div>
                    <div class="nav-menu-inf">
                        <input type="checkbox" id="burger">
                        <label for="burger" class="icon"></label>
                        <nav class="nav">
                            <ul>
                                @auth("admin")
                                <a href="{{route("admin.posts.index")}} " class="{{ request()->is('admin/posts') ? 'active' : '' }}">Новые посты</a>
                                <a href="{{route("admin.users.index")}}" class="{{ request()->is('admin/users') ? 'active' : '' }}">Пользователи</a>
                                <a href="{{route("admin.comments.index")}}" class="{{ request()->is('admin/comments') ? 'active' : '' }}">Комментарии</a>
                                <a href="{{ route('admin.logout') }}">Выйти</a>
                                @endauth
                        
                            </ul>
                        </nav>
                    </div>
                    <p class="nav-p-inf">étape pour dessiner</p>
                    <div class="nav-main-inf">
                    <a href="{{ route('admin.logout') }}">Выйти</a>
                    
                </div>
                </div>
            </div>
        </header>
    
        @yield('content')
  
        <footer>
            <div class="container_first">
                <div class="navigation">
                    @guest("admin")
                    <a href="{{ route('admin.login') }} " class="{{ request()->is('admin/login') ? 'active' : '' }} footer-p">Администратор</a>
                    @endguest
                    @auth("admin")
                    <p  class="footer-p">Почта поддержки: laravel@laravel.com</p>
                    @endauth
                    <p class="footer-p">© Веб-сайт по обучению рисованию "Epd", 2024</p>
                </div>
            </div>
        </footer>
    </body>
</html>