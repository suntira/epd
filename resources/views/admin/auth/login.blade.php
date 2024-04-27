@extends('layout.app')
@section('title', 'Вход')
@section('content')
@include('partials.header')
<div class="container">
    <div class="section">
        <div class="auth_container">
                <form method="POST" id="login-form" action="{{ route("admin.login_process")}}">
                    <p class="p1">Добро пожаловать!</p>
                    @csrf
                    <div class="inp">
                        <div class="inp__div">
                        <label for="email">Почта</label>
                    <input name="email" type="text" placeholder="Email" />
                </div>
                    @error('email')
                    <p >{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="inp">
                        <div class="inp__div">
                        <label for="password">Пароль</label>
                        <input name="password" type="password" placeholder="" />
                        </div>
                        @error('password')
                        <p >{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        {{-- <a href="#" >Забыли пароль?</a> --}}
                    </div>
                    <button class="btn_red" type="submit">Войти</button>
                </form>
            </div>
        </div>
              </div>              
<link href="{{ asset('css/auth.css') }}" rel="stylesheet">
              @include('partials.footer')
              @endsection

           
