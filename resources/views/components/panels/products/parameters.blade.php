@props(['showparameters', 'car'])

<div class="my-4 px-4" data-accordion-details>
    <table class="w-full">


        @foreach ($car->toArray() as $key => $value)
        @if ($value !== null && isset($showparameters[$key]))
        <tr>
            <td class="py-2 text-gray-600 w-1/2">{{ $key }}</td>
            <td class="py-2 text-black font-bold w-1/2">{{ $value }}</td>
        </tr>
        @endif
        @endforeach
        <!--
        <tr>
            <td class="py-2 text-gray-600 w-1/2">Теги:</td>
            <td class="py-2 text-black font-bold w-1/2">
                <div>
                    <span class="text-sm text-white italic rounded bg-orange px-2">Парадигма</span>
                    <span class="text-sm text-white italic rounded bg-orange px-2">Архетип</span>
                    <span class="text-sm text-white italic rounded bg-orange px-2">Киа Seed</span>
                </div>
            </td>
        </tr>
        -->
    </table>
</div>
