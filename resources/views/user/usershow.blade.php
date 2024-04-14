@extends('layout.app')
@section('title', 'Профиль')
@section('content')
@include('partials.header')
<div class="container">
    <div class="section">
       <h1>Профиль: {{ $user->username }}</h1>
      
       <p> {{ $user->profile }}</p>
       <p>О Себе: {{ $user->bio}}</p>
       @if($user->role_id === 2)
       <h2>Ваши уроки:</h2>
       {{-- <div class="profile_post_cont">
        @foreach($randomPosts as $post)
        @include("posts.partials.item", ["post" => $post])
         @endforeach
       </div> --}}
       @if ($randomPosts->isNotEmpty())
    <div class="profile_post_cont">
        @foreach($randomPosts as $post)
        @include("posts.partials.item", ["post" => $post])
         @endforeach
       </div>
@else
    <p>У автора нет уроков</p>
@endif
@endif
    </div>
</div>
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@include('partials.footer')
 @endsection