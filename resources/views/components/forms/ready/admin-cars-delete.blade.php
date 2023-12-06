@props(['car', 'carClass', 'carBody', 'carEngine'])

<x-forms.form action="{{ route('admin.cars.destroy', ['car' => $car])  }}" method="POST">

    @method('DELETE')

        <x-forms.ready-input-fields.admin-cars-readonly :car="$car" :carClass="$carClass" :carBody="$carBody" :carEngine="$carEngine" submitButtonName="Удалить"/>

</x-forms.form>
