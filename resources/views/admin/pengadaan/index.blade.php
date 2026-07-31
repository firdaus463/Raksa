<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Riwayat Pengadaan - RAKSA</title>

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
            <x-raksa.layout.navbar title="Pengadaan" />

            {{-- Main Content --}}
            <main class="flex-1 p-4 sm:p-6 laptop:p-8 space-y-6">

                {{-- Breadcrumb & Page Header --}}
                <x-raksa.navigation.page-header
                    title="Riwayat Pengadaan"
                    description="Kelola seluruh data administrasi pengadaan barang milik Diskominfo Kota Bandung"
                >
                    <x-slot:breadcrumb>
                        <x-raksa.navigation.breadcrumb :items="[
                            ['label' => 'Dashboard', 'url' => route('dashboard')],
                            ['label' => 'Pengadaan'],
                            ['label' => 'Riwayat Pengadaan'],
                        ]" />
                    </x-slot:breadcrumb>

                    <x-slot:actions>
                        <x-raksa.action.button variant="primary" href="{{ route('pengadaan.create') }}">
                            <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none">
                                <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>Tambah Pengadaan</span>
                        </x-raksa.action.button>
                    </x-slot:actions>
                </x-raksa.navigation.page-header>

                {{-- Summary Stats Section (4 Cards Grid) --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
                    {{-- Stat 1: Total Pengadaan --}}
                    <x-raksa.card.statistic-card
                        label="TOTAL PENGADAAN"
                        value="500"
                        change="+12% vs bln lalu"
                        trend="up"
                        variant="primary"
                    >
                        <x-slot:icon>
                            <svg class="h-5 w-5 text-raksa-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </x-slot:icon>
                    </x-raksa.card.statistic-card>

                    {{-- Stat 2: Total Nilai Kontrak --}}
                    <x-raksa.card.statistic-card
                        label="TOTAL NILAI KONTRAK"
                        value="Rp 42.8 M"
                        variant="warning"
                    >
                        <x-slot:icon>
                            <svg class="h-5 w-5 text-raksa-accent-dark" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </x-slot:icon>
                    </x-raksa.card.statistic-card>

                    {{-- Stat 3: Pengadaan Tahun Berjalan --}}
                    <x-raksa.card.statistic-card
                        label="PENGADAAN TAHUN BERJALAN"
                        value="156"
                        variant="info"
                    >
                        <x-slot:icon>
                            <svg class="h-5 w-5 text-raksa-info" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </x-slot:icon>
                    </x-raksa.card.statistic-card>

                    {{-- Stat 4: Total Nilai Pengadaan --}}
                    <x-raksa.card.statistic-card
                        label="TOTAL NILAI PENGADAAN"
                        value="Rp 12.4 M"
                        variant="primary"
                    >
                        <x-slot:icon>
                            <svg class="h-5 w-5 text-raksa-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 14l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </x-slot:icon>
                    </x-raksa.card.statistic-card>
                </div>

                {{-- Filter Toolbar Section --}}
                <div class="rounded-2xl border border-raksa-border/20 bg-white p-4 sm:p-5 shadow-sm space-y-4 lg:space-y-0 lg:flex lg:items-center lg:justify-between lg:gap-4">
                    {{-- Search Bar --}}
                    <x-raksa.form.search-bar
                        name="search"
                        placeholder="Cari Nomor SPK, Vendor, atau Nomor BAST..."
                        class="max-w-full lg:max-w-md shrink-0"
                    />

                    {{-- Filters & Action Button --}}
                    <div class="flex flex-col sm:flex-row flex-wrap items-stretch sm:items-center gap-3">
                        <x-raksa.form.form-select
                            name="year"
                            :options="[
                                '2024' => 'Tahun 2024',
                                '2023' => 'Tahun 2023',
                                '2022' => 'Tahun 2022',
                                '2021' => 'Tahun 2021',
                            ]"
                            selected="2024"
                            class="!py-2 text-xs"
                        />

                        <x-raksa.form.form-select
                            name="vendor"
                            :options="[
                                'all-vendors' => 'Semua Vendor',
                                'anima' => 'PT Anima Indonesia',
                                'mitra' => 'PT Mitra Sejahtera',
                            ]"
                            selected="all-vendors"
                            class="!py-2 text-xs"
                        />

                        <x-raksa.form.form-select
                            name="status"
                            :options="[
                                'all-statuses' => 'Semua Status',
                                'aktif' => 'Aktif',
                                'selesai' => 'Selesai',
                                'dibatalkan' => 'Dibatalkan',
                            ]"
                            selected="all-statuses"
                            class="!py-2 text-xs"
                        />

                        <x-raksa.action.button variant="primary" href="{{ route('pengadaan.create') }}" class="sm:shrink-0 !py-2.5 !px-4 text-xs">
                            <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none">
                                <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            <div class="text-left leading-tight">
                                <span class="block font-semibold">Tambah Pengadaan</span>
                                <span class="block text-[10px] font-normal text-white/80">Input data SPK baru</span>
                            </div>
                        </x-raksa.action.button>
                    </div>
                </div>

                {{-- Table Section (Daftar Pengadaan) --}}
                <div class="rounded-2xl border border-raksa-border/20 bg-white shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-raksa-text divide-y divide-raksa-border/20">
                            <thead class="bg-raksa-surface-alt text-xs font-bold text-raksa-neutral uppercase tracking-wider border-b border-raksa-border/20">
                                <tr>
                                    <th scope="col" class="py-4 px-6">NOMOR SPK</th>
                                    <th scope="col" class="py-4 px-6">TANGGAL SPK</th>
                                    <th scope="col" class="py-4 px-6">NAMA PERUSAHAAN</th>
                                    <th scope="col" class="py-4 px-6">NILAI KONTRAK</th>
                                    <th scope="col" class="py-4 px-6 text-center">JUMLAH ASET</th>
                                    <th scope="col" class="py-4 px-6">STATUS</th>
                                    <th scope="col" class="py-4 px-6 text-right">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-raksa-border/20 bg-white">
                                {{-- Row 1 --}}
                                <tr class="hover:bg-raksa-surface/60 transition duration-150">
                                    <td class="py-4 px-6 font-semibold text-raksa-primary">
                                        <a href="{{ route('pengadaan.show') }}" class="hover:underline focus:outline-none focus:ring-2 focus:ring-raksa-primary rounded">
                                            SPK/DISKOMINFO/2024/001
                                        </a>
                                    </td>
                                    <td class="py-4 px-6 text-raksa-neutral">
                                        21 Jan<br>2026
                                    </td>
                                    <td class="py-4 px-6 font-medium text-raksa-text">
                                        PT. Indonesia<br>Bangun Semesta
                                    </td>
                                    <td class="py-4 px-6 font-medium text-raksa-text">
                                        Rp 1.450.000.000
                                    </td>
                                    <td class="py-4 px-6 text-center font-medium text-raksa-text">
                                        42
                                    </td>
                                    <td class="py-4 px-6">
                                        <x-raksa.feedback.badge variant="success">Selesai</x-raksa.feedback.badge>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-1.5 justify-end">
                                            <a href="{{ route('pengadaan.show') }}" class="p-2 rounded-lg text-slate-400 hover:text-raksa-primary hover:bg-raksa-primary/10 transition" title="Lihat Detail">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                            <a href="{{ route('pengadaan.create') }}" class="p-2 rounded-lg text-slate-400 hover:text-amber-600 hover:bg-amber-50 transition" title="Edit">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <button type="button" class="p-2 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition" title="Hapus">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                {{-- Row 2 --}}
                                <tr class="hover:bg-raksa-surface/60 transition duration-150">
                                    <td class="py-4 px-6 font-semibold text-raksa-primary">
                                        <a href="{{ route('pengadaan.show') }}" class="hover:underline focus:outline-none focus:ring-2 focus:ring-raksa-primary rounded">
                                            SPK/DISKOMINFO/2024/012
                                        </a>
                                    </td>
                                    <td class="py-4 px-6 text-raksa-neutral">
                                        02 Feb<br>2026
                                    </td>
                                    <td class="py-4 px-6 font-medium text-raksa-text">
                                        CV. Media Informatika<br>Nusantara
                                    </td>
                                    <td class="py-4 px-6 font-medium text-raksa-text">
                                        Rp 842.200.000
                                    </td>
                                    <td class="py-4 px-6 text-center font-medium text-raksa-text">
                                        15
                                    </td>
                                    <td class="py-4 px-6">
                                        <x-raksa.feedback.badge variant="info">Aktif</x-raksa.feedback.badge>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-1.5 justify-end">
                                            <a href="{{ route('pengadaan.show') }}" class="p-2 rounded-lg text-slate-400 hover:text-raksa-primary hover:bg-raksa-primary/10 transition" title="Lihat Detail">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                            <a href="{{ route('pengadaan.create') }}" class="p-2 rounded-lg text-slate-400 hover:text-amber-600 hover:bg-amber-50 transition" title="Edit">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <button type="button" class="p-2 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition" title="Hapus">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                {{-- Row 3 --}}
                                <tr class="hover:bg-raksa-surface/60 transition duration-150">
                                    <td class="py-4 px-6 font-semibold text-raksa-primary">
                                        <a href="{{ route('pengadaan.show') }}" class="hover:underline focus:outline-none focus:ring-2 focus:ring-raksa-primary rounded">
                                            SPK/DISKOMINFO/2024/025
                                        </a>
                                    </td>
                                    <td class="py-4 px-6 text-raksa-neutral">
                                        10 Mar<br>2026
                                    </td>
                                    <td class="py-4 px-6 font-medium text-raksa-text">
                                        PT. Global Trans<br>Mandiri
                                    </td>
                                    <td class="py-4 px-6 font-medium text-raksa-text">
                                        Rp 2.100.000.000
                                    </td>
                                    <td class="py-4 px-6 text-center font-medium text-raksa-text">
                                        120
                                    </td>
                                    <td class="py-4 px-6">
                                        <x-raksa.feedback.badge variant="default">Draft</x-raksa.feedback.badge>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-1.5 justify-end">
                                            <a href="{{ route('pengadaan.show') }}" class="p-2 rounded-lg text-slate-400 hover:text-raksa-primary hover:bg-raksa-primary/10 transition" title="Lihat Detail">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                            <a href="{{ route('pengadaan.create') }}" class="p-2 rounded-lg text-slate-400 hover:text-amber-600 hover:bg-amber-50 transition" title="Edit">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <button type="button" class="p-2 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition" title="Hapus">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                {{-- Row 4 --}}
                                <tr class="hover:bg-raksa-surface/60 transition duration-150">
                                    <td class="py-4 px-6 font-semibold text-raksa-primary">
                                        <a href="{{ route('pengadaan.show') }}" class="hover:underline focus:outline-none focus:ring-2 focus:ring-raksa-primary rounded">
                                            SPK/DISKOMINFO/2024/041
                                        </a>
                                    </td>
                                    <td class="py-4 px-6 text-raksa-neutral">
                                        25 Mar<br>2026
                                    </td>
                                    <td class="py-4 px-6 font-medium text-raksa-text">
                                        CV. Jaya Abadi<br>Konstruksi
                                    </td>
                                    <td class="py-4 px-6 font-medium text-raksa-text">
                                        Rp 350.500.000
                                    </td>
                                    <td class="py-4 px-6 text-center font-medium text-raksa-text">
                                        8
                                    </td>
                                    <td class="py-4 px-6">
                                        <x-raksa.feedback.badge variant="info">Aktif</x-raksa.feedback.badge>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-1.5 justify-end">
                                            <a href="{{ route('pengadaan.show') }}" class="p-2 rounded-lg text-slate-400 hover:text-raksa-primary hover:bg-raksa-primary/10 transition" title="Lihat Detail">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                            <a href="{{ route('pengadaan.create') }}" class="p-2 rounded-lg text-slate-400 hover:text-amber-600 hover:bg-amber-50 transition" title="Edit">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <button type="button" class="p-2 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition" title="Hapus">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                {{-- Row 5 --}}
                                <tr class="hover:bg-raksa-surface/60 transition duration-150">
                                    <td class="py-4 px-6 font-semibold text-raksa-primary">
                                        <a href="{{ route('pengadaan.show') }}" class="hover:underline focus:outline-none focus:ring-2 focus:ring-raksa-primary rounded">
                                            SPK/DISKOMINFO/2024/055
                                        </a>
                                    </td>
                                    <td class="py-4 px-6 text-raksa-neutral">
                                        05 Apr<br>2026
                                    </td>
                                    <td class="py-4 px-6 font-medium text-raksa-text">
                                        PT. Sentra Solusi<br>Digital
                                    </td>
                                    <td class="py-4 px-6 font-medium text-raksa-text">
                                        Rp 1.120.000.000
                                    </td>
                                    <td class="py-4 px-6 text-center font-medium text-raksa-text">
                                        64
                                    </td>
                                    <td class="py-4 px-6">
                                        <x-raksa.feedback.badge variant="success">Selesai</x-raksa.feedback.badge>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-1.5 justify-end">
                                            <a href="{{ route('pengadaan.show') }}" class="p-2 rounded-lg text-slate-400 hover:text-raksa-primary hover:bg-raksa-primary/10 transition" title="Lihat Detail">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                            <a href="{{ route('pengadaan.create') }}" class="p-2 rounded-lg text-slate-400 hover:text-amber-600 hover:bg-amber-50 transition" title="Edit">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <button type="button" class="p-2 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition" title="Hapus">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- Table Pagination Footer --}}
                    <div class="px-6 py-4 border-t border-raksa-border/20 bg-raksa-surface-alt/40 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-raksa-neutral">
                        <div>
                            Menampilkan <strong class="font-semibold text-raksa-text">5</strong> dari 500 pengadaan
                        </div>

                        <nav class="inline-flex items-center gap-1" aria-label="Navigasi Halaman">
                            {{-- First & Prev --}}
                            <button type="button" disabled class="p-1.5 rounded-lg border border-raksa-border/40 text-slate-300 cursor-not-allowed">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 17l-5-5 5-5m7 10l-5-5 5-5"/></svg>
                            </button>
                            <button type="button" disabled class="p-1.5 rounded-lg border border-raksa-border/40 text-slate-300 cursor-not-allowed">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 19l-7-7 7-7"/></svg>
                            </button>

                            {{-- Page Numbers --}}
                            <button type="button" class="h-8 w-8 rounded-lg bg-raksa-primary text-white font-medium text-xs">1</button>
                            <button type="button" class="h-8 w-8 rounded-lg text-raksa-text hover:bg-slate-100 font-medium text-xs transition">2</button>
                            <button type="button" class="h-8 w-8 rounded-lg text-raksa-text hover:bg-slate-100 font-medium text-xs transition">3</button>
                            <span class="px-1 text-slate-400">...</span>
                            <button type="button" class="h-8 w-8 rounded-lg text-raksa-text hover:bg-slate-100 font-medium text-xs transition">250</button>

                            {{-- Next & Last --}}
                            <button type="button" class="p-1.5 rounded-lg border border-raksa-border/40 text-raksa-text hover:bg-slate-100 transition">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 5l7 7-7 7"/></svg>
                            </button>
                            <button type="button" class="p-1.5 rounded-lg border border-raksa-border/40 text-raksa-text hover:bg-slate-100 transition">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 5l5 5-5 5m-7-10l5 5-5 5"/></svg>
                            </button>
                        </nav>
                    </div>
                </div>

            </main>
        </div>
    </div>
</body>
</html>
