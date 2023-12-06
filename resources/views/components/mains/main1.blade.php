<!-- Для layouts.admin, layouts.product -->
<main class="flex-1 container mx-auto bg-white">
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">{{ $title }}</h1>

        {{ $slot }}

    </div>
</main>
