@props(['car', 'carClasses', 'carBodies', 'carEngines'])
<x-layouts.admin headtitle="Форма создания модели" title="Форма создания модели">

    <x-slot:content>

        <x-panels.messages.form_validation_errors />

            <x-forms.ready.admin-cars-create
            :car="$car"
            :carEngines="$carEngines"
            :carBodies="$carBodies"
            :carClasses="$carClasses" />

    </x-slot:content>

</x-layouts.admin>
