@props([
    'number',
    'title',
    'description',
])

<li {{ $attributes->merge(['class' => 'relative flex flex-col items-center text-center']) }}>

    {{-- Nomor Langkah --}}
    <div @class([
        // Ukuran & Bentuk
        'flex h-16 w-16',
        'items-center justify-center rounded-full',

        // Warna & Bayangan
        'bg-white shadow-md ring-1 ring-slate-200',

        // Teks
        'text-base font-bold text-raksa-primary',
    ])>
        {{ $number }}
    </div>

    {{-- Judul --}}
    <h3 @class([
        // Jarak
        'mt-4',

        // Teks
        'text-base font-bold text-raksa-text',
    ])>{{ $title }}</h3>

    {{-- Deskripsi --}}
    <p @class([
        // Jarak
        'mt-2 max-w-36',

        // Teks
        'text-sm leading-6 text-raksa-neutral',
    ])>{{ $description }}</p>

</li>
