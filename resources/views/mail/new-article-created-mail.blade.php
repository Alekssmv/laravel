<x-mail::message>
# Создана новость
# Заголовок:
{{ $article->title }}
<x-mail::button url="{{ route('articles.show', ['article' => $article]) }}">
    Перейти
</x-mail::button>
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
