<x-layouts.app headtitle="{{ $headtitle }}">

<x-slot:header>
    <x-panels.admin.header/>
</x-slot:header>

<x-slot:main>
    <x-mains.main1 title="{{ $title }}">
        {{ $content }}
    </x-mains.main1>
</x-slot:main>

<x-slot:footer>
    <x-panels.admin.footer/>
</x-slot:footer>

</x-layouts.app>
