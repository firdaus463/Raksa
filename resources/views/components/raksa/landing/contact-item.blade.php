@props([
    'label',
    'value',
    'code' => null,
])

<div {{ $attributes->merge(['class' => 'flex items-start gap-4']) }}>

    {{-- Icon / Inisial --}}
    <span @class([
        // Ukuran & Bentuk
        'flex h-12 w-12 shrink-0',
        'items-center justify-center rounded-xl',
        // Warna
        'bg-raksa-primary-light',
        // Teks
        'text-sm font-bold text-raksa-primary',
    ])>
        {{ $code ?? substr($label, 0, 1) }}
    </span>

    {{-- Konten --}}
    <div>
        <h3 class="text-base font-bold text-raksa-text">{{ $label }}</h3>
        <p class="mt-1 text-base leading-7 text-raksa-neutral">{{ $value }}</p>
    </div>

</div>
