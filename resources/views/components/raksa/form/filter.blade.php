@props(['title' => null])

<section {{ $attributes->merge() }} @class([
    // Bentuk & Warna
    'rounded-lg border border-slate-200 bg-white',

    // Jarak
    'p-4',

    // Bayangan
    'shadow-sm',
])>
    @if ($title)
        <h2 class="mb-4 text-sm font-semibold text-slate-950">{{ $title }}</h2>
    @endif

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        {{ $slot }}
    </div>
</section>
