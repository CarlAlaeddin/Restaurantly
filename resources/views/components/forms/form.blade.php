@props([
    'action',
    'method',
])

<form
    action="{{ $action }}"
    method="{{ $method }}"
    {{ $attributes->merge(['class' =>   "book-form",])}}
>
    @csrf
    {{ $slot }}
</form>
