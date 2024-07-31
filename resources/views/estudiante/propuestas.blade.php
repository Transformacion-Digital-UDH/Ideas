<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Propuestas') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6">
            <livewire:propuestas.lista-propuestas />
            <livewire:propuestas.modal-propuesta />
        </div>
    </div>
</x-app-layout>
