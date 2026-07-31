@props([
    'label' => null,
    'value' => null,
    'change' => null,
    'trend' => 'up',
    'variant' => 'primary',
])

@php
    $variantStyles = [
        'primary' => 'bg-raksa-primary-light/40 text-raksa-primary',
        'success' => 'bg-emerald-100/70 text-emerald-700',
        'warning' => 'bg-amber-100/70 text-amber-800',
        'danger'  => 'bg-rose-100/70 text-rose-700',
        'info'    => 'bg-sky-100/70 text-sky-700',
    ];

    $badgeStyles = [
        'up'      => 'text-emerald-600 font-bold text-[11px]',
        'down'    => 'text-rose-600 font-bold text-[11px]',
        'neutral' => 'text-slate-500 font-bold text-[11px]',
    ];
@endphp

<article {{ $attributes->merge() }} @class([
    'flex flex-col justify-between rounded-2xl border border-slate-200/80 bg-white p-5 shadow-xs transition duration-200 hover:shadow-sm hover:border-slate-300',
])>
    <div class="flex items-start justify-between gap-3 mb-3">
        <span @class(['flex h-10 w-10 items-center justify-center rounded-xl shrink-0', $variantStyles[$variant] ?? $variantStyles['primary']])>
            @if(isset($icon))
                {{ $icon }}
            @else
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <rect x="3" y="3" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="2" />
                    <rect x="14" y="3" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="2" />
                    <rect x="14" y="14" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="2" />
                    <rect x="3" y="14" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="2" />
                </svg>
            @endif
        </span>

        @if ($change)
            <div class="inline-flex items-center gap-1 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-100">
                <span class="{{ $badgeStyles[$trend] ?? $badgeStyles['neutral'] }}">{{ $change }}</span>
                @if($trend === 'up')
                    <svg class="h-3 w-3 text-emerald-600" viewBox="0 0 24 24" fill="none"><path d="M12 19V5M5 12l7-7 7 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                @elseif($trend === 'down')
                    <svg class="h-3 w-3 text-rose-600" viewBox="0 0 24 24" fill="none"><path d="M12 5v14M5 12l7 7 7-7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                @endif
            </div>
        @endif
    </div>

    <div>
        <p class="text-xs font-semibold text-raksa-neutral/80 uppercase tracking-wider">{{ $label }}</p>
        <p class="mt-1 text-2xl font-extrabold text-raksa-text tracking-tight">{{ $value }}</p>
    </div>
</article>
