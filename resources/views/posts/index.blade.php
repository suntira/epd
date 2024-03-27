@extends('layout.appjs')
@section('title', 'Уроки')
@section('content')
@include('partials.header')
<link href="{{ asset('css/post.css') }}" rel="stylesheet">
<div class="container">
    <div class="section">
        <div class="filter_cont">
            <div class="filter_cont_cl1">
       <form  id="fil_2" action="{{route('posts.index')}}" method="get">
                <div class="fil2_cont">
                <div class="fil">
                <label class="">Выберите Тип</label>
                <select name="type_id" id="type_id" class="">
                    <option value="">Не выбрано</option>
                    @foreach($types as $type)
                    <option value="{{ $type->id }}"  @if(request()->input('type_id') == $type->id) selected @endif>{{$type->name}}</option>
                    @endforeach
                </select>
                </div>
                <div class="fil">
                    <label class="">Выберите Категорию</label>
                    <select name="subject_id" class="">
                        <option value="">Не выбрано</option>
                        @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}" @if(request()->input('subject_id') == $subject->id) selected @endif>{{$subject->name}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="fil">
                        <label class="">Выберите Сложность</label>
                        <select name="levl_id" class="">
                            <option value="">Не выбрано</option>
                            @foreach($levls as $levl)
                            <option value="{{ $levl->id }}" @if(request()->input('levl_id') == $levl->id) selected @endif>{{$levl->name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                        <button id="search-btn"  type="submit" class="btn_red filt_btn">Применить фильты</button>
            </form>
            </div>
            <div class="f_cl_1">
                <div class="">
                    <form  id="fil_1" action="{{route('posts.index')}}" method="get">
                        <input  name="name_post" value="{{ request()->input('name_post') }}" type="text" class="in"  id="name_post"  placeholder="Название поста или описание"></input>
                        <button id="search-btn"  type="submit"class="btn_red btn_f1"><img src="img/search.svg" class="main_img" alt="поиск"></button>
                    </form>
                </div>
               <div class="">
                <form action="{{route('posts.index')}}">
                    <button id="search-btn"  type="submit"class="btn_red btn_f1"><img src="img/delete.svg" class="main_img" alt="удалить"></button>
                </form>
               </div>
            </div>
     
    </div>
<div class="wrap" id="wrap">
    @foreach($posts as $post)
    @include("posts.partials.item", ["post" => $post])
    @endforeach 
</div>
 {{$posts->withQueryString()->links()}} 
</div>
</div>
@include('partials.footer')
@endsection
