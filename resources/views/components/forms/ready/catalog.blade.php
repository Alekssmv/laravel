<form class="my-4 border rounded p-4 space-y-4" method="GET">
    <div class="block sm:flex space-y-2 sm:space-y-0 sm:space-x-4 w-full">
        <div class="flex space-x-2 items-center">
            <label for="fieldFilterName" class="text-gray-700 font-bold">Модель:</label>
            <input
                id="fieldFilterName"
                type="text"
                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder=""
                name="model"
                value="{{ request()->get('model', '') }}"
                >
        </div>
        <div class="flex space-x-2 items-center">
            <label for="fieldFilterPriceFrom" class="text-gray-700 font-bold whitespace-nowrap">Цена от:</label>
            <input
                id="fieldFilterPriceFrom"
                type="number"
                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder=""
                name="min_price"
                value="{{ request()->get('min_price', '') }}"
                >
        </div>
        <div class="flex space-x-2 items-center">
            <label for="fieldFilterPriceTo" class="text-gray-700 font-bold whitespace-nowrap">Цена до:</label>
            <input
                id="fieldFilterPriceTo"
                type="text"
                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder=""
                name="max_price"
                value="{{ request()->get('max_price', '') }}"
                >
        </div>
        <div class="flex space-x-2 items-center">
            <button class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
            <a href="{{ route('catalog') }}" class="inline-block bg-gray-400 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        </div>
    </div>
    <hr>
    <div class="flex space-x-2 items-center">
        <div class="font-bold">Сортировать по:</div>

        <x-catalog.sort-button name="order_price" currentValue="{{ request()->get('order_price') }}">
            Цене
        </x-catalog.sort-button>

        <x-catalog.sort-button name="order_model" currentValue="{{ request()->get('order_model') }}">
            Модели
        </x-catalog.sort-button>

    </div>
</form>
