@extends('layout.admin')
@section('title', 'Админ панель.Комментарии')
@section('content')
<div class="container">
    <div class="admin-section">
        @if($comments->isEmpty())
        <p class="p_not_found favoriter_p-not-fount">Нет комментариев</p>
    @else
        <table cellpadding="5" cellspacing="0">
            <thead>
                <th class="th">Текст комментария</th>
                <th class="th">Решение</th>
              </tr>
            </thead>
          
            @foreach ($comments as $comment)
                <tr>
                    <td class="td1"><p class="a">{{ $comment->text }}</p></td>
                    <td  class="td2" >
                        <form method="POST" action="{{ route('admin.comments.destroy', $comment->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="a">Удалить</button>
                        </form>
                </td>
                </tr>
        @endforeach
        @endif
    </table>
        {{-- {{ $comments->links() }} --}}
             {{-- начало --}}
@php
$currentPage = $comments->currentPage();
$lastPage = $comments->lastPage();
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
        @if ($comments->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">&lsaquo;</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $comments->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
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
        @if ($comments->hasMorePages())
            <li class="page-item">
                <a class="page-link {{ request()->is('posts') ? 'active' : '' }}" href="{{ $comments->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
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
    </div>
</div>
@endsection
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">