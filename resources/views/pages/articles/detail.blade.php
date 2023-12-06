@props(['article', 'user'])
<x-layouts.inner title="{{ $article->title }}" headtitle="{{ $article->title }}">

    <x-slot:content>
        <div class="space-y-4">

            <img src="{{ $article->image->url }}" alt="" title="">

            <x-panels.tags :tags="$article->tags" />

            {!! $article->body !!}

        </div>

        @admin($user)
            <x-forms.buttons.href-button :href="route('admin.articles.edit', $article)" name="Редактировать"/>
        @endadmin

        <div class="mt-4">
            <a class="inline-flex items-center text-orange hover:opacity-75" href="{{ route('articles.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 mr-2" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                </svg>
                К списку новостей
            </a>
        </div>
    </x-slot:content>

</x-layouts.inner>
