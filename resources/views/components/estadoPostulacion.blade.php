@props(['status'])

@php
    switch ($status) {
        case 'Aprobado':
            $clase = 'text-white bg-green-700/90';
            break;
        case 'Rechazado':
            $clase = 'text-white bg-red-700/90';
            break;
        default:
            $clase = 'text-white bg-blue-700/90';
            break;
    }
@endphp

<div class="inline px-2 py-1 text-xs font-semibold rounded-full {{ $clase }} text-center">
    {{ $status }}
</div>
