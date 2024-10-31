<button
    {{ $attributes->merge([
        'type' => 'button',
        'class' =>
            'inline-flex items-center p-1 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest focus:outline-none focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-300 transform hover:-translate-y-1',
    ]) }}>
    {{ $slot }}
</button>