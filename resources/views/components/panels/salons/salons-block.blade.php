@props(['salons'])
<div class="space-y-4 max-w-4xl">
    @foreach ($salons as $key => $salon)
        @if ($key % 2 === 0)
            <x-panels.salons.left-salon-block :salon="$salon" />
        @else
            <x-panels.salons.right-salon-block :salon="$salon" />
        @endif
    @endforeach
</div>
