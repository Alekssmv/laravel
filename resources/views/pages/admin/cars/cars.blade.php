@props(['cars'])
<x-layouts.admin title="Управление моделями" headtitle="Управление моделями">

<x-slot:content>
        <x-panels.messages.flashes />

        <section class="pb-4">
            <div class="my-6">
                <a href="{{ route('admin.cars.create') }}" class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded" title="Добавить модель">
                <span class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Добавить модель</span>
                </span>
                </a>
            </div>

            <table class="border border-collapse w-full">
                <thead>
                <tr>
                    <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">id</th>
                    <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Название модели</th>
                    <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Цена с учетом скидки</th>
                    <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Цена без скидки</th>
                    <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Новинка</th>
                    <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">&nbsp;</th>
                    <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">&nbsp;</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($cars as $car)

                    <x-panels.admin.car_item :car="$car" />

                @endforeach

                </tbody>
            </table>

            <x-panels.pages :paginator="$cars" />

        </section>

    </x-slot:content>

</x-layouts.admin>
