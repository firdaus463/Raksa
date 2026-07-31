@props(['title' => null, 'description' => null])

<div {{ $attributes->merge() }} @class([
    // Layout
    'mb-6 flex flex-col gap-4',
    'sm:flex-row sm:items-start sm:justify-between',
])>
    {{-- Judul & Breadcrumb --}}
    <div class="min-w-0">
        @isset($breadcrumb)
            <div class="mb-2">{{ $breadcrumb }}</div>
        @endisset

        <h1 class="text-2xl font-semibold tracking-normal text-slate-950">{{ $title }}</h1>

        @if ($description)
            <p class="mt-1 text-sm text-slate-600">{{ $description }}</p>
        @endif
    </div>

    {{-- Tombol Aksi --}}
    @isset($actions)
        <div @class([
            // Layout
            'flex shrink-0 flex-wrap items-center gap-2',
        ])>{{ $actions }}</div>
    @endisset
</div>
