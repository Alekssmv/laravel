@props(['article'])
<x-layouts.admin headtitle="Форма удаления новости" title="Форма удаления новости">

    <x-slot:content>

        <x-panels.messages.form_validation_errors />

            <x-forms.ready.admin-articles-delete :article="$article"/>

    </x-slot:content>

</x-layouts.admin>
