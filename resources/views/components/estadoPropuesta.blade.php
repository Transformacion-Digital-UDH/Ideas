@props(['status'])

@php
    switch ($status) {
        case 'En Espera':
            $clase = 'text-gray-500 bg-gray-100/60';
            break;
        case 'Aprobada':
            $clase = 'text-teal-500 bg-teal-100/60';
            break;
        case 'En Desarrollo':
            $clase = 'text-blue-500 bg-blue-100/60';
            break;
        case 'Implementación':
            $clase = 'text-yellow-500 bg-yellow-100/60';
            break;
        case 'Completada':
            $clase = 'text-emerald-500 bg-emerald-100/60';
            break;
        case 'Cancelada':
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
