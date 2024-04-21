@extends('layout.appjs')
@section('title', 'Уроки')
@section('content')
@include('partials.header')
<link href="{{ asset('css/post.css') }}" rel="stylesheet">
<div class="container">
    <div class="section">
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