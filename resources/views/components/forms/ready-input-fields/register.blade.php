@props(['errors'])
<x-forms.blocks.field class="block" for="fieldName">
    <x-slot:label>Ваше имя</x-slot:label>
    <x-forms.inputs.input
    id="fieldName"
    type="text"
    placeholder="Иванов Иван Иванович"
    name="name"
    value="{{ old('name') }}"
    required autofocus
    error="{{ $errors ? $errors->first('name') : '' }}"
    />
</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldName">
    <x-slot:label>Email</x-slot:label>
    <x-forms.inputs.input
    id="fieldEmail"
    type="email"
    placeholder="example@example.com"
    name="email"
    value="{{ old('email') }}"
    required autofocus
    error="{{ $errors ? $errors->first('email') : '' }}"
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
    error="{{ $errors ? $errors->first('password') : '' }}"
    />
</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldName">
    <x-slot:label>Подтверждение пароля</x-slot:label>
    <x-forms.inputs.input
    id="fieldPasswordConfirm"
    type="password"
    placeholder="*******"
    name="password_confirmation"
    value="{{ old('password_confirmation') }}"
    required autofocus
    error="{{ $errors ? $errors->first('password') : '' }}"
    />
</x-forms.blocks.field>

<x-forms.blocks.buttons>
    <x-forms.buttons.button name="Регистрация" />
    <x-forms.buttons.href-button name="Уже зарегистрированы?" href="{{ route('login') }}" />
</x-forms.blocks.buttons>

