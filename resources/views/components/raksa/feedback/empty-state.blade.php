@props(['title' => 'Belum ada data', 'description' => null])

<div {{ $attributes->merge() }} @class([
    // Layout
    'flex min-h-52 flex-col items-center justify-center',

    // Bentuk & Warna
    'rounded-lg border border-dashed border-slate-300 bg-white',

    // Jarak & Teks
    'p-8 text-center',
])>
    <h2 class="text-base font-semibold text-slate-950">{{ $title }}</h2>

    @if ($description)
        <p class="mt-2 max-w-md text-sm text-slate-600">{{ $description }}</p>
    @endif

    @if (! $slot->isEmpty())
        <div class="mt-4">{{ $slot }}</div>
    @endif
</div>
