@extends('layout.appjs')
@section('title', 'Мои Уроки')
@section('content')
@include('partials.header')
<link href="{{ asset('css/post.css') }}" rel="stylesheet">
<div class="container">
    <div class="section">

        <a  href="{{ route('user.show') }}" class=""><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><path fill="currentColor" d="m4 10l-.354.354L3.293 10l.353-.354zm16.5 8a.5.5 0 0 1-1 0zM8.646 15.354l-5-5l.708-.708l5 5zm-5-5.708l5-5l.708.708l-5 5zM4 9.5h10v1H4zM20.5 16v2h-1v-2zM14 9.5a6.5 6.5 0 0 1 6.5 6.5h-1a5.5 5.5 0 0 0-5.5-5.5z"/></svg></a>
    
       
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
