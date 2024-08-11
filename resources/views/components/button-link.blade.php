<a
    {{ $attributes->merge([
        'class' =>
            'inline-flex items-center px-4 py-2 bg-udh_3 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150 hover:opacity-85',
    ]) }}>
    {{ $slot }}
</a>
