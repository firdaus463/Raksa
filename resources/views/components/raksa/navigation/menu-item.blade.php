@props([
    'label' => '',
    'url' => '#',
    'active' => false,
    'icon' => null,
])

<a
    href="{{ $url }}"
    @class([
        'group flex items-center gap-3.5 rounded-xl px-3.5 py-3 text-sm font-semibold transition duration-150',
        'bg-raksa-primary-light/40 text-raksa-primary font-bold shadow-xs' => $active,
        'text-slate-600 hover:bg-slate-50 hover:text-slate-900' => !$active,
    ])
    {{ $attributes }}
>
    @if(isset($icon))
        <span class="shrink-0 text-current">
            {{ $icon }}
        </span>
    @endif

    <span class="truncate" x-show="!collapsed">{{ $label }}</span>
</a>
