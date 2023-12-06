<input type="hidden" name="{{ $name }}" value="{{ $currentValue }}">
<button
    name="{{ $name }}"
    value="{{ $nextValue }}"
    class="flex items-center @empty($currentValue) hover:text-orage @else text-orange underline @endempty cursor-pointer hover:no-underline hover:text-opacity-70 outline-none focus:outline-none">
    {{ $slot }}
    @if ($showAscIcon())
        <x-icons.arrow-up class="h-4 w-4"/>
    @endif
    @if ($showDescIcon())
        <x-icons.arrow-down class="h-4 w-4"/>
    @endif
</button>
