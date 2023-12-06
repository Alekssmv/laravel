@props(['car', 'carClasses', 'carBodies', 'carEngines'])

<x-forms.form action="{{ route('admin.cars.update', ['car' => $car])  }}" method="POST" enctype="multipart/form-data">

    @method('PATCH')

    <x-forms.ready-input-fields.admin-cars :car="$car" :carClasses="$carClasses" :carBodies="$carBodies" :carEngines="$carEngines" submitButtonName="Изменить"/>

</x-forms.form>




