@extends('layout.app')
@section('title', $post->name_post)
@section('content')
@include('partials.showheader')
<link href="{{ asset('css/postshow.css') }}" rel="stylesheet">
<div class="container">
    <div class="section">
<div class="post">
    <a  href="{{ route('posts.my') }}" class="btn_back like"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><path fill="currentColor" d="m4 10l-.354.354L3.293 10l.353-.354zm16.5 8a.5.5 0 0 1-1 0zM8.646 15.354l-5-5l.708-.708l5 5zm-5-5.708l5-5l.708.708l-5 5zM4 9.5h10v1H4zM20.5 16v2h-1v-2zM14 9.5a6.5 6.5 0 0 1 6.5 6.5h-1a5.5 5.5 0 0 0-5.5-5.5z"/></svg></a>
    <p class="p_main">{{$post->name_post}}</p>
    <img class="img_title" src="{{ asset('storage/' . $post->img_title) }}">
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
        <form action="{{route("step.showedit", $post->id)}}">
            <button type="submit" class="btn_red">Просмотреть урок</button>
        </form> 
        @endauth
        @guest("web")
        <form action="{{route("login")}}">
            <button type="submit" class="btn_red">Начать урок</button>
        </form> 
        @endguest
        <form action="{{ route('posts.edit', $post) }}" >
            <button type="submit" class=" btn_like like">Редактировать</button>
        </form> 
     
</div>
</div>
</div>
</div>
@include('partials.showfooter')
@endsection