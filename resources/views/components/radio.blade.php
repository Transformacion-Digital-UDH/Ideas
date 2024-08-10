@props(['name', 'value'])

<input type="radio" name="{{ $name }}" value="{{ $value }}"
    {{ $attributes->merge(['class' => 'rounded-full border-gray-300 focus:!ring-udh_3 text-udh_3 shadow-sm']) }}>