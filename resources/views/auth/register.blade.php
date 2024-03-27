@extends('layout.app')
@section('title', 'Регистрация')
@section('content')
@include('partials.header')
<div class="container">
    <div class="section">
        <div class="auth_container">
                <form id="form-signup" action="{{ route("register_process")}}" method="POST">
                    @csrf
                    <p class="p1">Добро пожаловать!</p>
                    <div class="inp">
                        <div class="inp__div">
                        <label for="name">ФИО</label>
                        <input name="name" type="text" placeholder="" />
                        </div>
                        @error('name')
                        <p >{{ $message }}</p>
                        @enderror
                        </div>
                    <div class="inp">
                        <div class="inp__div">
                            <label for="username">Имя пользователя</label>
                            <input name="username" type="text" placeholder="" />  
                        </div>
                    @error('username')
                    <p >{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="inp">
                    <label for="email">Почта</label>
                    <input name="email" type="text" placeholder="" />
                    @error('email')
                    <p >{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="inp">
                        <label for="role">Роль</label>
                        <select name="role_id">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->type}}</option>
                            @endforeach
                            </select>
                        </div>
                    <div class="inp">
                        <label for="password">Пароль</label>
                        <input name="password" type="password" placeholder="" />
                        @error('password')
                        <p >{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="inp">
                        <label for="password_confirmation">Подтверждение пароля</label>
                        <input name="password_confirmation" type="password" placeholder="" />
                        @error('password_confirmation')
                        <p >{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <a href="{{route("login")}}" >Есть аккаунт?</a>
                    </div>
                    <button class="btn_red" type="submit">Зарегистрироваться</button>
                </form>
            </div>
        </div>
              </div>
                      
    </div>
</div>
</div>
<link href="{{ asset('css/auth.css') }}" rel="stylesheet">
              @include('partials.footer')
              @endsection