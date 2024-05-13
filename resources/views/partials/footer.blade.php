<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<footer>
    <div class="container_first">
        <div class="navigation">
            @guest("web")
            <a href="{{ route('admin.login') }} " class="{{ request()->is('admin/login') ? 'active' : '' }} footer-p">Администратор</a>
            @endguest
            @auth("web")
            <p href="" class="footer-p">Почта поддержки: laravel@laravel.com</p>
            @endauth
            <p class="footer-p">© Веб-сайт по обучению рисованию "Epd", 2024</p>
        </div>
    </div>
</footer>