@props(['status'])
@php
    switch ($status) {
        case 'En Espera':
            $clase = 'text-white bg-orange-500/70';
            break;
        case 'Curado':
            $clase = 'text-white bg-purple-500/70';
            break;
        case 'Postulado':
            $clase = 'text-white bg-purple-500/70';
            break;
        case 'Asignado':
            $clase = 'text-white bg-purple-500/70';
            break;
        case 'En Planificación':
            $clase = 'text-white bg-gray-500/70';
            break;
        case 'En Ejecución':
            $clase = 'text-white bg-gray-500/70';
            break;
        case 'En Finalización':
            $clase = 'text-white bg-gray-500/70';
            break;
        case 'Completado':
            $clase = 'text-white bg-green-500/70';
            break;
        case 'Cancelado':
            $clase = 'text-white bg-black/70';
            break;
        case 'No Aplica':
            $clase = 'text-white bg-red-500/70';
            break;
        default:
            $clase = 'text-white bg-gray-500/70';
            $status = 'Desconocido';
            break;
    }
@endphp

<div class="inline px-2 py-1 text-xs font-bold rounded-full {{ $clase }} gap-x-2 text-center">
    {{ $status }}
</div>
