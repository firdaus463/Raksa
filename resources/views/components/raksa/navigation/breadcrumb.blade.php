@props(['items' => []])

<nav {{ $attributes->merge() }} @class([
    // Layout
    'flex items-center gap-2',

    // Tipografi
    'text-sm text-slate-500',
]) aria-label="Breadcrumb">
    @foreach ($items as $item)
        @if (! $loop->first)
            <span aria-hidden="true">/</span>
        @endif

        @if (! empty($item['url']) && ! $loop->last)
            {{-- Item dengan link --}}
            <a href="{{ $item['url'] }}" class="hover:text-slate-900">
                {{ $item['label'] ?? '' }}
            </a>
        @else
            {{-- Item aktif (terakhir) atau tanpa link --}}
            <span @class([
                'font-medium text-slate-900' => $loop->last,
            ])>{{ $item['label'] ?? '' }}</span>
        @endif
    @endforeach
</nav>
