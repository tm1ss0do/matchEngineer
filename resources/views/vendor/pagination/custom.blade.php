@if ($paginator->hasPages())
    <nav class="p-pagination">
        <ul class="c-pagination__container">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="c-pagination__item--prev u-pagination__disable" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="c-pagination__dislink--prev" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="c-pagination__item--prev">
                    <a class="c-pagination__link--prev" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="c-pagination__item u-pagination__disable" aria-disabled="true"><span class="c-pagination__dislink" >{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="c-pagination__item u-pagination__active" aria-current="page"><span class="c-pagination__dislink">{{ $page }}</span></li>
                        @else
                            <li class="c-pagination__item"><a class="c-pagination__link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="c-pagination__item--next">
                    <a class="c-pagination__link--next" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="c-pagination__item--next u-pagination__disable" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="c-pagination__link--next" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
