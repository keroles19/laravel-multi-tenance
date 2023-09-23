@if ($paginator->hasPages())

    <div class="d-flex flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between mx-3">
        <div>
            <p class="small text-muted">
                showing
                <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                to
                <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                of
                <span class="fw-semibold">{{ $paginator->total() }}</span>
                results
            </p>
        </div>

        <div>
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" aria-hidden="true">@lang('pagination.previous')</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                           aria-label="@lang('pagination.previous')">@lang('pagination.previous')</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @php
                    $currentPage = $paginator->currentPage();
                    $lastPage = $paginator->lastPage();
                    $pageRange = 4; // Number of pages to show before and after the current page
                    $ellipsis = '<li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>';
                @endphp
                @if ($lastPage <= 7) {{-- Show all page numbers --}}
                @for ($i = 1; $i <= $lastPage; $i++)
                    <li class="page-item {{ ($i == $currentPage) ? 'active' : '' }}"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endfor
                @else {{-- Show ellipsis and range of pages around the current page --}}
                @if ($currentPage <= 4) {{-- First few pages --}}
                @for ($i = 1; $i <= 5; $i++)
                    <li class="page-item {{ ($i == $currentPage) ? 'active' : '' }}"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endfor
                {!! $ellipsis !!}
                <li class="page-item"><a class="page-link" href="{{ $paginator->url($lastPage) }}">{{ $lastPage }}</a></li>
                @elseif ($currentPage >= $lastPage - 3) {{-- Last few pages --}}
                <li class="page-item"><a class="page-link" href="{{ $paginator->url(1) }}">1</a></li>
                {!! $ellipsis !!}
                @for ($i = $lastPage - 4; $i <= $lastPage; $i++)
                    <li class="page-item {{ ($i == $currentPage) ? 'active' : '' }}"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endfor
                @else {{-- Middle pages --}}
                <li class="page-item"><a class="page-link" href="{{ $paginator->url(1) }}">1</a></li>
                {!! $ellipsis !!}
                @for ($i = $currentPage - 1; $i <= $currentPage + 1; $i++)
                    <li class="page-item {{ ($i == $currentPage) ? 'active' : '' }}"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endfor
                {!! $ellipsis !!}
                <li class="page-item"><a class="page-link" href="{{ $paginator->url($lastPage) }}">{{ $lastPage }}</a></li>
                @endif
                @endif
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                           aria-label="@lang('pagination.next')">@lang('pagination.next')</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link" aria-hidden="true">@lang('pagination.next')</span>
                    </li>
                @endif
            </ul>
        </div>
    </div>

@endif
