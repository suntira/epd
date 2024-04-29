@if ($paginator->hasPages())
    <nav class="pag_nav">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
            @endif
        
            {{-- Array Of Links --}}
            @if (is_array($element))
                @php
                    $dotsNeeded = 3; // Количество страниц, которые вы хотите показать перед и после троеточия
                    $currentPage = $paginator->currentPage();
                    $lastPage = 0;
                    $totalPages = count($element);
                @endphp
        
                @foreach ($element as $page => $url)
                    @if ($page == $currentPage)
                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                    @else
                        @if ($totalPages <= (2 * $dotsNeeded + 1) || $page <= $dotsNeeded || $page >= $totalPages - $dotsNeeded || abs($page - $currentPage) <= $dotsNeeded)
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @elseif ($lastPage != $page - 1)
                            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                        @endif
                    @endif
        
                    @php $lastPage = $page; @endphp
                @endforeach
            @endif
        @endforeach


            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link {{ request()->is('posts') ? 'active' : '' }}" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
<link href="{{ asset('css/pag.css') }}" rel="stylesheet">