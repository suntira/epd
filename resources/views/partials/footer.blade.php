<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<footer>
    <div class="container_first">
        <div class="navigation">
            @guest("web")
            <a href="{{ route('admin.login') }} " class="{{ request()->is('admin/login') ? 'active' : '' }}">Администратор</a>
            @endguest
            @auth("web")
            <a href="" class="{{ request()->is('/profile') ? 'active' : '' }}">Чат с Администратором</a>
            @endauth
        </div>
    </div>
</footer>