<x-dialog-modal wire:model="abrirModal">
    @if($propuestaSeleccionada)
        <x-slot name="title">
            {{ $propuestaSeleccionada->pro_titulo }}
        </x-slot>

        <x-slot name="content">
            <p>{{ $propuestaSeleccionada->pro_descripcion }}</p>
            <p>Curador: {{ $propuestaSeleccionada->curador->name ?? 'N/A' }}</p>
            <p>Proyectista: {{ $propuestaSeleccionada->proyectista->proy_nombres ?? 'N/A' }}</p>
            <p>Lugar: {{ $propuestaSeleccionada->pro_lugar }}</p>
            <p>Beneficiarios: {{ $propuestaSeleccionada->pro_beneficiarios }}</p>
            <p>Fecha: {{ \Carbon\Carbon::parse($propuestaSeleccionada->pro_created)->format('d/m/Y') }}</p>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="cerrarModal">Cerrar</x-secondary-button>
        </x-slot>
    @endif
</x-dialog-modal>
