@props(['status'])
@php
    switch ($status) {
        case 'En Planificación':
            $clase = 'text-white bg-gray-500/80';
            break;
        case 'En Ejecución':
            $clase = 'text-white bg-gray-500/80';
            break;
        case 'En Finalización':
            $clase = 'text-white bg-gray-500/80';
            break;
        case 'Completado':
            $clase = 'text-white bg-green-500/80';
            break;
        case 'Cancelado':
            $clase = 'text-white bg-black/80';
            break;
        case 'No Aplica':
            $clase = 'text-white bg-red-500/80';
            break;
        default:
            $clase = 'text-white bg-blue-500/80';
            $status = 'En Revisión';
            break;
    }
@endphp

<div class="inline px-2 py-1 text-xs font-bold rounded-full {{ $clase }} gap-x-2 text-center">
    {{ $status }}
</div>
