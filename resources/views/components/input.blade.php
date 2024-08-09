@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full border-gray-300 focus:border-udh_1 focus:ring-udh_1 rounded-md shadow-sm']) !!}>
