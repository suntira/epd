@extends('layout.admin')
@section('title', 'Админ панель.Посты')
@section('content')
<div class="container">
    <div class="admin-section">
        @if($posts->isEmpty())
        <p class="p_not_found favoriter_p-not-fount">Нет новых постов</p>
    @else
        <table cellpadding="5" cellspacing="0">
            <thead>
                <th class="th">Названия поста</th>
                <th class="th">Решение</th>
              </tr>
            </thead>
          
            @foreach($posts as $post)
                <tr>
                    <td class="td1"><a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="a">{{$post->name_post}}</a></td>
                    <td  class="td2" >
                    <form action="{{ route('admin.posts.accept', ['id' => $post->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="a">Принять</button>
                    </form>
                    <form action="{{ route('admin.posts.reject', ['id' => $post->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="no">Отклонить</button>
                    </form>
                </td>
                </tr>
        @endforeach
    </table>
        {{-- {{ $posts->links() }} --}}
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
        @endif
         

    </div>
</div>
@endsection
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">