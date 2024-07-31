@props(['status'])

@php
    switch ($status) {
        case 'Aprobado':
            $clase = 'text-green-500 bg-green-100/60';
            break;
        case 'Rechazado':
            $clase = 'text-red-500 bg-red-100/60';
            break;
        default:
            $clase = 'text-gray-500 bg-gray-100/60';
            break;
    }
@endphp

<div class="inline px-3 py-1 text-sm font-normal rounded-full {{ $clase }} gap-x-2 text-center">
    {{ $status }}
</div>
