@extends('layout.app')
@section('title', 'Профиль')
@section('content')
@include('partials.header')
<div class="container">
    <div class="section">
       <h1>User Profile</h1>
      
       <p> {{ $user->profile }}</p>
       <p>Ник: {{ $user->username }}</p>
       <p>О Себе: {{ $user->bio}}</p>
       <!-- Другие данные пользователя -->
    </div>
</div>
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@include('partials.footer')
 @endsection