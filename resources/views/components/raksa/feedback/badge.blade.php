@props(['variant' => 'default'])

@php
    $variants = [
        'default' => 'bg-slate-100 text-slate-700',
        'success' => 'bg-emerald-100 text-emerald-700',
        'warning' => 'bg-amber-100 text-amber-800',
        'danger'  => 'bg-rose-100 text-rose-700',
        'info'    => 'bg-sky-100 text-sky-700',
    ];
@endphp

<span
    {{ $attributes->merge() }}
    @class([
        // Layout
        'inline-flex items-center',

        // Bentuk & Warna (dinamis)
        'rounded-full',
        $variants[$variant] ?? $variants['default'],

        // Ukuran & Jarak
        'px-2.5 py-0.5',

        // Tipografi
        'text-xs font-medium',
    ])
>
    {{ $slot }}
</span>
