@props([
    'label',
    'value',
    'percent' => 100,
    'accent' => 'blue',
])

@php
    $barColor  = $accent === 'orange' ? 'bg-raksa-accent'  : 'bg-raksa-primary';
    $textColor = $accent === 'orange' ? 'text-raksa-accent' : 'text-raksa-primary';
@endphp

<div {{ $attributes->merge(['class' => 'space-y-2']) }}>

    {{-- Label & Nilai --}}
    <div class="flex items-center justify-between gap-4">
        <span class="text-base text-raksa-neutral">{{ $label }}</span>
        <span @class([
            'text-base font-bold',
            $textColor,
        ])>{{ $value }}</span>
    </div>

    {{-- Batang Progress --}}
    <div @class([
        // Ukuran & Bentuk
        'h-10 overflow-hidden rounded-full',
        // Warna Background
        'bg-raksa-surface-alt',
    ])>
        <div
            @class([
                'h-full rounded-full',
                $barColor,
            ])
            style="width: {{ $percent }}%"
        ></div>
    </div>

</div>
