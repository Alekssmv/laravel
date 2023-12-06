@props(['article'])

<x-forms.form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">

    <x-forms.ready-input-fields.admin-articles :article="$article" submitButtonName="Сохранить"/>

</x-forms.form>
