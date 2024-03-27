<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> @yield('title')</title>
        <!-- Fonts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
      // Проверяем, есть ли сохраненное значение в sessionStorage
    const savedValue = sessionStorage.getItem('name_post');
    if (savedValue) {
        document.getElementById('name_post').value = savedValue;
    }

    // Функция для очистки поля и сохранения пустого значения в sessionStorage
    function clearInput() {
        document.getElementById('name_post').value = '';
        sessionStorage.setItem('name_post', ''); // Сохраняем пустое значение в sessionStorage
    }

    // Слушаем событие ввода и сохраняем значение в sessionStorage
    document.getElementById('name_post').addEventListener('input', function() {
        sessionStorage.setItem('name_post', this.value);
    });
        </script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body >
        @yield('content')
   
    </body>
</html>