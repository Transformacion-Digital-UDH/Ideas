@props(['status'])
@php
    switch ($status) {
        case 'SI':
            $clase = 'text-white bg-green-700/80';
            break;
        default:
            $clase = 'text-white bg-red-700/80';
            break;
    }
@endphp

<div class="inline px-2 py-1 text-xs font-bold rounded-full {{ $clase }} gap-x-2 text-center">
    {{ $status }}
</div>
