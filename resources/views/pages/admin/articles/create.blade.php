@props(['article'])
<x-layouts.admin headtitle="Форма создания новости" title="Форма создания новости">

    <x-slot:content>

        <x-panels.messages.form_validation_errors />

            <x-forms.ready.admin-articles-create :article="$article"/>

    </x-slot:content>

</x-layouts.admin>
