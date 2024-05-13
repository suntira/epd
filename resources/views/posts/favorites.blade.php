@extends('layout.appjs')
@section('title', 'Уроки')
@section('content')
@include('partials.header')
<link href="{{ asset('css/post.css') }}" rel="stylesheet">
<div class="container">
    <div class="section">
        <a  href="{{ route('user.show') }}" class="btn_back1 like"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><path fill="currentColor" d="m4 10l-.354.354L3.293 10l.353-.354zm16.5 8a.5.5 0 0 1-1 0zM8.646 15.354l-5-5l.708-.708l5 5zm-5-5.708l5-5l.708.708l-5 5zM4 9.5h10v1H4zM20.5 16v2h-1v-2zM14 9.5a6.5 6.5 0 0 1 6.5 6.5h-1a5.5 5.5 0 0 0-5.5-5.5z"/></svg></a>
        @if ($favorites->isNotEmpty())
<div class="wrap" id="wrap">
    @foreach($favorites as $post)
    @include("posts.partials.item", ["post" => $post])
    @endforeach 
</div>
 {{-- {{$favorites->links()}}  --}}
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
 <p class="p_not_found favoriter_p-not-fount">у Вас нет избранных уроков</p>
 @endif
</div>
</div>
@include('partials.footer')
@endsection