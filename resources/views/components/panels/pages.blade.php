@props(['paginator'])
<div class="text-center mt-4">
    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px text-lg" aria-label="Pagination">

        <a href="{{ $paginator->currentPage() === $paginator->onFirstPage() ? '' : $paginator->previousPageUrl() }}"
            class="inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white @if ($paginator->onFirstPage()) text-gray-200 cursor-not-allowed @else text-gray-500 hover:bg-gray-800 hover:text-white @endif ">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </a>

        @for ($page = 1; $page <= $paginator->lastPage(); $page++)
            @if ($page == $paginator->currentPage())
                <a href="{{ $paginator->url($page) }}"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white bg-gray-800 text-gray-300">{{ $page }}</a>
            @else
                <a href="{{ $paginator->url($page) }}"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white">{{ $page }}</a>
            @endif
        @endfor

        <a href="{{ $paginator->currentPage() === $paginator->lastPage() ? '' : $paginator->nextPageUrl() }}"
            class="inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white @if ($paginator->onLastPage()) text-gray-200 cursor-not-allowed @else text-gray-500 hover:bg-gray-800 hover:text-white @endif">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </a>

    </nav>
</div>
