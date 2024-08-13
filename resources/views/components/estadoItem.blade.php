@props(['status'])

@php
    switch ($status) {
        case '1':
            $clase = 'text-white bg-green-700/90';
            $estado = 'Activo';
            break;
        case '2':
            $clase = 'text-white bg-red-700/90';
            $estado = 'Inactivo';
            break;
        default:
            $clase = 'text-white bg-blue-700/90';
            $estado = 'Inactivo';
            break;
    }
@endphp

<div class="inline px-2 py-1 text-xs font-bold rounded-full {{ $clase }} gap-x-2 text-center">
    {{ $estado }}
</div>
