@props(['errors'])
<x-forms.form method="POST" action="{{ route('register') }}">
    <x-forms.ready-input-fields.register :errors="$errors"/>
</x-forms.form>
