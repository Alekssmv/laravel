@props(['articles'])
<x-layouts.inner headtitle="Все новости" title="Все новости">

    <x-slot:content>
        <div class="space-y-4">
            @props(['articles'])
            @foreach ($articles as $article)
                <x-panels.articles.article :article="$article" />
            @endforeach


            <x-panels.pages :paginator="$articles" />

    </x-slot:content>

</x-layouts.inner>
