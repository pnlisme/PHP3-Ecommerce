<!-- resources/views/vendor/pagination/custom.blade.php -->
@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between items-center font-medium text-xs">
        <div class="flex items-center">
            <span class="text-gray-700">Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} results</span>
        </div>
        <ul class="pagination flex list-none">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="px-3 py-2 mx-1 bg-gray-200 text-gray-500 rounded">&laquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-3 py-2 mx-1 bg-violet-700 text-white rounded hover:bg-violet-600" aria-label="@lang('pagination.previous')">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span class="px-3 py-2 mx-1 bg-gray-200 text-gray-500 rounded">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span class="px-3 py-2 mx-1 bg-violet-700 text-white rounded">{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}" class="px-3 py-2 mx-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-3 py-2 mx-1 bg-violet-700 text-white rounded hover:bg-violet-600" aria-label="@lang('pagination.next')">&raquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="px-3 py-2 mx-1 bg-gray-200 text-gray-500 rounded">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
