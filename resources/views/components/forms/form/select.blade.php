@props([
    'name',
    'id'
])
<select name="{{ $name }}" id="{{ $id }}" {{ $attributes->merge(['class' => 'form-control form-select']) }}>
    {{ $slot }}
</select>
