@props(['car', 'carClasses', 'carBodies', 'carEngines'])

<x-forms.form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">

    <x-forms.ready-input-fields.admin-cars :car="$car" :carClasses="$carClasses" :carBodies="$carBodies" :carEngines="$carEngines" submitButtonName="Добавить"/>

</x-forms.form>



