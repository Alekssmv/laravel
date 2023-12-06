<x-layouts.auth title="Регистрация" headtitle="Регистрация">

    <x-slot:content>
        <x-panels.messages.form_validation_errors />
        <x-forms.ready.register :errors="session()->get('errors')" />
    </x-slot:content>

</x-layouts.auth>
