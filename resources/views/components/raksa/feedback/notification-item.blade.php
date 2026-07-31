@props(['title' => null, 'time' => null, 'unread' => false])

<div {{ $attributes->merge() }} @class([
    // Layout
    'flex gap-3',

    // Border
    'border-b border-slate-200 last:border-b-0',

    // Jarak
    'px-4 py-3',
])>
    {{-- Indikator Baca/Belum --}}
    <span @class([
        // Ukuran & Bentuk
        'mt-1 h-2 w-2 rounded-full',

        // Warna (kondisional)
        'bg-sky-500'   => $unread,
        'bg-slate-300' => ! $unread,
    ]) aria-hidden="true"></span>

    {{-- Konten --}}
    <div class="min-w-0 flex-1">
        <p class="text-sm font-medium text-slate-900">{{ $title }}</p>
        <div class="mt-1 text-sm text-slate-600">{{ $slot }}</div>

        @if ($time)
            <p class="mt-1 text-xs text-slate-400">{{ $time }}</p>
        @endif
    </div>
</div>
