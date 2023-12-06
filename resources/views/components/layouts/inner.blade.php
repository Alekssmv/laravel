<x-layouts.app headtitle="{{ $headtitle }}">

<x-slot:breadcrumbs>
    <x-Breadcrumbs/>
</x-slot:breadcrumbs>

<x-slot:main>
    <x-mains.inner title="{{ $title }}">
        {{ $content }}
    </x-mains.inner>
</x-slot:main>

</x-layouts.app>



