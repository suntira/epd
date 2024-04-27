@extends('layout.appjs')
@section('title', 'Уроки')
@section('content')
@include('partials.header')
<link href="{{ asset('css/post.css') }}" rel="stylesheet">
<div class="container">
    <div class="section">
        <a  href="{{ route('user.show') }}" class="btn_back like"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><path fill="currentColor" d="m4 10l-.354.354L3.293 10l.353-.354zm16.5 8a.5.5 0 0 1-1 0zM8.646 15.354l-5-5l.708-.708l5 5zm-5-5.708l5-5l.708.708l-5 5zM4 9.5h10v1H4zM20.5 16v2h-1v-2zM14 9.5a6.5 6.5 0 0 1 6.5 6.5h-1a5.5 5.5 0 0 0-5.5-5.5z"/></svg></a>
        @if ($favorites->isNotEmpty())
<div class="wrap" id="wrap">
    @foreach($favorites as $post)
    @include("posts.partials.item", ["post" => $post])
    @endforeach 
</div>
 {{$favorites->links()}} 
 @else
 <p class="p_not_found favoriter_p-not-fount">у Вас нет избранных уроков</p>
 @endif
</div>
</div>
@include('partials.footer')
@endsection