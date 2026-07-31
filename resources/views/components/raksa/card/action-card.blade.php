@props(['title' => null, 'description' => null, 'href' => null])

<a
    href="{{ $href ?? '#' }}"
    {{ $attributes->merge() }}
    @class([
        // Layout
        'block',

        // Bentuk & Warna
        'rounded-lg border border-slate-200 bg-white',

        // Jarak
        'p-5',

        // Bayangan & Efek
        'shadow-sm transition',
        'hover:border-slate-300 hover:shadow',
    ])
>
    <h2 class="text-base font-semibold text-slate-950">{{ $title }}</h2>

    @if ($description)
        <p class="mt-2 text-sm text-slate-600">{{ $description }}</p>
    @endif

    {{ $slot }}
</a>
