@extends('layout.admin')
@section('title', "Шаги")
@section('content')
<link href="{{ asset('css/postshow.css') }}" rel="stylesheet">
<div class="container">
    <div class="section">
<div class="post">
    
    @if($steps->isEmpty())
    <p class="p_not_found favoriter_p-not-fount">Нет шагов</p>
@else
@foreach ($steps as $step)
<img class="img_title" src=" {{asset('storage/' .$step->img_st)}}">
<p class="description">{{$step->text_st}}</p>
@endforeach
{{-- {{ $steps->links() }} --}}
{{-- начало --}}
@php
    $currentPage = $steps->currentPage();
    $lastPage = $steps->lastPage();
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
            @if ($steps->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $steps->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
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
            @if ($steps->hasMorePages())
                <li class="page-item">
                    <a class="page-link {{ request()->is('posts') ? 'active' : '' }}" href="{{ $steps->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
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
<a href="{{route("admin.posts.index")}}"  class="like btn_stop">Закночить урок</a>
@endif
</div>
</div>
</div>
@endsection
