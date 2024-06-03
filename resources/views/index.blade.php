@extends('layout.app')
@section('title', 'Главная страница')
@section('content')
@include('partials.header')
<div class="container">
    <div class="section">
        <div class="main_content">
            <div class="img-line">
                <div class="line"></div>
                <img src="img/main.png" class="main_img" alt="картинка главная">
            </div>
            <div class="main_text_cont">
                <div class="main_text">
                    <p class="p1">Вы не умеете рисовать? Кажется, вам давно пора научиться этому!</p>
                    @guest("web") 
                    <p>Пошаговые уроки прямо на сайте в режиме онлайн. Множество советов для практики и развития вашего творчества. </p>
                     @endguest
                    @auth("web")
                     @foreach ($phrases as $phrase)
                    <p>{{ $phrase->description}}</p>
                @endforeach 
                   @endauth
                </div>
                <div class="main_button">
                    @guest("web")
                    <form action="{{ route("register") }}">
                        <button type="submit" class="btn_red">Регистрация</button>
                    </form>
                    <form action="{{ route('login') }}">
                        <button class="btn_white"type="submit" >Вход</button>
                    </form>
                    @endguest
                    @auth("web")
                    <form action="{{ route('posts.index') }}">
                        <button type="submit" class="btn_red">Перейти к урокам</button>
                    </form>
                    <form action="{{ route('user.show') }}">
                        <button class="btn_white"type="submit" >Профиль</button>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@include('partials.footer')
 @endsection