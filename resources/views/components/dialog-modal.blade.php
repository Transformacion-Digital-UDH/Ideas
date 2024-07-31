@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        @isset($title)
            <div class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ $title }}
            </div>
        @endisset

        @isset($content)
            <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
                {{ $content }}
            </div>
        @endisset
    </div>

    <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 dark:bg-gray-800 text-end">
        @isset($footer)
            {{ $footer }}
        @endisset
    </div>
</x-modal>
