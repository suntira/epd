@extends('layout.app')
@section('title', "Шаги")
@section('content')
@include('partials.showheader')
<link href="{{ asset('css/postshow.css') }}" rel="stylesheet">
<div class="container">
    <div class="section">
<div class="post">
@foreach ($steps as $step)
<img class="img_title" src="{{$step->img_st}}">
<p class="description">{{$step->text_st}}</p>
@endforeach
{{ $steps->links() }}
</div>
</div>
</div>
@include('partials.showfooter')
@endsection