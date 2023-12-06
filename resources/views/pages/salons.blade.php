@props(['salons'])
<x-layouts.inner title="Салоны" headtitle="Салоны">

    <x-slot:content>

    
        @if (empty($salons))
            <x-panels.messages.error_empty />
        @else
            <x-panels.salons.salons-block :salons="$salons" />
        @endif


        <div class="my-4 space-y-4 max-w-4xl">
            <hr>

            <p class="text-black text-2xl font-bold mb-4">Салоны на карте</p>

            <div class="bg-gray-200">
                Карта с салонами
            </div>
        </div>

    </x-slot:content>


</x-layouts.inner>
