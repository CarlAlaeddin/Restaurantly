@props([
    'value'
])
<option value="{{ $value }}" {{ $attributes->merge(['selected']) }}>
    {{ $slot }}
</option>
