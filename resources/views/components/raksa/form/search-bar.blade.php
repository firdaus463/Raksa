@props([
    'name' => 'search',
    'placeholder' => 'Cari data pengadaan, aset, atau surveyor...',
])

<div {{ $attributes->merge(['class' => 'relative w-full max-w-md']) }}>
    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </div>
    <input
        type="search"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        value="{{ request($name) }}"
        class="block w-full rounded-xl border border-slate-200 bg-raksa-surface py-2.5 pl-10 pr-4 text-xs sm:text-sm text-raksa-text placeholder:text-slate-400 transition duration-200 focus:border-raksa-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-raksa-primary/15 shadow-2xs"
    />
</div>
