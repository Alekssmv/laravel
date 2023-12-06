@props(['checked'])
<input
type="checkbox"
class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50"
{{ $attributes }}
@checked($checked)
/>
