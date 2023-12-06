@props(['car', 'carClass', 'carBody', 'carEngine', 'submitButtonName'])

<x-forms.blocks.field class="block" for="fieldName">
    <x-slot:label>Название машины</x-slot:label>
    <x-forms.inputs.input
    id="fieldName"
    type="text"
    value="{{ $car->name }}"
    readonly/>
</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldBody">
    <x-slot:label>Описание машины</x-slot:label>
    <x-forms.inputs.textarea
        id="fieldBody"
        rows="16"
        readonly>
    {{ $car->body_text }}</x-forms.inputs.textarea>
</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldPrice">
    <x-slot:label>Цена</x-slot:label>
    <x-forms.inputs.input
    id="fieldPrice"
    type="number"
    value="{{ $car->price }}"
    readonly/>
</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldOldPrice">
    <x-slot:label>Старая цена</x-slot:label>
    <x-forms.inputs.input
    id="fieldOldPrice"
    type="number"
    value="{{ $car->old_price }}"
    readonly/>
</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldSalon">
    <x-slot:label>Салон</x-slot:label>
    <x-forms.inputs.input
    id="fieldSalon"
    type="text"
    value="{{ $car->salon }}"
    readonly/>
</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldKpp">
    <x-slot:label>КПП</x-slot:label>
    <x-forms.inputs.input
    id="fieldKpp"
    type="text"
    value="{{ $car->kpp }}"
    readonly/>
</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldYear">
    <x-slot:label>Год выпуска</x-slot:label>
    <x-forms.inputs.input
    id="fieldYear"
    type="number"
    value="{{ $car->year }}"
    readonly/>
</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldColor">
    <x-slot:label>Цвет кузова</x-slot:label>
    <x-forms.inputs.input
    id="fieldColor"
    type="text"
    value="{{ $car->color }}"
    readonly/>
</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldEngine">
    <x-slot:label>Двигатель</x-slot:label>
    <x-forms.inputs.input
    id="fieldEngine"
    type="text"
    value="{{ $carEngine->name }}"
    readonly/>
</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldBody">
    <x-slot:label>Кузов</x-slot:label>
    <x-forms.inputs.input
    id="fieldBody"
    type="text"
    value="{{ $carBody->name }}"
    readonly/>
</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldClass">
    <x-slot:label>Класс</x-slot:label>
    <x-forms.inputs.input
    id="fieldClass"
    type="text"
    value="{{ $carClass->name }}"
    readonly/>
</x-forms.blocks.field>

<x-forms.blocks.checkboxes>
    <x-forms.inputs.checkbox
    name="is_new"
    value="1"
    id="fieldIsNew"
    :checked="(bool)old('is_new', $car->is_new)"
    onclick="return false;"/>
    <span class="ml-2">Новинка</span>
</x-forms.blocks.checkboxes>

<x-forms.blocks.buttons>
    <x-forms.buttons.button name="{{ $submitButtonName }}" />
    <x-forms.buttons.href-button name="Отменить" />
</x-forms.blocks.buttons>


