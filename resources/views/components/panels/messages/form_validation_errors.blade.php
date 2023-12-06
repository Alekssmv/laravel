@props(['errors'])
@if ($errors->any())
    @foreach ($errors->all() as $message)
        <x-panels.messages.error :message="$message" />
    @endforeach
@endif
