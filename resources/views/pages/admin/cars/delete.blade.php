@props(['car'])
<x-layouts.admin headtitle="Форма удаления модели" title="Форма удаления модели">

    <x-slot:content>

        <x-panels.messages.form_validation_errors />

        <x-forms.ready.admin-cars-delete
        :car="$car"
        :carEngine="$car->engine"
        :carBody="$car->body"
        :carClass="$car->class" />


    </x-slot:content>

</x-layouts.admin>
