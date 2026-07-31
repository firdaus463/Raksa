<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Data Aset - RAKSA</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-raksa-background font-sans text-raksa-text antialiased" x-data="{ collapsed: false, mobileSidebarOpen: false }">
    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <x-raksa.layout.sidebar />

        {{-- Main Area --}}
        <div class="flex flex-1 flex-col min-w-0">
            {{-- Top Navbar --}}
            <x-raksa.layout.navbar title="Data Aset" />

            {{-- Main Content --}}
            <main class="flex-1 p-4 sm:p-6 laptop:p-8 space-y-6">

                {{-- Breadcrumb & Page Header --}}
                <x-raksa.navigation.page-header
                    title="Data Aset"
                    description="Kelola dan pantau seluruh inventaris aset milik Diskominfo Kota Bandung"
                >
                    <x-slot:breadcrumb>
                        <x-raksa.navigation.breadcrumb :items="[
                            ['label' => 'Dashboard', 'url' => route('dashboard')],
                            ['label' => 'Pengadaan', 'url' => route('pengadaan.index')],
                            ['label' => 'Data Aset'],
                        ]" />
                    </x-slot:breadcrumb>

                    <x-slot:actions>
                        <x-raksa.action.button variant="primary" href="{{ route('aset.create') }}">
                            <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/>
                            </svg>
                            <span>Tambah Aset Baru</span>
                        </x-raksa.action.button>
                    </x-slot:actions>
                </x-raksa.navigation.page-header>

                {{-- Summary Statistics Section (4 Cards Grid) --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
                    {{-- Card 1: Total Aset --}}
                    <x-raksa.card.statistic-card
                        label="TOTAL ASET"
                        value="1,284"
                        variant="primary"
                    >
                        <x-slot:icon>
                            <svg class="h-5 w-5 text-raksa-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </x-slot:icon>
                    </x-raksa.card.statistic-card>

                    {{-- Card 2: Aset Aktif --}}
                    <x-raksa.card.statistic-card
                        label="ASET AKTIF"
                        value="1,120"
                        variant="success"
                    >
                        <x-slot:icon>
                            <svg class="h-5 w-5 text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </x-slot:icon>
                    </x-raksa.card.statistic-card>

                    {{-- Card 3: Aset Nonaktif --}}
                    <x-raksa.card.statistic-card
                        label="ASET NONAKTIF"
                        value="164"
                        variant="danger"
                    >
                        <x-slot:icon>
                            <svg class="h-5 w-5 text-rose-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                            </svg>
                        </x-slot:icon>
                    </x-raksa.card.statistic-card>

                    {{-- Card 4: Total Nilai --}}
                    <x-raksa.card.statistic-card
                        label="TOTAL NILAI"
                        value="Rp 4.2B"
                        variant="warning"
                    >
                        <x-slot:icon>
                            <svg class="h-5 w-5 text-raksa-accent-dark" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </x-slot:icon>
                    </x-raksa.card.statistic-card>
                </div>

                {{-- Filter Toolbar Section --}}
                <div class="rounded-2xl border border-raksa-border/20 bg-white p-4 sm:p-5 shadow-sm space-y-4 lg:space-y-0 lg:flex lg:items-center lg:justify-between lg:gap-4">
                    {{-- Search Bar --}}
                    <x-raksa.form.search-bar
                        name="search"
                        placeholder="Cari nama barang, serial number, atau pemegang barang..."
                        class="max-w-full lg:max-w-md shrink-0"
                    />

                    {{-- Filters & Clear Button --}}
                    <div class="flex flex-col sm:flex-row flex-wrap items-stretch sm:items-center gap-3">
                        <x-raksa.form.form-select
                            name="pengadaan"
                            :options="[
                                '' => 'Pengadaan',
                                'pembelian' => 'Pembelian',
                                'hibah' => 'Hibah',
                                'sewa' => 'Sewa',
                            ]"
                            class="!py-2 text-xs"
                        />

                        <x-raksa.form.form-select
                            name="kategori"
                            :options="[
                                '' => 'Kategori',
                                'elektronik' => 'Elektronik',
                                'furnitur' => 'Furnitur',
                                'kendaraan' => 'Kendaraan',
                                'peralatan' => 'Peralatan Kantor',
                            ]"
                            class="!py-2 text-xs"
                        />

                        <x-raksa.form.form-select
                            name="status"
                            :options="[
                                '' => 'Status',
                                'tersedia' => 'Tersedia',
                                'dipinjam' => 'Dipinjam',
                                'perbaikan' => 'Dalam Perbaikan',
                            ]"
                            class="!py-2 text-xs"
                        />

                        <button type="button" class="inline-flex items-center justify-center p-2.5 rounded-xl border border-raksa-border/40 text-slate-400 hover:text-raksa-primary hover:bg-raksa-surface transition" title="Hapus semua filter">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Table Section (Daftar Inventaris Aset) --}}
                <div class="rounded-2xl border border-raksa-border/20 bg-white shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-raksa-text divide-y divide-raksa-border/20">
                            <thead class="bg-raksa-surface-alt text-xs font-bold text-raksa-neutral uppercase tracking-wider border-b border-raksa-border/20">
                                <tr>
                                    <th scope="col" class="py-4 px-6">NAMA BARANG</th>
                                    <th scope="col" class="py-4 px-6">KATEGORI</th>
                                    <th scope="col" class="py-4 px-6">NOMOR SPK</th>
                                    <th scope="col" class="py-4 px-6">PEMEGANG</th>
                                    <th scope="col" class="py-4 px-6">STATUS</th>
                                    <th scope="col" class="py-4 px-6 text-center">QR / PAKTA</th>
                                    <th scope="col" class="py-4 px-6 text-center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-raksa-border/20 bg-white">
                                {{-- Row 1 --}}
                                <tr class="hover:bg-raksa-surface/60 transition duration-150" x-data="{ active: true }">
                                    <td class="py-4 px-6">
                                        <span class="font-bold text-raksa-text block">MacBook Pro M2 14"</span>
                                        <span class="font-mono text-xs text-raksa-neutral block">SN: APPL-99283-X</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-raksa-neutral">
                                            Peralatan Kantor
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 font-mono text-xs font-medium text-raksa-text">
                                        SPK/DKI/2023/102
                                    </td>
                                    <td class="py-4 px-6 font-medium text-raksa-text">
                                        Herman Suherman
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center gap-1.5 rounded-full px-3 py-1 text-xs font-semibold"
                                            :class="active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-600'">
                                            <span class="h-1.5 w-1.5 rounded-full" :class="active ? 'bg-emerald-500' : 'bg-slate-400'"></span>
                                            <span x-text="active ? 'Aktif' : 'Nonaktif'"></span>
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <div class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-raksa-surface border border-raksa-border/30 p-1">
                                            <svg class="h-full w-full text-slate-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                                            </svg>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <div class="inline-flex items-center gap-2 justify-center">
                                            <a href="{{ route('aset.show') }}" class="p-2 rounded-lg text-slate-400 hover:text-raksa-primary hover:bg-raksa-primary/10 transition" title="Lihat Detail">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </a>
                                            <button type="button" class="p-2 rounded-lg text-slate-400 hover:text-amber-600 hover:bg-amber-50 transition" title="Edit">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </button>
                                            {{-- Toggle Switch --}}
                                            <button type="button" role="switch" :aria-checked="active" @click="active = !active"
                                                class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-raksa-primary focus:ring-offset-2"
                                                :class="active ? 'bg-raksa-primary' : 'bg-slate-300'">
                                                <span class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
                                                    :class="active ? 'translate-x-5' : 'translate-x-0'"></span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                {{-- Row 2 --}}
                                <tr class="hover:bg-raksa-surface/60 transition duration-150" x-data="{ active: false }">
                                    <td class="py-4 px-6">
                                        <span class="font-bold text-raksa-text block">Honda Vario 160 CBS</span>
                                        <span class="font-mono text-xs text-raksa-neutral block">D 4452 ABD</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-raksa-neutral">
                                            Kendaraan
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 font-mono text-xs font-medium text-raksa-text">
                                        SPK/DKI/2023/088
                                    </td>
                                    <td class="py-4 px-6 font-medium text-raksa-text">
                                        Siti Aminah
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center gap-1.5 rounded-full px-3 py-1 text-xs font-semibold"
                                            :class="active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-600'">
                                            <span class="h-1.5 w-1.5 rounded-full" :class="active ? 'bg-emerald-500' : 'bg-slate-400'"></span>
                                            <span x-text="active ? 'Aktif' : 'Nonaktif'"></span>
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <div class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-raksa-surface border border-raksa-border/30 p-1">
                                            <svg class="h-full w-full text-slate-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                                            </svg>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <div class="inline-flex items-center gap-2 justify-center">
                                            <a href="{{ route('aset.show') }}" class="p-2 rounded-lg text-slate-400 hover:text-raksa-primary hover:bg-raksa-primary/10 transition" title="Lihat Detail">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </a>
                                            <button type="button" class="p-2 rounded-lg text-slate-400 hover:text-amber-600 hover:bg-amber-50 transition" title="Edit">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </a>
                                            {{-- Toggle Switch --}}
                                            <button type="button" role="switch" :aria-checked="active" @click="active = !active"
                                                class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-raksa-primary focus:ring-offset-2"
                                                :class="active ? 'bg-raksa-primary' : 'bg-slate-300'">
                                                <span class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
                                                    :class="active ? 'translate-x-5' : 'translate-x-0'"></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                {{-- Row 3 --}}
                                <tr class="hover:bg-raksa-surface/60 transition duration-150" x-data="{ active: false }">
                                    <td class="py-4 px-6">
                                        <span class="font-bold text-raksa-text block">Projector Epson EB-X500</span>
                                        <span class="font-mono text-xs text-raksa-neutral block">SN: EPSN-2210-Z</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-raksa-neutral">
                                            Elektronik
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 font-mono text-xs font-medium text-raksa-text">
                                        SPK/DKI/2022/115
                                    </td>
                                    <td class="py-4 px-6 font-medium text-raksa-text">
                                        Ruang Rapat A
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center gap-1.5 rounded-full px-3 py-1 text-xs font-semibold"
                                            :class="active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-600'">
                                            <span class="h-1.5 w-1.5 rounded-full" :class="active ? 'bg-emerald-500' : 'bg-slate-400'"></span>
                                            <span x-text="active ? 'Aktif' : 'Nonaktif'"></span>
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <div class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-raksa-surface border border-raksa-border/30 p-1">
                                            <svg class="h-full w-full text-slate-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                                            </svg>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <div class="inline-flex items-center gap-2 justify-center">
                                            <a href="{{ route('aset.show') }}" class="p-2 rounded-lg text-slate-400 hover:text-raksa-primary hover:bg-raksa-primary/10 transition" title="Lihat Detail">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </a>
                                            <button type="button" class="p-2 rounded-lg text-slate-400 hover:text-amber-600 hover:bg-amber-50 transition" title="Edit">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </a>
                                            {{-- Toggle Switch --}}
                                            <button type="button" role="switch" :aria-checked="active" @click="active = !active"
                                                class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-raksa-primary focus:ring-offset-2"
                                                :class="active ? 'bg-raksa-primary' : 'bg-slate-300'">
                                                <span class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
                                                    :class="active ? 'translate-x-5' : 'translate-x-0'"></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                {{-- Row 4 --}}
                                <tr class="hover:bg-raksa-surface/60 transition duration-150" x-data="{ active: false }">
                                    <td class="py-4 px-6">
                                        <span class="font-bold text-raksa-text block">Meja Kerja Eselon III</span>
                                        <span class="font-mono text-xs text-raksa-neutral block">INV-MBL-2023-01</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-raksa-neutral">
                                            Furniture
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 font-mono text-xs font-medium text-raksa-text">
                                        SPK/DKI/2023/044
                                    </td>
                                    <td class="py-4 px-6 font-medium text-raksa-text">
                                        Dani Ramdani
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center gap-1.5 rounded-full px-3 py-1 text-xs font-semibold"
                                            :class="active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-600'">
                                            <span class="h-1.5 w-1.5 rounded-full" :class="active ? 'bg-emerald-500' : 'bg-slate-400'"></span>
                                            <span x-text="active ? 'Aktif' : 'Nonaktif'"></span>
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <div class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-raksa-surface border border-raksa-border/30 p-1">
                                            <svg class="h-full w-full text-slate-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                                            </svg>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <div class="inline-flex items-center gap-2 justify-center">
                                            <a href="{{ route('aset.show') }}" class="p-2 rounded-lg text-slate-400 hover:text-raksa-primary hover:bg-raksa-primary/10 transition" title="Lihat Detail">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </a>
                                            <button type="button" class="p-2 rounded-lg text-slate-400 hover:text-amber-600 hover:bg-amber-50 transition" title="Edit">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </a>
                                            {{-- Toggle Switch --}}
                                            <button type="button" role="switch" :aria-checked="active" @click="active = !active"
                                                class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-raksa-primary focus:ring-offset-2"
                                                :class="active ? 'bg-raksa-primary' : 'bg-slate-300'">
                                                <span class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
                                                    :class="active ? 'translate-x-5' : 'translate-x-0'"></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- Table Pagination Footer --}}
                    <div class="px-6 py-4 border-t border-raksa-border/20 bg-raksa-surface-alt/40 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-raksa-neutral">
                        <div>
                            Menampilkan <strong class="font-semibold text-raksa-text">1-10</strong> dari 1,284 aset
                        </div>

                        <nav class="inline-flex items-center gap-1" aria-label="Navigasi Halaman Inventaris">
                            {{-- Prev --}}
                            <button type="button" disabled class="p-1.5 rounded-lg border border-raksa-border/40 text-slate-300 cursor-not-allowed">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 19l-7-7 7-7"/></svg>
                            </button>

                            {{-- Page Numbers --}}
                            <button type="button" class="h-8 w-8 rounded-lg bg-raksa-primary text-white font-bold text-xs">1</button>
                            <button type="button" class="h-8 w-8 rounded-lg text-raksa-text hover:bg-slate-100 font-medium text-xs transition">2</button>
                            <button type="button" class="h-8 w-8 rounded-lg text-raksa-text hover:bg-slate-100 font-medium text-xs transition">3</button>
                            <span class="px-1 text-slate-400">...</span>
                            <button type="button" class="h-8 w-8 rounded-lg text-raksa-text hover:bg-slate-100 font-medium text-xs transition">128</button>

                            {{-- Next --}}
                            <button type="button" class="p-1.5 rounded-lg border border-raksa-border/40 text-raksa-text hover:bg-slate-100 transition">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 5l7 7-7 7"/></svg>
                            </button>
                        </nav>
                    </div>
                </div>

            </main>
        </div>
    </div>
</body>
</html>
