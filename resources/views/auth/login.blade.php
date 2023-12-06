<x-layouts.auth title="Авторизация" headtitle="Авторизация">

    <x-slot:content>
        <x-panels.messages.form_validation_errors />
        <x-forms.ready.login :errors="session()->get('errors')?->all()"/>
    </x-slot:content>

</x-layouts.auth>
