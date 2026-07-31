@props([
    'title',
    'description',
    'features' => [],
    'accent' => 'blue',
    'code' => null,
])

@php
    $accentClasses = [
        'blue'   => 'bg-raksa-primary-light text-raksa-primary',
        'orange' => 'bg-raksa-accent-light text-raksa-accent-dark',
    ];
@endphp

<article {{ $attributes->merge(['class' => 'rounded-2xl border border-raksa-border bg-white p-5 shadow-sm sm:p-6 laptop:p-8 desktop:p-8']) }}>

    {{-- Header Card --}}
    <div class="mb-6 flex items-start justify-between gap-4 sm:gap-6">
        <div>
            {{-- Icon --}}
            <div @class([
                // Ukuran & Bentuk
                'mb-6 inline-flex h-14 w-14 sm:mb-8 sm:h-16 sm:w-16',
                'items-center justify-center rounded-2xl',
                // Warna Aksen (dinamis)
                $accentClasses[$accent] ?? $accentClasses['blue'],
            ])>
                <span class="text-lg font-bold">{{ $code ?? substr($title, 0, 1) }}</span>
            </div>

            {{-- Judul --}}
            <h3 class="text-lg font-bold text-raksa-text sm:text-xl">{{ $title }}</h3>
        </div>

        {{-- Ilustrasi Mini (Desktop) --}}
        <div @class([
            'hidden h-28 w-28 sm:block laptop:h-32 laptop:w-32',
            'rounded-2xl bg-gradient-to-br from-slate-100 to-slate-200 p-4',
        ])>
            <div class="h-full rounded-xl border border-white/70 bg-white/80 p-3">
                <div class="mb-3 h-3 w-14 rounded-full bg-raksa-primary/20"></div>
                <div class="space-y-2">
                    <div class="h-2 rounded-full bg-raksa-primary/70"></div>
                    <div class="h-2 w-4/5 rounded-full bg-raksa-accent/70"></div>
                    <div class="h-2 w-2/3 rounded-full bg-slate-300"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Deskripsi --}}
    <p class="text-sm leading-7 text-raksa-neutral sm:text-base">{{ $description }}</p>

    {{-- Daftar Fitur --}}
    <div class="mt-7 grid gap-4 sm:grid-cols-2 laptop:mt-8">
        @foreach ($features as $feature)
            <div class="flex items-center gap-3">
                <span @class([
                    // Ukuran & Bentuk
                    'flex h-5 w-5 shrink-0',
                    'items-center justify-center rounded-full',
                    // Warna
                    'bg-raksa-primary/10',
                    // Teks
                    'text-xs font-bold text-raksa-primary',
                ])>&#10003;</span>
                <span class="text-sm font-medium text-raksa-text">{{ $feature }}</span>
            </div>
        @endforeach
    </div>

</article>
