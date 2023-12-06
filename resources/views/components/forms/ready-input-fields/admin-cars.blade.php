@props(['car', 'carClasses', 'carBodies', 'carEngines', 'submitButtonName'])

<x-forms.blocks.field class="block" for="fieldName">
    <x-slot:label>Название машины</x-slot:label>
    <x-forms.inputs.input
    id="fieldName"
    type="text"
    placeholder="Парадигма просветляет архетип"
    name="name"
    value="{{ old('name', $car->name) }}"/>
</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldBody">
    <x-slot:label>Описание машины</x-slot:label>
    <x-forms.inputs.textarea
        id="fieldBody"
        placeholder="Парадигма просветляет архетип, таким образом, стратегия поведения, выгодная отдельному человеку"
        name="body_text"
        rows="16">
    {{ old('body_text', $car->body_text) }}</x-forms.inputs.textarea>
</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldPrice">
    <x-slot:label>Цена</x-slot:label>
    <x-forms.inputs.input
    id="fieldPrice"
    type="number"
    placeholder="500000"
    name="price"
    value="{{ old('price', $car->price) }}"
    min="1"/>
</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldOldPrice">
    <x-slot:label>Старая цена</x-slot:label>
    <x-forms.inputs.input
    id="fieldOldPrice"
    type="number"
    placeholder="500001"
    name="old_price"
    value="{{ old('old_price', $car->old_price) }}"
    min="1"/>
</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldSalon">
    <x-slot:label>Салон</x-slot:label>
    <x-forms.inputs.input
    id="fieldSalon"
    type="text"
    placeholder="Парадигма просветляет архетип"
    name="salon"
    value="{{ old('salon', $car->salon) }}"/>
</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldKpp">
    <x-slot:label>КПП</x-slot:label>
    <x-forms.inputs.input
    id="fieldKpp"
    type="text"
    placeholder="Ручная"
    name="kpp"
    value="{{ old('kpp', $car->kpp) }}"/>
</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldYear">
    <x-slot:label>Год выпуска</x-slot:label>
    <x-forms.inputs.input
    id="fieldYear"
    type="number"
    placeholder="2014"
    name="year"
    value="{{ old('year', $car->year) }}"
    min="1900"
    max="2099"/>
</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldColor">
    <x-slot:label>Цвет кузова</x-slot:label>
    <x-forms.inputs.input
    id="fieldColor"
    type="text"
    placeholder="Синий"
    name="color"
    value="{{ old('color', $car->color) }}"/>
</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldCarEngine">
    <x-slot:label>Двигатель</x-slot:label>
    <x-forms.inputs.select
    id="fieldCarEngine"
    name="engine_id" >
    @foreach ($carEngines as $carEngine)
        <option value="{{ $carEngine->id }}" {{ $carEngine->id == old('engine_id', $car->engine_id) ? 'selected' : '' }}>{{ $carEngine->name }}</option>
    @endforeach
    </x-forms.inputs.select>
</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldCarBody">
    <x-slot:label>Кузов</x-slot:label>
    <x-forms.inputs.select
    id="fieldCarBody"
    name="body_id" >
    @foreach ($carBodies as $carBody)
        <option value="{{ $carBody->id }}" {{ $carBody->id == old('body_id', $car->body_id) ? 'selected' : '' }}>{{ $carBody->name }}</option>
    @endforeach
    </x-forms.inputs.select>
</x-forms.blocks.field>

<x-forms.blocks.field class="block" for="fieldCarClass">
    <x-slot:label>Класс</x-slot:label>
    <x-forms.inputs.select
    id="fieldCarClass"
    name="class_id" >
    @foreach ($carClasses as $carClass)
        <option value="{{ $carClass->id }}" {{ $carClass->id == old('class_id', $car->class_id) ? 'selected' : '' }}>{{ $carClass->name }}</option>
    @endforeach
</x-forms.inputs.select>
</x-forms.blocks.field>

<x-forms.blocks.checkboxes>
    <x-forms.inputs.checkbox
    name="is_new"
    value="1"
    id="fieldIsNew"
    :checked="(bool)old('is_new', $car->is_new)" />
    <span class="ml-2">Новинка</span>
</x-forms.blocks.checkboxes>

<x-forms.blocks.file class="block" for="fieldFile">
    <x-slot:label>Изображение</x-slot:label>
    <x-slot:src>{{ $car->image?->url ?? '/assets/images/no_image.png' }}</x-slot:src>
    <x-forms.inputs.file
    id="fieldFile"
    name="image"
    accept="image/jpeg,image/png,image/gif,image/svg+xml"
    :value="old('image', $car->image?->path ?? '')"
    />
</x-forms.blocks.file>


<x-forms.blocks.buttons>
    <x-forms.buttons.button name="{{ $submitButtonName }}" />
    <x-forms.buttons.href-button name="Отменить" />
</x-forms.blocks.buttons>

