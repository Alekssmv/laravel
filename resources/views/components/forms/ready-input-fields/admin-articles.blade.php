@props(['article', 'submitButtonName'])
<x-forms.blocks.field class="block" for="fieldTitle">
    <x-slot:label>Название новости</x-slot:label>
    <x-forms.inputs.input id="fieldTitle" type="text" placeholder="Парадигма просветляет архетип" name="title"
        value="{{ old('title', $article->title) }}" />
</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldDescription">

    <x-slot:label>Краткое описание новости</x-slot:label>
    <x-forms.inputs.input id="fieldDescription" type="text" placeholder="Парадигма просветляет архетип"
        name="description" value="{{ old('description', $article->description) }}" />

</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldBody">

    <x-slot:label>Детальное описание новости</x-slot:label>
    <x-forms.inputs.textarea id="fieldBody"
        placeholder="Парадигма просветляет архетип, таким образом, стратегия поведения, выгодная отдельному человеку"
        name="body" rows="16">
        {{ old('body', $article->body) }}</x-forms.inputs.textarea>

</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldDescription">

    <x-slot:label>Теги</x-slot:label>
    <x-forms.inputs.input id="fieldDescription" type="text" placeholder="Парадигма, просветляет, kia"

        name="tags" value="{{ old('tags', $article->tags->pluck('name')->implode(', '))}}" />

</x-forms.blocks.field>

<x-forms.blocks.checkboxes>

    <x-forms.inputs.checkbox name="published_at" value="{{ now() }}" :checked="old('published_at', $article->published_at)" />
    <span class="ml-2">Опубликовано</span>

</x-forms.blocks.checkboxes>

<x-forms.blocks.file class="block" for="fieldFile">
    <x-slot:label>Изображение</x-slot:label>
    <x-slot:src>{{ $article->image?->url ?? '/assets/images/no_image.png' }}</x-slot:src>
    <x-forms.inputs.file
    id="fieldFile"
    name="image"
    accept="image/jpeg,image/png,image/gif,image/svg+xml"
    :value="old('image', $car->image?->path ?? '')"
    />
</x-forms.blocks.file>

<x-forms.blocks.buttons>

    <x-forms.buttons.button name="{{ $submitButtonName }}" />
    <x-forms.buttons.href-button name="Отменить" />

</x-forms.blocks.buttons>
