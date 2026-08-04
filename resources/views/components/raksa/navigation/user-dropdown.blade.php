@props([
    'name' => null,
    'role' => 'Diskominfo Kota Bandung',
])

@php
    $isSurveyor = request()->is('surveyor*') || str_contains(auth()->user()?->email ?? '', 'surveyor') || str_contains(strtolower(auth()->user()?->name ?? ''), 'surveyor');
    $userName = $name ?? (auth()->user()->name ?? ($isSurveyor ? 'Budi Pratama (Surveyor)' : 'Admin EBMD'));
    $userRole = $role !== 'Diskominfo Kota Bandung' ? $role : ($isSurveyor ? 'Surveyor Lapangan' : 'Diskominfo Kota Bandung');
    $userInitials = strtoupper(substr($userName, 0, 2));
    $pengaturanUrl = $isSurveyor ? route('surveyor.pengaturan.index') : route('pengaturan.index');
@endphp

<div x-data="{ open: false }" @click.outside="open = false" class="relative">
    <button
        type="button"
        @click="open = !open"
        class="flex items-center gap-3 rounded-xl p-1.5 transition hover:bg-raksa-surface focus:outline-none"
        aria-expanded="false"
    >
        <div class="hidden text-right sm:block">
            <p class="text-xs sm:text-sm font-bold text-raksa-text leading-snug">{{ $userName }}</p>
            <p class="text-[11px] text-raksa-neutral/80">{{ $userRole }}</p>
        </div>

        <div class="flex h-9 w-9 sm:h-10 sm:w-10 shrink-0 items-center justify-center rounded-full bg-raksa-primary text-white font-bold text-xs sm:text-sm shadow-sm ring-2 ring-raksa-primary/20">
            {{ $userInitials }}
        </div>

        <svg class="h-4 w-4 text-slate-400 transition-transform duration-200" :class="open ? 'rotate-180' : ''" viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>

    {{-- Dropdown Menu Modal --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute right-0 mt-2 w-56 origin-top-right rounded-2xl border border-raksa-border/40 bg-white p-2 shadow-xl z-50"
        style="display: none;"
    >
        <div class="px-3 py-2 border-b border-slate-100">
            <p class="text-xs font-bold text-raksa-text">{{ $userName }}</p>
            <p class="text-[11px] text-slate-400 truncate">{{ auth()->user()->email ?? 'admin@ebmd.ac.id' }}</p>
        </div>

        <div class="py-1 space-y-0.5">
            <a href="{{ $pengaturanUrl }}" class="flex items-center gap-2.5 rounded-xl px-3 py-2 text-xs font-semibold text-raksa-neutral hover:bg-raksa-surface hover:text-raksa-primary transition">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z" stroke="currentColor" stroke-width="2"/></svg>
                Pengaturan Profil
            </a>
        </div>

        <div class="pt-1 border-t border-slate-100">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex w-full items-center gap-2.5 rounded-xl px-3 py-2 text-xs font-bold text-[#BA1A1A] hover:bg-red-50 transition">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4" stroke="currentColor" stroke-width="2"/><polyline points="16 17 21 12 16 7" stroke="currentColor" stroke-width="2"/><line x1="21" y1="12" x2="9" y2="12" stroke="currentColor" stroke-width="2"/></svg>
                    Keluar Sesi
                </button>
            </form>
        </div>
    </div>
</div>
