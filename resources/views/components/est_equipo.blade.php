@props(['status'])

@php
    switch ($status) {
        case 1:
            $clase = 'text-orange-500 bg-orange-100/60';
            $estado = 'Activo';
            break;
        case 2:
            $clase = 'text-red-500 bg-red-100/60';
            $estado = 'Suspendido';
            break;
        case 3:
            $clase = 'text-teal-500 bg-teal-100/60';
            $estado = 'Aprobada';
            break;
        default:
            $clase = 'text-gray-500 bg-gray-100/60';
            $estado = 'Desconocido';
            break;
    }
@endphp

<div class="inline px-3 py-1 text-sm font-normal rounded-full {{ $clase }} gap-x-2 text-center">
    {{ $estado }}
</div>
