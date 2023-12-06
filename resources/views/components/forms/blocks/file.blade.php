<div {{ $attributes }}>
    <label for="{{ $for }}" class="text-gray-700 font-bold">{{ $label }}</label>
    <div class="flex items-center justify-center border rounded mb-2"><img src="{{ $src }}" class="max-w-full max-h-60"></div>
   {{ $slot }}
</div>
