@props([
    'items' => [],
    'loginUrl' => '#',
])

<header
    data-landing-navbar
    {{ $attributes->merge(['class' => 'sticky top-0 z-50 border-b border-slate-200/70 bg-white/95 backdrop-blur supports-[backdrop-filter]:bg-white/90']) }}
>
    <div class="mx-auto flex h-16 max-w-[90rem] items-center justify-between px-4 sm:px-6 tablet-l:h-[4.5rem] tablet-l:gap-5 tablet-l:px-6 laptop:h-20 laptop:px-6 desktop:h-20 desktop:px-6">

        {{-- Logo --}}
        <a href="#beranda" class="flex min-w-0 items-center gap-3" data-scroll-link aria-label="RAKSA">
            <img
                src="{{ asset('assets/LOGO RAKSA.png') }}"
                alt="Logo RAKSA"
                @class([
                    // Ukuran
                    'h-11 w-auto sm:h-12 tablet-l:h-[3.25rem] laptop:h-14 desktop:h-16',

                    // Tampilan
                    'max-w-[9rem] object-contain tablet-l:max-w-[10rem] desktop:max-w-[11rem]',
                ])
            >
        </a>

        {{-- Menu Navigasi --}}
        <nav class="relative hidden h-full items-center gap-4 tablet-l:flex laptop:flex laptop:gap-6 desktop:flex desktop:gap-8" aria-label="Navigasi utama">
            @foreach ($items as $item)
                @php
                    $targetId = ltrim($item['href'] ?? '#', '#');
                @endphp
                <a
                    href="{{ $item['href'] ?? '#' }}"
                    data-nav-link
                    data-section-target="{{ $targetId }}"
                    @if ($loop->first) aria-current="page" @endif
                    @class([
                        // Base
                        'flex h-full items-center border-b-[3px] px-0.5 pt-[3px] text-sm font-semibold transition-colors duration-200 laptop:text-sm desktop:text-base',

                        // Aktif (item pertama)
                        'border-raksa-primary font-bold text-raksa-text' => $loop->first,

                        // Non-aktif
                        'border-transparent text-raksa-neutral hover:border-raksa-primary/30 hover:text-raksa-text' => ! $loop->first,
                    ])
                >
                    {{ $item['label'] ?? '' }}
                </a>
            @endforeach
            <span
                data-nav-indicator
                class="pointer-events-none absolute bottom-0 left-0 h-[3px] w-0 rounded-full bg-raksa-primary opacity-0 transition-all duration-300 ease-out"
                aria-hidden="true"
            ></span>
        </nav>

        {{-- Tombol Masuk --}}
        <a
            href="{{ $loginUrl }}"
            @class([
                // Layout & Posisi
                'hidden shrink-0 items-center justify-center tablet-l:inline-flex laptop:inline-flex desktop:inline-flex',

                // Bentuk & Warna
                'rounded-lg bg-raksa-primary',

                // Ukuran & Jarak
                'px-5 py-2.5 laptop:px-6 desktop:px-7 desktop:py-3',

                // Tipografi
                'text-sm font-semibold text-white',

                // Efek & Animasi
                'shadow-[0_4px_10px_rgba(0,72,174,0.25)]',
                'transition hover:bg-raksa-primary-hover',
            ])
        >
            Masuk
        </a>

        <button
            type="button"
            class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-lg border border-raksa-border/70 bg-white text-raksa-text shadow-sm transition hover:border-raksa-primary/40 hover:text-raksa-primary tablet-l:hidden laptop:hidden desktop:hidden"
            data-mobile-nav-toggle
            aria-label="Buka menu navigasi"
            aria-controls="landing-mobile-menu"
            aria-expanded="false"
        >
            <span class="sr-only">Menu</span>
            <span class="relative block h-5 w-5" aria-hidden="true">
                <span data-mobile-nav-line class="absolute left-0 top-0 h-0.5 w-5 rounded-full bg-current transition duration-200"></span>
                <span data-mobile-nav-line class="absolute left-0 top-2 h-0.5 w-5 rounded-full bg-current transition duration-200"></span>
                <span data-mobile-nav-line class="absolute left-0 top-4 h-0.5 w-5 rounded-full bg-current transition duration-200"></span>
            </span>
        </button>

    </div>

    <div data-mobile-nav-backdrop class="fixed inset-0 top-16 z-40 hidden bg-raksa-secondary/25 opacity-0 backdrop-blur-[1px] transition-opacity duration-200 tablet-l:hidden laptop:hidden desktop:hidden"></div>

    <div
        id="landing-mobile-menu"
        data-mobile-nav-menu
        class="fixed inset-x-3 top-[4.5rem] z-50 hidden -translate-y-3 rounded-2xl border border-slate-200 bg-white p-3 opacity-0 shadow-2xl transition duration-200 ease-out tablet-l:hidden laptop:hidden desktop:hidden"
    >
        <nav class="grid gap-1" aria-label="Navigasi utama mobile">
            @foreach ($items as $item)
                @php
                    $targetId = ltrim($item['href'] ?? '#', '#');
                @endphp
                <a
                    href="{{ $item['href'] ?? '#' }}"
                    data-nav-link
                    data-section-target="{{ $targetId }}"
                    @if ($loop->first) aria-current="page" @endif
                    @class([
                        'rounded-xl border-l-4 px-4 py-3 text-sm font-semibold transition duration-200',
                        'border-raksa-primary bg-raksa-primary-light text-raksa-primary' => $loop->first,
                        'border-transparent text-raksa-neutral hover:bg-raksa-surface hover:text-raksa-text' => ! $loop->first,
                    ])
                >
                    {{ $item['label'] ?? '' }}
                </a>
            @endforeach
        </nav>

        <a
            href="{{ $loginUrl }}"
            class="mt-3 flex items-center justify-center rounded-xl bg-raksa-primary px-5 py-3 text-sm font-semibold text-white shadow-[0_4px_10px_rgba(0,72,174,0.25)] transition hover:bg-raksa-primary-hover"
        >
            Masuk
        </a>
    </div>
</header>
