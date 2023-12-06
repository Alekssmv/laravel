@props(['car', 'carClasses', 'carBodies', 'carEngines'])
<x-layouts.admin headtitle="Форма изменения модели" title="Форма изменения модели">

    <x-slot:content>

        <x-panels.messages.form_validation_errors />

        <x-forms.ready.admin-cars-edit
        :car="$car"
        :carEngines="$carEngines"
        :carBodies="$carBodies"
        :carClasses="$carClasses"/>


    </x-slot:content>

</x-layouts.admin>
