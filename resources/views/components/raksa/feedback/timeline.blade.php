@props(['items' => []])

<ol {{ $attributes->merge(['class' => 'space-y-4']) }}>
    @forelse ($items as $item)
        <li @class([
            // Posisi & Border
            'relative border-l border-slate-200',

            // Jarak
            'pl-4',
        ])>
            {{-- Titik Timeline --}}
            <span @class([
                // Posisi
                'absolute -left-1.5 top-1',

                // Ukuran & Bentuk
                'h-3 w-3 rounded-full',

                // Warna
                'bg-slate-900',
            ])></span>

            {{-- Judul --}}
            <p class="text-sm font-medium text-slate-900">{{ $item['title'] ?? '' }}</p>

            {{-- Deskripsi --}}
            @if (! empty($item['description']))
                <p class="mt-1 text-sm text-slate-600">{{ $item['description'] }}</p>
            @endif
        </li>
    @empty
        {{ $slot }}
    @endforelse
</ol>
