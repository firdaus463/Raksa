@props(['type' => 'button', 'variant' => 'primary', 'href' => null])

@php
    $variants = [
        'primary'   => 'bg-raksa-primary text-white hover:bg-raksa-primary-hover shadow-xs focus:ring-raksa-primary/20',
        'secondary' => 'border border-slate-200 bg-white text-raksa-text hover:bg-slate-50 focus:ring-slate-200 shadow-2xs',
        'outline'   => 'border border-slate-300 bg-transparent text-raksa-neutral hover:bg-slate-50 focus:ring-slate-300',
        'ghost'     => 'bg-raksa-surface-alt text-raksa-neutral hover:bg-slate-200 focus:ring-slate-300',
        'danger'    => 'bg-rose-600 text-white hover:bg-rose-700 focus:ring-rose-600/20 shadow-xs',
    ];

    $base = implode(' ', [
        'inline-flex items-center justify-center gap-2',
        'rounded-xl',
        'px-5 py-2.5',
        'text-sm font-semibold',
        'transition duration-200',
        'focus:outline-none focus:ring-2 focus:ring-offset-2',
        'disabled:cursor-not-allowed disabled:opacity-60',
    ]);

    $classes = $base . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
