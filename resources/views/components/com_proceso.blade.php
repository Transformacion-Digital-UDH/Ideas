@props(['status'])

@php
    switch ($status) {
        case 'Pendiente':
            $clase = 'text-orange-500 bg-orange-100/60';
            $estado = 'Pendiente';
            break;
        case 'En Revisión':
            $clase = 'text-purple-500 bg-purple-100/60';
            $estado = 'En Revisión';
            break;
        case 'Aprobada':
            $clase = 'text-teal-500 bg-teal-100/60';
            $estado = 'Aprobada';
            break;
        case 'No Aplicable':
            $clase = 'text-gray-500 bg-gray-100/60';
            $estado = 'No Aplicable';
            break;
        case 'Rechazada':
            $clase = 'text-rose-500 bg-rose-100/60';
            $estado = 'Rechazada';
            break;
        case 'En Proceso':
            $clase = 'text-indigo-500 bg-indigo-100/60';
            $estado = 'En Proceso';
            break;
        case 'Completada':
            $clase = 'text-emerald-500 bg-emerald-100/60';
            $estado = 'Completada';
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
