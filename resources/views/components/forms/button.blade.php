@props([
    'type'
])
<button type="{{ $type }}" {{ $attributes->merge(['class' => '']) }}>
    {{ $slot }}
</button>
