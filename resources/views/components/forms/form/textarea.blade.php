@props([
    'name',
    'placeholder'
])

<textarea name="{{ $name }}" rows="5" placeholder="{{ $placeholder }}" {{ $attributes->merge(['class'=>'form-control']) }}>
    {{ $slot }}
</textarea>
