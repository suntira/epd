@extends('layout.app')
@section('title', 'Профиль')
@section('content')
@include('partials.header')
<div class="container">
    <div class="section">
       <h1>User Profile</h1>
      
       <p> {{ $user->profile }}</p>
       <p>Имя: {{ $user->name}}</p>
       <p>Ник: {{ $user->username }}</p>
       <p>О Себе: {{ $user->bio}}</p>
       <p>Роль: {{ $user->role->type }}</p>
       <a href="{{ route('user.edit') }}">Edit Profile</a>
       <!-- Другие данные пользователя -->
    </div>
</div>
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@include('partials.footer')
 @endsection