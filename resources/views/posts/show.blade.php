@extends('layout.app')
@section('title', $post->name_post)
@section('content')
@include('partials.showheader')
<link href="{{ asset('css/postshow.css') }}" rel="stylesheet">
<div class="container">
    <div class="section">
<div class="post">
    <p class="p_main">{{$post->name_post}}</p>
    <img class="img_title" src="{{$post->img_title}}">
    <p class="description">{{$post->description}}</p>
    <div class="cont_des">
        <div class="des">
            <p class="p_name">Категория:</p>
            <p class="p_des">{{$post->subjects->name}}</p>
        </div>
        <div class="des">
            <p class="p_name">Тип:</p>
            <p class="p_des">{{$post->types->name}}</p>
        </div>
        <div class="des">
            <p class="p_name">Уровень:</p>
            <p class="p_des">{{$post->levls->name}}</p>
        </div>
        <div class="des">
            <p class="p_name">Автор:</p>
            <p ><a class="des_a p_des" href="{{ route('user.usershow', ['id' => $post->users->id]) }}">{{ $post->users->username }}</a></p>
           {{-- <p  class="p_des">{{ $post->users->username }}</p> --}}
        </div>
    </div>
    <div class="btn">
    @auth("web")
    <form action="{{route("step.show", $post->id)}}">
        <button type="submit" class="btn_red">Начать урок</button>
    </form> 
    @endauth
    @guest("web")
    <form action="{{route("login")}}">
        <button type="submit" class="btn_red">Начать урок</button>
    </form> 
    @endguest
    <a class="like" href="">Добавить в избранное</a>
</div>
</div>
</div>
</div>
@include('partials.showfooter')
@endsection