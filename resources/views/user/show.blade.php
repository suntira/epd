@extends('layout.app')
@section('title', 'Профиль')
@section('content')
@include('partials.header')
<div class="container">
    <div class="section">
      <div class="profile">
      <div class="profile_cont">
        <div class="img-line">
          <div class="line"></div>
          <img src="{{$user->getImageURL()}}" alt="Profile Picture" class="img_profile">
        </div>
        <div class="cont_des">
          <div class="des profile__des">
            <p class="p_des">Имя:</p>
            <p class="p_name"> {{ $user->name}}</p>
           </div>
           <div class="des profile__des">
             <p class="p_des">Ник:</p>
             <p class="p_name"> {{ $user->username }}</p>
            </div>
            <div class="des profile__des">
             <p class="p_des">О Себе:</p>
             <p class="p_name"> {{ $user->bio}}</p>
            </div>
            <div class="des profile__des">
             <p class="p_des">Роль:</p>
             <p class="p_name"> {{ $user->role->type }}</p>
            </div>
            <form action="{{ route('user.edit') }}">
             <button type="submit" class="btn_red">Редактировать профиль</button>
         </form> 
           </div>
        </div>
      </div>
      <p class="post-name">Ваши избранные уроки:</p>
      <div class="profile_post_cont">
       
        @if ($favorites->isNotEmpty())
          @foreach($favorites as $post)
          @include("posts.partials.item", ["post" => $post])
          @endforeach 
         @else
         <p class="p_not_found">у Вас нет избранных уроков</p>
          @endif
        </div>
       <a class="btn_stop like" href="{{ route('posts.favorites', ['userId' => $user->id]) }}">Перейти на страницу избранные уроки</a>
         @if( $user->role_id === 2)
         <p class="post-name">Ваши уроки:</p>
         <div class="profile_post_cont">
          @if ($posts->isNotEmpty())
          @foreach($posts as $post)
          @include("posts.partials.item", ["post" => $post])
           @endforeach
           @else
           <p class="p_not_found">у Вас нет уроков</p>
           @endif
         </div>
         <a class="btn_stop like" href="{{ route('posts.my') }}">Перейти на страницу редактирования уроков</a>
            @endif
           
    </div>
</div>
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@include('partials.footer')
 @endsection