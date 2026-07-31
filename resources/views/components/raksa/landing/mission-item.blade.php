@props([
    'number',
    'text',
])

<li {{ $attributes->merge(['class' => 'flex gap-4']) }}>

    {{-- Nomor --}}
    <span @class([
        // Teks
        'shrink-0 text-base font-bold',

        // Warna
        'text-raksa-accent',
    ])>{{ $number }}</span>

    {{-- Isi Misi --}}
    <p @class([
        // Teks
        'text-base font-semibold leading-7',

        // Warna
        'text-white',
    ])>{{ $text }}</p>

</li>
