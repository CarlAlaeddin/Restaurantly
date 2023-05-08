@props([
    'href' => null,
])

<li class="breadcrumb-item">
    <a href="{{ $href }}">
    {{ $slot }}
    </a>
</li>