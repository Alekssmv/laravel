@props(['message'])
@if (session()->has('success'))
    <x-panels.messages.success :message="session()->get('success')"/>
@endif

@if (session()->has('error'))
    <x-panels.messages.error :message="session()->get('error')" />
@endif
