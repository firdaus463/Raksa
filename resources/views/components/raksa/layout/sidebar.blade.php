@props([
    'items' => null,
])

@php
    $isSurveyor = request()->is('surveyor*') || str_contains(auth()->user()?->email ?? '', 'surveyor') || str_contains(strtolower(auth()->user()?->name ?? ''), 'surveyor');

    $adminDefaultItems = [
        [
            'label' => 'Dashboard',
            'url' => route('dashboard'),
            'active' => request()->routeIs('dashboard'),
            'icon' => 'dashboard',
        ],
        [
            'label' => 'Pengadaan',
            'url' => url('/admin/pengadaan'),
            'active' => request()->is('admin/pengadaan*') || request()->is('admin/aset*'),
            'icon' => 'pengadaan',
            'children' => [
                ['label' => 'Tambah Pengadaan', 'url' => url('/admin/pengadaan/create')],
                ['label' => 'Riwayat Pengadaan', 'url' => url('/admin/pengadaan')],
                ['label' => 'Data Aset', 'url' => url('/admin/aset')],
            ],
        ],
        [
            'label' => 'User',
            'url' => url('/admin/user'),
            'active' => request()->is('admin/user*'),
            'icon' => 'user',
        ],
        [
            'label' => 'Monitoring',
            'url' => url('/admin/monitoring'),
            'active' => request()->is('admin/monitoring*'),
            'icon' => 'monitoring',
        ],
        [
            'label' => 'Inbox',
            'url' => url('/admin/inbox'),
            'active' => request()->is('admin/inbox*'),
            'icon' => 'inbox',
        ],
    ];

    $surveyorDefaultItems = [
        [
            'label' => 'Dashboard',
            'url' => route('surveyor.dashboard'),
            'active' => request()->routeIs('surveyor.dashboard*'),
            'icon' => 'dashboard',
        ],
        [
            'label' => 'Sensus',
            'url' => route('surveyor.sensus.index'),
            'active' => request()->routeIs('surveyor.sensus*'),
            'icon' => 'pengadaan',
        ],
        [
            'label' => 'Riwayat Sensus',
            'url' => route('surveyor.riwayat.index'),
            'active' => request()->routeIs('surveyor.riwayat*'),
            'icon' => 'monitoring',
        ],
        [
            'label' => 'Inbox',
            'url' => route('surveyor.inbox.index'),
            'active' => request()->routeIs('surveyor.inbox*'),
            'icon' => 'inbox',
        ],
    ];

    $menuItems = $items ?? ($isSurveyor ? $surveyorDefaultItems : $adminDefaultItems);
    $pengaturanUrl = $isSurveyor ? route('surveyor.pengaturan.index') : route('pengaturan.index');
    $pengaturanActive = $isSurveyor ? request()->routeIs('surveyor.pengaturan*') : request()->routeIs('pengaturan.*');
@endphp

{{-- Desktop & Tablet Permanent Sidebar --}}
<aside
    :class="collapsed ? 'w-20' : 'w-72'"
    class="hidden md:flex relative shrink-0 flex-col border-r border-raksa-border/40 bg-white transition-all duration-300 ease-in-out shadow-sm min-h-screen z-20"
