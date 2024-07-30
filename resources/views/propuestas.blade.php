<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Propuestas') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6">
                @foreach ($propuestas as $propuesta)
                    <div class="bg-white shadow-md rounded-lg p-8 flex flex-col justify-between">
                        <div class="flex items-center mb-4">
                            <h3 id="propuesta-title-{{ $loop->index }}" class="text-lg font-bold mr-4" title="{{ $propuesta->pro_titulo }}">{{ $propuesta->pro_titulo }}</h3>
                        </div>

                        <div>
                            <h3 id="propuesta-description-{{ $loop->index }}" class="text-md text-gray-800" title="{{ $propuesta->pro_descripcion }}">{{ $propuesta->pro_descripcion }}</h3>
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <p class="text-gray-600">Publicado el {{ $propuesta->pro_created->format('Y-m-d') }}</p>
                            <button class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-700">Postular</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
