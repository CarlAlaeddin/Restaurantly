@props([
    'action',
    'method',
    'value
])

<form
    action="{{ $action }}"
    method="{{ $method }}"
    {{ $attributes->merge([
    'class'             =>      "book-form",
        ])
    }}
    value="{{ $value }}"
>
    @csrf
    {{ $slot }}
</form>
