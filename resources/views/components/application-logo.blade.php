@props(['width' => '170'])
<div>
    <img src="{{ asset('logo.webp') }}" alt="Logo" with="{{ $width }}"
        {{ $attributes->merge(['class' => 'my-[5px]']) }}>
</div>
