@extends('layout.appjs')
@section('title', 'Мои Уроки')
@section('content')
@include('partials.header')
<link href="{{ asset('css/post.css') }}" rel="stylesheet">
<div class="container">
    <div class="section">
        <div class="wrap" id="wrap">
        <form action="{{route('posts.create')}}" id="form_create_btn">
            <button id="search-btn"  type="submit"class="btn_create">+</button>
        </form>
    @if ($posts->isNotEmpty())
        
            @foreach($posts as $post)
            @include("posts.partials.itemedit", ["post" => $post])
            @endforeach 
        </div>
         {{$posts->links()}} 
    @else 
        <p class="p_not_found favoriter_p-not-fount">Создайте пост</p>
  
    @endif

</div>
</div>
@include('partials.footer')
@endsection
