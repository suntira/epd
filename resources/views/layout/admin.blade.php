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
    </head>
    <body >
        <header>
            <div class="container_first">
                <div class="navigation">
                    <div class="nav-main-inf">
                        <a href="{{route("admin.posts.index")}} " class="{{ request()->is('admin/posts') ? 'active' : '' }}">Новые посты</a>
                        <a href="" class="{{ request()->is('admin/users') ? 'active' : '' }}">Пользователи</a>
                   
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
                    cvfgdxf
                </div>
            </div>
        </footer>
    </body>
</html>