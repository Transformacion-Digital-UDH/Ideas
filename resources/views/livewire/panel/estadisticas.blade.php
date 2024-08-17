<div class="px-6 bg-gray-100">
    {{-- <pre>
        @php
            print_r($num_users);
        @endphp
    </pre> --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Usuarios -->
        @livewire('panel.e-usuarios')

        <!-- Necesidades -->
        @livewire('panel.e-necesidades')

        <!-- Propuestas -->
        @livewire('panel.e-propuestas')

        <!-- Equipos -->
        @livewire('panel.e-equipos')

    </div>
</div>
