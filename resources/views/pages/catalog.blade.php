@props(['cars'])
<x-layouts.app headtitle="Каталог">

    <x-slot:breadcrumbs>
        <x-Breadcrumbs/>
    </x-slot:breadcrumbs>

    <x-slot:main>
        <main class="flex-1 container mx-auto bg-white">

            <div class="p-4">

                <x-panels.messages.flashes />

                <h1 class="text-black text-3xl font-bold mb-4">Каталог</h1>

                <x-forms.ready.catalog />

                <x-panels.catalog.cars :cars="$cars" />

                <x-panels.pages :paginator="$cars" />

            </div>

        </main>

    </x-slot:main>
</x-layouts.app>
