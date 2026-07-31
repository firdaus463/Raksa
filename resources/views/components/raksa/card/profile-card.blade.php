@props(['name' => null, 'role' => null])

<section {{ $attributes->merge() }} @class([
    // Bentuk & Warna
    'rounded-lg border border-slate-200 bg-white',

    // Jarak
    'p-5',

    // Bayangan
    'shadow-sm',
])>
    <div class="flex items-center gap-4">

        {{-- Avatar --}}
        <div @class([
            // Ukuran & Bentuk
            'flex h-12 w-12 shrink-0',
            'items-center justify-center rounded-full',

            // Warna
            'bg-slate-100',

            // Teks
            'text-sm font-semibold text-slate-700',
        ])>
            {{ strtoupper(substr($name ?? 'R', 0, 1)) }}
        </div>

        {{-- Info --}}
        <div class="min-w-0">
            <h2 class="truncate text-base font-semibold text-slate-950">{{ $name }}</h2>
            @if ($role)
                <p class="text-sm text-slate-600">{{ $role }}</p>
            @endif
        </div>
    </div>

    @if (! $slot->isEmpty())
        <div class="mt-4">{{ $slot }}</div>
    @endif
</section>
