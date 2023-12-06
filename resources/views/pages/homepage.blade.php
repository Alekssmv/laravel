@props(['cars', 'articles', 'banners'])
<x-layouts.app headtitle="Главная страница">
    <x-slot:main>
    <main class="flex-1 container mx-auto bg-white">

        <x-panels.home.banners :banners="$banners" />


        @if (!$cars->isempty())
            <x-panels.home.models_week :cars="$cars" />
        @endif

        @if (!$articles->isempty())
            <x-panels.home.news_block :articles="$articles" />
        @endif

    </main>
    </x-slot:main>

</x-layouts.app>
