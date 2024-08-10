
@props(['rows' => 4])

<textarea rows="{{ $rows }}"
    {{ $attributes->merge(['class' => 'border-gray-300 focus:border-udh_1 focus:ring-udh_1 rounded-md shadow-sm']) }}></textarea>
