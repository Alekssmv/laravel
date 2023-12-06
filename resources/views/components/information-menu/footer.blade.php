@props(['menu'])
<nav>
        <ul class="bullet-list-item">
            @props(['menu'])
            @foreach ($menu as $item)
                <li><a class="@if (request()->routeIs($item['route'])) text-orange cursor-default @else text-gray-600 hover:text-orange @endif"
                        href="{{ route($item['route']) }}">{{ $item['title'] }}</a></li>
            @endforeach
        </ul>
</nav>
