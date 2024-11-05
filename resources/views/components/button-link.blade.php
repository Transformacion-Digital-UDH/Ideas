<a
    {{ $attributes->merge([
        'class' =>
            'inline-flex items-center py-2 bg-udh_3 border border-none rounded-md font-semibold text-xs text-white uppercase tracking-widest disabled:opacity-50 transition ease-in-out duration-150 hover:opacity-85',
    ]) }}>
    {{ $slot }}
</a>
