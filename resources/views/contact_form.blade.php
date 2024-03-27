@extends('layout.app')
@section('title', 'Связь с Нами')
@section('content')
@include('partials.header')
<div>
    <div>
        <h1>Свяжитесь с нами</h1>
        <form method="POST" action="{{ route("contact_form_process")}}">
            @csrf
            <input name="email" type="text" placeholder="Email">
            @error('email')
            <p >{{ $message }}</p>
            @enderror

            <input name="text" type="text" placeholder="Сообщение">
            @error('text')
            <p >{{ $message }}</p>
            @enderror
            
            <button type="submit">Написать</button>
        </form>
    </div>
</div>
@endsection