@extends('layout.app')
@section('title', 'Профиль')
@section('content')
@include('partials.header')
<div class="container">
    <div class="section">
        <div class="auth_container">
 <a  href="{{ route('posts.showedit', ['id' => $post->id]) }}" class="btn_back like"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><path fill="currentColor" d="m4 10l-.354.354L3.293 10l.353-.354zm16.5 8a.5.5 0 0 1-1 0zM8.646 15.354l-5-5l.708-.708l5 5zm-5-5.708l5-5l.708.708l-5 5zM4 9.5h10v1H4zM20.5 16v2h-1v-2zM14 9.5a6.5 6.5 0 0 1 6.5 6.5h-1a5.5 5.5 0 0 0-5.5-5.5z"/></svg></a>  
<form action="{{ route('posts.update', $post) }}" method="POST" id="update-post-form" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
<div class="inp_container">
<div class="inp__div">
    <label for="name_post">Название поста</label>
    <input type="text" name="name_post" value="{{ $post->name_post }}">
</div>
<div class="inp__div">
    <label for="img_title ">Изображение поста</label>
    <input type="file" name="img_title">
    @if($post->img_title)
    <img src="{{ asset('storage/' . $post->img_title) }}" alt="img_title" class="img_post">
@endif
</div>
@error('img_title')
<p >{{ $message }}</p>
@enderror
</div>
   


    {{-- Поля для редактирования связанных шагов --}}
    @foreach ($post->steps as $step)
    <div class="inp_container">
        <div class="inp__div">
        <label for="steps[{{ $step->id }}][text_st]">Текст Шагa № {{$step->order}}</label>
        <input type="text" name="steps[{{ $step->id }}][text_st]" value="{{ $step->text_st }}">
        </div>
        <div class="inp__div">
            <label for="steps[{{ $step->id }}][img_st]">Изображение Шагa № {{$step->order}}</label>
            <input type="file" name="steps[{{ $step->id }}][img_st]" value="{{ $step->img_st }}">
            @if($post->img_title)
            <img src="{{ asset('storage/' . $step->img_st) }}" alt="img_title" class="img_post">
        @endif
        </div>
    </div>
     
        {{-- другие поля для шагов --}}
    @endforeach
    <button id="add-step-btn" class="btn_red" type="button">Добавить Шаг</button>
    <button class="btn_red" type="submit">Сохранить изменения</button>
</form>
<form  id="delete"  action="{{ route('posts.destroy', $post) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit"  class="btn_red option center">Удалить Пост</button>
</form>
</div>
</div>
</div>
<link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@include('partials.footer')
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('add-step-btn').addEventListener('click', function () {
            addStepForm();
        });
    });

    function addStepForm() {
        var lastStepOrder = {{ $post->steps->isEmpty() ? 0 : $post->steps->last()->order }};
        var newOrder = lastStepOrder + 1;

        var formContainer = document.createElement('div');
        formContainer.className = 'inp_container';
        formContainer.innerHTML = `
            <div class="inp__div">
                <label for="new-step-text">Текст Шага №${newOrder}</label>
                <input type="text" name="new_steps[${newOrder}][text_st]" id="new-step-text">
            </div>
            <div class="inp__div">
                <label for="new-step-img">Изображение Шага №${newOrder}</label>
                <input type="file" name="new_steps[${newOrder}][img_st]" id="new-step-img">
            </div>
        `;

        // Добавляем созданную форму перед кнопкой "Сохранить изменения"
        var submitButton = document.querySelector('#update-post-form button[type="submit"]');
        submitButton.parentNode.insertBefore(formContainer, submitButton);
    }
</script>