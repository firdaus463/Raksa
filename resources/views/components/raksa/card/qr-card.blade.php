@props(['title' => null, 'code' => null])

<section {{ $attributes->merge() }} @class([
    // Bentuk & Warna
    'rounded-lg border border-slate-200 bg-white',

    // Jarak & Teks Tengah
    'p-5 text-center',

    // Bayangan
    'shadow-sm',
])>
    @if ($title)
        <h2 class="text-base font-semibold text-slate-950">{{ $title }}</h2>
    @endif

    {{-- Area QR Code --}}
    <div @class([
        // Layout
        'mx-auto mt-4 flex aspect-square w-40',
        'items-center justify-center',

        // Bentuk & Warna
        'rounded-md border border-slate-200 bg-slate-50',

        // Teks
        'text-sm text-slate-500',
    ])>
        {{ $slot->isEmpty() ? $code : $slot }}
    </div>
</section>
