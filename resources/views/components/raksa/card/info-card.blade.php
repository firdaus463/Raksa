@props(['title' => null])

<section {{ $attributes->merge() }} @class([
    // Bentuk & Warna
    'rounded-lg border border-slate-200 bg-white',

    // Jarak
    'p-5',

    // Bayangan
    'shadow-sm',
])>
    @if ($title)
        <h2 class="text-base font-semibold text-slate-950">{{ $title }}</h2>
    @endif

    <div @class(['mt-4' => $title])>
        {{ $slot }}
    </div>
</section>
