<x-layouts.app headtitle="{{ $headtitle }}">

<x-slot:breadcrumbs>
    <x-Breadcrumbs/>
</x-slot:breadcrumbs>

<x-slot:main>
    <x-mains.main1 title="{{ $title }}">
        {{ $content }}
    </x-mains.main1>
</x-slot:main>

<x-slot:footer>
    <x-panels.footer/>
</x-slot:footer>

</x-layouts.app>
