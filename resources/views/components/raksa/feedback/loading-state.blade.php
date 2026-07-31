@props(['label' => 'Memuat data'])

<div {{ $attributes->merge() }} @class([
    // Layout
    'flex items-center justify-center gap-3',

    // Bentuk & Warna
    'rounded-lg border border-slate-200 bg-white',

    // Jarak
    'p-6',

    // Teks
    'text-sm text-slate-600',
])>
    {{-- Spinner Animasi --}}
    <span @class([
        // Ukuran & Bentuk
        'h-4 w-4 rounded-full',

        // Border Animasi
        'animate-spin',
        'border-2 border-slate-300 border-t-slate-900',
    ]) aria-hidden="true"></span>

    <span>{{ $label }}</span>
</div>
