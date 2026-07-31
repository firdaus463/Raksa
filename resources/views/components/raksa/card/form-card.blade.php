{{-- Section Card: wrapper for form sections inside Tambah Pengadaan --}}
@props(['title' => null])

<div {{ $attributes->merge(['class' => 'bg-white rounded-2xl border border-raksa-border/10 shadow-sm']) }}>
    <div class="p-6">
        {{-- Section Header --}}
        @if ($title)
            <div class="flex items-center gap-3 pb-4 mb-5 border-b border-raksa-border/20">
                @isset($icon)
                    <span class="shrink-0 text-raksa-primary">{{ $icon }}</span>
                @endisset
                <h3 class="text-base font-bold text-raksa-text">{{ $title }}</h3>
            </div>
        @endif

        {{-- Section Body --}}
        {{ $slot }}
    </div>
</div>