>
    {{-- Header Sidebar (Logo & Collapse Toggle Button) --}}
    <div class="flex h-20 items-center justify-between px-5 border-b border-slate-100">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 overflow-hidden">
            <img
                src="{{ asset('assets/LOGO RAKSA.png') }}"
                alt="Logo RAKSA"
                class="h-11 sm:h-12 max-h-12 w-auto object-contain transition-all duration-200 shrink-0"
            />
        </a>

        <button
            type="button"
            @click="collapsed = !collapsed"
            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl text-slate-400 hover:bg-slate-100 hover:text-slate-600 transition"
            :title="collapsed ? 'Perluas Sidebar' : 'Ciutkan Sidebar'"
            aria-label="Toggle Sidebar"
        >
            <svg class="h-5 w-5 transition-transform duration-300" :class="collapsed ? 'rotate-180' : ''" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>

    {{-- Body Sidebar / Menu List --}}
    <div class="flex flex-1 flex-col justify-between overflow-y-auto px-3.5 py-5 space-y-6">
        <div class="space-y-4">
            {{-- Menu Section Label --}}
            <div class="px-3" x-show="!collapsed">
                <span class="text-xs font-bold uppercase tracking-wider text-raksa-neutral/70">Menu</span>
            </div>

            {{-- Main Navigation Menu Items --}}
            <nav class="space-y-1.5" aria-label="Sidebar Admin">
                @foreach ($menuItems as $index => $item)
                    @if(!empty($item['children']))
                        {{-- Dropdown Menu Item (Pengadaan) --}}
                        <div x-data="{ open: {{ $item['active'] ? 'true' : 'false' }} }" class="space-y-1">
                            <button
                                type="button"
                                @click="open = !open"
                                @class([
                                    'group flex w-full items-center justify-between rounded-xl px-3.5 py-3 text-sm font-semibold transition duration-150',
                                    'bg-raksa-primary/10 text-raksa-primary font-bold' => $item['active'],
                                    'text-slate-600 hover:bg-slate-50 hover:text-slate-900' => !$item['active'],
                                ])
                            >
                                <div class="flex items-center gap-3.5 min-w-0">
                                    <span class="shrink-0">
                                        @if(($item['icon'] ?? '') === 'pengadaan')
                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" stroke="currentColor" stroke-width="2"/></svg>
                                        @endif
                                    </span>
                                    <span class="truncate" x-show="!collapsed">{{ $item['label'] }}</span>
                                </div>

                                <svg
                                    class="h-4 w-4 shrink-0 transition-transform duration-200"
                                    :class="open ? 'rotate-180' : ''"
                                    x-show="!collapsed"
                                    viewBox="0 0 24 24" fill="none" aria-hidden="true"
                                >
                                    <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>

                            {{-- Submenu Dropdown --}}
                            <div
                                x-show="open && !collapsed"
                                x-collapse
                                class="pl-10 pr-2 space-y-1 pt-1"
                            >
                                @foreach ($item['children'] as $child)
                                    <a
                                        href="{{ $child['url'] }}"
                                        @class([
                                            'block rounded-lg px-3 py-2 text-xs font-semibold transition',
                                            'text-raksa-primary bg-raksa-primary/10 font-bold' => request()->url() === $child['url'],
                                            'text-slate-500 hover:bg-slate-50 hover:text-slate-800' => request()->url() !== $child['url'],
                                        ])
                                    >
                                        {{ $child['label'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        {{-- Single Menu Item --}}
                        <x-raksa.navigation.menu-item
                            :label="$item['label']"
                            :url="$item['url']"
                            :active="$item['active']"
                        >
                            <x-slot:icon>
                                @if(($item['icon'] ?? '') === 'dashboard')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="2"/><rect x="14" y="3" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="2"/><rect x="14" y="14" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="2"/><rect x="3" y="14" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="2"/></svg>
                                @elseif(($item['icon'] ?? '') === 'user')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" stroke="currentColor" stroke-width="2"/><circle cx="10" cy="7" r="4" stroke="currentColor" stroke-width="2"/></svg>
                                @elseif(($item['icon'] ?? '') === 'monitoring')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M3 3v18h18" stroke="currentColor" stroke-width="2"/><path d="M18 9l-5 5-4-4-4 4" stroke="currentColor" stroke-width="2"/></svg>
                                @elseif(($item['icon'] ?? '') === 'inbox')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke="currentColor" stroke-width="2"/><polyline points="22,6 12,13 2,6" stroke="currentColor" stroke-width="2"/></svg>
                                @else
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/></svg>
                                @endif
                            </x-slot:icon>
                        </x-raksa.navigation.menu-item>
                    @endif
                @endforeach
            </nav>
        </div>

        {{-- Bottom Actions (Pengaturan & Logout) --}}
        <div class="space-y-2 pt-4 border-t border-raksa-border/40">
            <x-raksa.navigation.menu-item
                label="Pengaturan"
                :url="$pengaturanUrl"
                :active="$pengaturanActive"
            >
                <x-slot:icon>
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z" stroke="currentColor" stroke-width="2"/></svg>
                </x-slot:icon>
            </x-raksa.navigation.menu-item>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    class="group flex w-full items-center gap-3.5 rounded-xl px-3.5 py-3 text-sm font-bold text-[#BA1A1A] hover:bg-red-50 transition duration-150"
                    :title="collapsed ? 'Keluar' : ''"
                >
                    <span class="shrink-0 text-[#BA1A1A]">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4" stroke="currentColor" stroke-width="2"/><polyline points="16 17 21 12 16 7" stroke="currentColor" stroke-width="2"/><line x1="21" y1="12" x2="9" y2="12" stroke="currentColor" stroke-width="2"/></svg>
                    </span>
                    <span class="truncate" x-show="!collapsed">Keluar</span>
                </button>
            </form>
        </div>
    </div>
</aside>

{{-- Mobile Offcanvas Drawer (Mobile screens < md) --}}
<div
    x-show="mobileSidebarOpen"
    x-transition:enter="transition-opacity ease-linear duration-200"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition-opacity ease-linear duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-40 bg-slate-900/50 backdrop-blur-xs md:hidden"
    style="display: none;"
    @click="mobileSidebarOpen = false"
></div>

<div
    x-show="mobileSidebarOpen"
    x-transition:enter="transition ease-in-out duration-300 transform"
    x-transition:enter-start="-translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in-out duration-300 transform"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full"
    class="fixed inset-y-0 left-0 z-50 flex w-72 flex-col bg-white shadow-2xl md:hidden"
    style="display: none;"
>
    <div class="flex h-20 items-center justify-between px-5 border-b border-slate-100">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
            <img src="{{ asset('assets/LOGO RAKSA.png') }}" alt="Logo RAKSA" class="h-11 w-auto object-contain" />
        </a>
        <button
            type="button"
            @click="mobileSidebarOpen = false"
            class="flex h-9 w-9 items-center justify-center rounded-xl text-slate-400 hover:bg-slate-100 hover:text-slate-600 transition"
        >
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
        </button>
    </div>

    <div class="flex flex-1 flex-col justify-between overflow-y-auto px-4 py-5 space-y-6">
        <div class="space-y-4">
            <div class="px-3">
                <span class="text-xs font-bold uppercase tracking-wider text-raksa-neutral/70">Menu</span>
            </div>
            <nav class="space-y-1.5">
                @foreach ($menuItems as $item)
                    @if(!empty($item['children']))
                        <div x-data="{ open: {{ $item['active'] ? 'true' : 'false' }} }" class="space-y-1">
                            <button
                                type="button"
                                @click="open = !open"
                                @class([
                                    'flex w-full items-center justify-between rounded-xl px-3.5 py-3 text-sm font-semibold transition',
                                    'bg-raksa-primary/10 text-raksa-primary font-bold' => $item['active'],
                                    'text-slate-600 hover:bg-slate-50 hover:text-slate-900' => !$item['active'],
                                ])
                            >
                                <span>{{ $item['label'] }}</span>
                                <svg class="h-4 w-4 shrink-0 transition-transform duration-200" :class="open ? 'rotate-180' : ''" viewBox="0 0 24 24" fill="none"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </button>
                            <div x-show="open" x-collapse class="pl-8 space-y-1 pt-1">
                                @foreach ($item['children'] as $child)
                                    <a
                                        href="{{ $child['url'] }}"
                                        @class([
                                            'block rounded-lg px-3 py-2 text-xs font-semibold transition',
                                            'text-raksa-primary bg-raksa-primary/10 font-bold' => request()->url() === $child['url'],
                                            'text-slate-500 hover:bg-slate-50 hover:text-slate-800' => request()->url() !== $child['url'],
                                        ])
                                    >
                                        {{ $child['label'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <a
                            href="{{ $item['url'] }}"
                            @class([
                                'flex items-center gap-3.5 rounded-xl px-3.5 py-3 text-sm font-semibold transition',
                                'bg-raksa-primary/10 text-raksa-primary font-bold' => $item['active'],
                                'text-slate-600 hover:bg-slate-50 hover:text-slate-900' => !$item['active'],
                            ])
                        >
                            <span>{{ $item['label'] }}</span>
                        </a>
                    @endif
                @endforeach
            </nav>
        </div>

        <div class="pt-4 border-t border-slate-100">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex w-full items-center gap-3 rounded-xl px-3.5 py-3 text-sm font-bold text-[#BA1A1A] hover:bg-red-50 transition">
                    Keluar Sesi
                </button>
            </form>
        </div>
    </div>
</div>


