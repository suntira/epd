@extends('layout.app')
@section('title', 'Профиль')
@section('content')
@include('partials.header')
<div class="container">
    <div class="section">
        <div class="auth_container">
<form action="{{ route('posts.store') }}" id="create-post-form" method="post" enctype="multipart/form-data">
    <p class="p1">Создание поста</p>
    @csrf
    <div class="inp">
        <div class="inp__div">
            <label for="name_post">Название поста</label>
    <input type="text" name="name_post" placeholder="">
</div>
@error('name_post')
<p >{{ $message }}</p>
@enderror
</div>
<div class="inp">
    <div class="inp__div">
        <label for="description">Описание поста</label>
<input type="text" name="description" placeholder="">
</div>
@error('description')
<p >{{ $message }}</p>
@enderror
</div>
<div class="inp">
    <div class="inp__div">
    <label for="img_title">Главное изображение</label>
    <input type="file"  name="img_title" placeholder="Изображение">
</div>
@error('img_title')
<p >{{ $message }}</p>
@enderror
</div>
<div class="inp">
    <div class="inp__div">
    <label for="levl_id">Сложность</label>
    <select name="levl_id">
        @foreach ($levls as $levl)
            <option value="{{ $levl->id }}">{{ $levl->name}}</option>
        @endforeach
        </select>
    </div>
</div>
<div class="inp">
    <div class="inp__div">
    <label for="type_id">Тип</label>
    <select name="type_id">
        @foreach ($types as $type)
            <option value="{{ $type->id }}">{{ $type->name}}</option>
        @endforeach
        </select>
    </div>
</div>
<div class="inp">
    <div class="inp__div">
    <label for="subject_id">Категория</label>
    <select name="subject_id">
        @foreach ($subjects as $subject)
            <option value="{{ $subject->id }}">{{ $subject->name}}</option>
        @endforeach
        </select>
    </div>
</div>
    <!-- Другие поля поста -->
    <button type="submit" class="btn_red">Создать пост</button>
</form>
        </div>
    </div>
</div>
<link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@include('partials.footer')
 @endsection