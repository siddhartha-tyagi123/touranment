<!-- resources/views/vendor/pagination/custom.blade.php -->

@if ($paginator->hasPages())
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

            {{-- Array of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true">&rsaquo;</span>
            </li>
        @endif

        {{-- Per Page Selector --}}
        <li class="page-item ml-auto">
            <form id="perPageForm" class="form-inline">
                <label for="perPage" class="mr-2">Per Page:</label>
                <select id="perPage" class="custom-select">
                    <option value="10" {{ $paginator->perPage() == 10 ? 'selected' : '' }}>10</option>
                    <option value="20" {{ $paginator->perPage() == 20 ? 'selected' : '' }}>20</option>
                    <option value="50" {{ $paginator->perPage() == 50 ? 'selected' : '' }}>50</option>
                </select>
            </form>
        </li>
    </ul>
@endif

<script>
    // Handle per page selector change
    document.getElementById('perPage').addEventListener('change', function () {
        var perPage = this.value;
        var currentUrl = window.location.href.replace(/(\?|&)per_page=\d*/, '');
        window.location.href = currentUrl + (currentUrl.includes('?') ? '&' : '?') + 'per_page=' + perPage;
    });
</script>
