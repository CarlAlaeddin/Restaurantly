@props([
    'action',
    'method',
    'enctype' => null
])

<form
    action="{{ $action }}"
    method="{{ $method }}"
    {{ $attributes->merge(['class' =>   "book-form",])}}
    enctype="{{ $enctype }}"
>
    @csrf
    {{ $slot }}
</form>
