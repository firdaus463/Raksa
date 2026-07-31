@props(['paginator' => null])

<div {{ $attributes->merge() }} @class([
    // Layout
    'flex items-center justify-between gap-4',

    // Border & Warna
    'border-t border-slate-200 bg-white',

    // Jarak
    'px-4 py-3',
])>
    @if ($paginator)
        {{ $paginator->links() }}
    @else
        {{ $slot }}
    @endif
</div>
