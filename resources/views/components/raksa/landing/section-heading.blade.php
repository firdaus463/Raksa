@props([
    'eyebrow'     => null,
    'title'       => null,
    'description' => null,
    'inverse'     => false,
])

<div {{ $attributes->merge(['class' => 'mx-auto max-w-3xl text-center']) }}>

    {{-- Eyebrow (label kecil di atas judul) --}}
    @if ($eyebrow)
        <p @class([
            // Teks
            'text-sm font-semibold sm:text-base',

            // Warna (kondisional)
            'text-white'       => $inverse,
            'text-raksa-text'  => !$inverse,
        ])>{{ $eyebrow }}</p>
    @endif

    {{-- Judul Utama --}}
    @if ($title)
        <h2 @class([
            // Jarak
            'mt-3',

            // Teks
            'text-2xl font-bold tracking-normal sm:text-3xl laptop:text-4xl desktop:text-4xl',

            // Warna (kondisional)
            'text-white'      => $inverse,
            'text-raksa-text' => !$inverse,
        ])>{{ $title }}</h2>
    @endif

    {{-- Deskripsi --}}
    @if ($description)
        <p @class([
            // Jarak
            'mt-4',

            // Teks
            'text-sm leading-7 sm:text-base',

            // Warna (kondisional)
            'text-blue-100'     => $inverse,
            'text-raksa-neutral' => !$inverse,
        ])>{{ $description }}</p>
    @endif

</div>
