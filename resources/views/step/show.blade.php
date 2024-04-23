@extends('layout.app')
@section('title', "Шаги")
@section('content')
@include('partials.showheader')
<link href="{{ asset('css/postshow.css') }}" rel="stylesheet">
<div class="container">
    <div class="section">
<div class="post">
    @if($steps->isEmpty())
    <p class="p_not_found favoriter_p-not-fount">Нет шагов</p>
@else
@foreach ($steps as $step)
<img class="img_title" src="{{$step->img_st}}">
<p class="description">{{$step->text_st}}</p>
@endforeach
{{ $steps->links() }}
<a href="{{route("posts.show", $step->post_id)}}" class="like btn_stop">Закночить урок</a>
@endif
</div>
</div>
</div>
@include('partials.showfooter')
@endsection