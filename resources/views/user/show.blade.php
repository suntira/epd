@extends('layout.app')
@section('title', 'Профиль')
@section('content')
@include('partials.header')
<div class="container">
    <div class="section">
       <h1>User Profile</h1>
      <img src="{{ $user->profile }}" alt="">
       <p>Имя: {{ $user->name}}</p>
       <p>Ник: {{ $user->username }}</p>
       <p>О Себе: {{ $user->bio}}</p>
       <p>Роль: {{ $user->role->type }}</p>
       <a href="{{ route('user.edit') }}">Edit Profile</a>
       <!-- Другие данные пользователя -->
       @if( $user->role_id === 2)
       <h2>Ваши уроки:</h2>
       <div class="profile_post_cont">
        @if ($posts->isNotEmpty())
        @foreach($posts as $post)
        @include("posts.partials.item", ["post" => $post])
         @endforeach
         @else
         <p>у Вас нет уроков</p>
         @endif
         
       </div>
       {{$posts->withQueryString()->links()}} 
          @endif

    </div>
</div>
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@include('partials.footer')
 @endsection