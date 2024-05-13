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
    @if ($posts->isNotEmpty())
        <div class="wrap" id="wrap">
            @foreach($posts as $post)
            @include("posts.partials.item", ["post" => $post])
            @endforeach 
        </div>
         {{-- {{$posts->withQueryString()->links()}}  --}}
           {{-- начало --}}
@php
$currentPage = $posts->currentPage();
$lastPage = $posts->lastPage();
// Создаем массив с номерами страниц
$pages = [];
// Добавляем троеточие перед активной страницей, если есть страницы до
if ($currentPage > 1) {
    $pages[] = '...';
}
// Добавляем активную страницу
$pages[] = $currentPage;
// Добавляем троеточие после активной страницы, если есть страницы после
if ($currentPage < $lastPage) {
    $pages[] = '...';
}
// Находим количество страниц до и после активной страницы
$pagesBefore = $currentPage - 1;
$pagesAfter = $lastPage - $currentPage;
// Находим общее количество страниц
$totalPages = $lastPage;
// Формируем информацию о текущей странице
$currentPageInfo = "Страница $currentPage из $totalPages";
@endphp
<nav class="pag_nav">
<div class="pag_nav_container">
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($posts->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">&lsaquo;</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $posts->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif
        {{-- Pagination Elements --}}
        @foreach ($pages as $page)
            @if ($page == $currentPage)
                <li class="page-item active" aria-current="page">
                    <span class="page-link">{{ $page }}</span>
                </li>
            @elseif ($page == '...')
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">{{ $page }}</span>
                </li>
            @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($posts->hasMorePages())
            <li class="page-item">
                <a class="page-link {{ request()->is('posts') ? 'active' : '' }}" href="{{ $posts->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true">&rsaquo;</span>
            </li>
        @endif
    </ul>
    <div class="pagination-info">
        {{ $currentPageInfo }}
    </div>
</div>

</nav>
{{-- конец --}}
    @else 
        <p class="p_not_found favoriter_p-not-fount">По вашему запросу ничего не найдено</p>
    
    @endif
</div>
</div>
@include('partials.footer')
@endsection
