@extends('layout.app')
@section('title', 'Редактирование профиля')
@section('content')
@include('partials.header')
<div class="container">
    <div class="section">
    <div class="auth_container">
    
       <form action="{{ route('user.update') }}" id="update-form" method="POST" enctype="multipart/form-data">
        <p class="p1">Редактирование профиля</p>
           @csrf
           <div class="inp">
            <div class="inp__div">
           <!-- Форма для редактирования данных пользователя -->
           <label for="profile">Аватрака:</label>
           <input type="file" id="profile" name="profile" value="{{ $user->profile }}">
           
        </div>
        @error('profile')
        <p >{{ $message }}</p>
        @enderror
    </div>
           <div class="inp">
            <div class="inp__div">
           <!-- Форма для редактирования данных пользователя -->
           <label for="name">Имя:</label>
           <input type="text" id="name" name="name" value="{{ $user->name }}">
        </div>
        @error('name')
        <p >{{ $message }}</p>
        @enderror
    </div>
    <div class="inp">
        <div class="inp__div">
           <label for="username">Ник:</label>
           <input type="text" id="username" name="username" value="{{ $user->username }}">
           @error('username')
           <p >{{ $message }}</p>
           @enderror
        </div>
    </div>
    <div class="inp">
        <div class="inp__div">
           <label for="bio">О себе:</label>
           <input type="text" id="bio" name="bio" value="{{ $user->bio }}">
        </div>
        @error('bio')
        <p >{{ $message }}</p>
        @enderror
    </div>
           <button class="btn_red" type="submit">Сохранить</button>
       </form>
    </div>              
</div>
</div>
<link href="{{ asset('css/auth.css') }}" rel="stylesheet">
          @include('partials.footer')
          @endsection