@props(['errors'])

<x-forms.blocks.field class="block" for="fieldName">
    <x-slot:label>Email</x-slot:label>
    <x-forms.inputs.input
    id="fieldEmail"
    type="email"
    placeholder="example@example.com"
    name="email"
    value="{{ old('email') }}"
    required autofocus
    error="{{ $errors->first() ?? null }}"
    />
</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldName">
    <x-slot:label>Пароль</x-slot:label>
    <x-forms.inputs.input
    id="fieldPassword"
    type="password"
    placeholder="*******"
    name="password"
    value="{{ old('password') }}"
    required autofocus
    error="{{ $errors->first() ?? null }}"
    />
</x-forms.blocks.field>

<x-forms.blocks.buttons>
    <x-forms.buttons.button name="Вход" />
    <x-forms.buttons.href-button name="Забыли пароль?" href="{{ route('login') }}" />
</x-forms.blocks.buttons>

