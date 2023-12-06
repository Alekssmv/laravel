@props(['article'])

<x-forms.form action="{{ route('admin.articles.update', compact('article')) }}" method="POST" enctype="multipart/form-data">
    @method('DELETE')
    <x-forms.ready-input-fields.admin-articles-readonly :article="$article" submitButtonName="Удалить"/>

</x-forms.form>
