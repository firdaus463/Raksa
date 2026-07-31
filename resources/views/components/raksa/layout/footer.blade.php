<footer {{ $attributes->merge() }} @class([
    // Border & Warna
    'border-t border-slate-200 bg-white',

    // Jarak
    'px-4 py-4 sm:px-6 lg:px-8',

    // Tipografi
    'text-sm text-slate-500',
])>
    {{ $slot->isEmpty() ? 'RAKSA' : $slot }}
</footer>
