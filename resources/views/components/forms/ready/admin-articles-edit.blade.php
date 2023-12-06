@props(['article'])

<x-forms.form action="{{ route('admin.articles.update', compact('article')) }}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    <x-forms.ready-input-fields.admin-articles :article="$article" submitButtonName="Сохранить"/>

</x-forms.form>
