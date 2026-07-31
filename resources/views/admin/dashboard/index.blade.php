<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard Admin EBMD - RAKSA</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-raksa-background font-sans text-raksa-text antialiased" x-data="{ collapsed: false, mobileSidebarOpen: false }">
    <div class="flex min-h-screen">
        {{-- Sidebar Component --}}
        <x-raksa.layout.sidebar />

        {{-- Main Area --}}
        <div class="flex flex-1 flex-col min-w-0">
            {{-- Top Navbar --}}
            <x-raksa.layout.navbar title="Dashboard Admin EBMD" />

            {{-- Main Content Window --}}
            <main class="flex-1 p-4 sm:p-6 laptop:p-8 space-y-6">
                {{-- Greeting Header --}}
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-extrabold text-raksa-text tracking-tight">
                            Selamat Datang, {{ auth()->user()->name ?? 'Admin EBMD' }}
                        </h1>
                        <p class="mt-1 text-xs sm:text-sm text-raksa-neutral leading-relaxed">
                            Kelola seluruh data pengadaan, barang, dan monitoring sensus Barang Milik Diskominfo Kota Bandung.
                        </p>
                    </div>

                    <div class="hidden md:inline-flex items-center gap-2 rounded-full bg-raksa-surface border border-raksa-border/40 px-3.5 py-1.5 text-xs font-semibold text-raksa-primary shrink-0 shadow-2xs">
                        <span class="h-2 w-2 rounded-full bg-green-500 animate-pulse"></span>
                        Sistem Online
                    </div>
                </div>

                {{-- 4-Card Statistic Grid (2x2 Grid on Mobile/Tablet, 4 Cols on Desktop) --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
                    {{-- Row 1 - Left: Total Pengadaan --}}
                    <x-raksa.card.statistic-card
                        label="Total Pengadaan"
                        value="1.284"
                        change="+4%"
                        trend="up"
                        variant="info"
                    >
                        <x-slot:icon>
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </x-slot:icon>
                    </x-raksa.card.statistic-card>

                    {{-- Row 1 - Right: Total Aset --}}
                    <x-raksa.card.statistic-card
                        label="Total Aset"
                        value="42.890"
                        change="+12%"
                        trend="up"
                        variant="primary"
                    >
                        <x-slot:icon>
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="2"/><rect x="14" y="3" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="2"/><rect x="14" y="14" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="2"/><rect x="3" y="14" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="2"/></svg>
                        </x-slot:icon>
                    </x-raksa.card.statistic-card>

                    {{-- Row 2 - Left: Surveyor --}}
                    <x-raksa.card.statistic-card
                        label="Surveyor"
                        value="156"
                        change="Stabil"
                        trend="neutral"
                        variant="info"
                    >
                        <x-slot:icon>
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" stroke="currentColor" stroke-width="2"/><circle cx="10" cy="7" r="4" stroke="currentColor" stroke-width="2"/></svg>
                        </x-slot:icon>
                    </x-raksa.card.statistic-card>

                    {{-- Row 2 - Right: Barang Aktif --}}
                    <x-raksa.card.statistic-card
                        label="Barang Aktif"
                        value="38.210"
                        change="+2%"
                        trend="up"
                        variant="success"
                    >
                        <x-slot:icon>
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </x-slot:icon>
                    </x-raksa.card.statistic-card>
                </div>

                {{-- Two Column Layout System --}}
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                    {{-- Left Column (Chart & Activity Table) --}}
                    <div class="lg:col-span-8 space-y-6">
                        {{-- Monthly Procurement Chart --}}
                        <div class="rounded-2xl border border-raksa-border/40 bg-white p-5 sm:p-6 shadow-sm">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                                <div>
                                    <h2 class="text-base sm:text-lg font-bold text-raksa-text">Grafik Pengadaan Bulanan</h2>
                                    <p class="text-xs text-slate-400">Tren pengadaan barang milik daerah sepanjang tahun</p>
                                </div>

                                <div class="inline-flex items-center gap-2">
                                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">Tahun 2025</span>
                                    <span class="rounded-full bg-raksa-primary px-3 py-1 text-xs font-semibold text-white shadow-2xs">Tahun 2026</span>
                                </div>
                            </div>

                            <div class="mt-4">
                                <div class="flex h-56 items-end justify-between gap-1.5 sm:gap-3 border-b border-slate-100 pb-3 pt-6 px-2">
                                    @php
                                        $chartData = [
                                            ['month' => 'JAN', 'height' => 'h-[25%]', 'bg' => 'bg-raksa-primary/30'],
                                            ['month' => 'FEB', 'height' => 'h-[35%]', 'bg' => 'bg-raksa-primary/40'],
                                            ['month' => 'MAR', 'height' => 'h-[22%]', 'bg' => 'bg-raksa-primary/60'],
                                            ['month' => 'APR', 'height' => 'h-[48%]', 'bg' => 'bg-raksa-primary/70'],
                                            ['month' => 'MEI', 'height' => 'h-[32%]', 'bg' => 'bg-raksa-primary'],
                                            ['month' => 'JUN', 'height' => 'h-[28%]', 'bg' => 'bg-raksa-primary/40'],
                                            ['month' => 'JUL', 'height' => 'h-[55%]', 'bg' => 'bg-raksa-primary/50'],
                                            ['month' => 'AGU', 'height' => 'h-[42%]', 'bg' => 'bg-raksa-primary/70'],
                                            ['month' => 'SEP', 'height' => 'h-[48%]', 'bg' => 'bg-raksa-primary/60'],
                                            ['month' => 'OKT', 'height' => 'h-[88%]', 'bg' => 'bg-raksa-primary'],
                                            ['month' => 'NOV', 'height' => 'h-[30%]', 'bg' => 'bg-raksa-primary/40'],
                                            ['month' => 'DES', 'height' => 'h-[20%]', 'bg' => 'bg-raksa-primary/30'],
                                        ];
                                    @endphp

                                    @foreach($chartData as $bar)
                                        <div class="flex flex-1 flex-col items-center gap-2 h-full justify-end group">
                                            <div
                                                class="w-full max-w-[36px] rounded-t-md transition-all duration-300 group-hover:bg-raksa-primary {{ $bar['bg'] }} {{ $bar['height'] }}"
                                                title="{{ $bar['month'] }}"
                                            ></div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="flex justify-between px-2 pt-3 text-[10px] sm:text-xs font-semibold text-slate-400">
                                    @foreach($chartData as $bar)
                                        <span class="flex-1 text-center">{{ $bar['month'] }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- Recent Activity Table Card --}}
                        <div class="rounded-2xl border border-raksa-border/40 bg-white shadow-sm overflow-hidden">
                            <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
                                <div>
                                    <h2 class="text-base sm:text-lg font-bold text-raksa-text">Recent Monitoring</h2>
                                    <p class="text-xs text-slate-400">Aktivitas sensus barang terbaru dari surveyor</p>
                                </div>
                                <a href="#" class="text-xs font-bold text-raksa-primary hover:underline">Lihat Semua</a>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-xs sm:text-sm">
                                    <thead class="bg-raksa-surface text-raksa-neutral uppercase text-[11px] font-bold tracking-wider">
                                        <tr>
                                            <th class="px-5 py-3.5">Nama Barang</th>
                                            <th class="px-5 py-3.5">Surveyor</th>
                                            <th class="px-5 py-3.5">Kondisi</th>
                                            <th class="px-5 py-3.5">Status</th>
                                            <th class="px-5 py-3.5">Tanggal</th>
                                            <th class="px-5 py-3.5 text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100 font-medium">
                                        <tr class="hover:bg-slate-50/70 transition">
                                            <td class="px-5 py-4 font-bold text-raksa-text">Laptop ThinkPad P14s</td>
                                            <td class="px-5 py-4 text-raksa-neutral">Hadi Perdana</td>
                                            <td class="px-5 py-4">
                                                <span class="inline-flex rounded-full bg-green-100 px-2.5 py-1 text-[10px] font-bold text-green-800">Baik</span>
                                            </td>
                                            <td class="px-5 py-4 text-raksa-neutral">Terverifikasi</td>
                                            <td class="px-5 py-4 text-slate-400 text-xs">12 Okt 2023</td>
                                            <td class="px-5 py-4 text-center">
                                                <button class="inline-flex h-8 w-8 items-center justify-center rounded-lg text-slate-400 hover:bg-slate-100 hover:text-raksa-primary transition">
                                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke="currentColor" stroke-width="2"/><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke="currentColor" stroke-width="2"/></svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-slate-50/70 transition">
                                            <td class="px-5 py-4 font-bold text-raksa-text">Kursi Kerja Ergo-X</td>
                                            <td class="px-5 py-4 text-raksa-neutral">Siti Aminah</td>
                                            <td class="px-5 py-4">
                                                <span class="inline-flex rounded-full bg-orange-100 px-2.5 py-1 text-[10px] font-bold text-orange-800">Pending</span>
                                            </td>
                                            <td class="px-5 py-4 text-raksa-neutral">Review</td>
                                            <td class="px-5 py-4 text-slate-400 text-xs">11 Okt 2023</td>
                                            <td class="px-5 py-4 text-center">
                                                <button class="inline-flex h-8 w-8 items-center justify-center rounded-lg text-slate-400 hover:bg-slate-100 hover:text-raksa-primary transition">
                                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke="currentColor" stroke-width="2"/><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke="currentColor" stroke-width="2"/></svg>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- Bottom Split Cards --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Barang Bermasalah --}}
                            <div class="rounded-2xl border border-raksa-border/40 bg-white p-5 shadow-sm">
                                <div class="flex items-center gap-2 border-b border-slate-100 pb-3 mb-4">
                                    <svg class="h-5 w-5 text-[#BA1A1A]" viewBox="0 0 24 24" fill="none"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    <h3 class="font-bold text-[#BA1A1A] text-sm sm:text-base">Barang Bermasalah</h3>
                                </div>

                                <div class="space-y-3">
                                    <div class="flex items-center justify-between gap-3 p-2.5 rounded-xl border border-slate-100 hover:bg-slate-50 transition">
                                        <div class="min-w-0">
                                            <p class="text-xs font-bold text-raksa-text truncate">AC Split 2PK - R.Rapat</p>
                                            <p class="text-[10px] text-slate-400">ID: BMD-00129</p>
                                        </div>
                                        <div class="flex items-center gap-2 shrink-0">
                                            <span class="text-xs font-bold text-[#BA1A1A]">Rusak Berat</span>
                                            <button class="rounded-lg border border-slate-200 px-2.5 py-1 text-[11px] font-semibold text-slate-700 hover:bg-slate-100 transition">Detail</button>
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-between gap-3 p-2.5 rounded-xl border border-slate-100 hover:bg-slate-50 transition">
                                        <div class="min-w-0">
                                            <p class="text-xs font-bold text-raksa-text truncate">Projektor Optoma UHD</p>
                                            <p class="text-[10px] text-slate-400">ID: BMD-09821</p>
                                        </div>
                                        <div class="flex items-center gap-2 shrink-0">
                                            <span class="text-xs font-bold text-[#BA1A1A]">Lampu Mati</span>
                                            <button class="rounded-lg border border-slate-200 px-2.5 py-1 text-[11px] font-semibold text-slate-700 hover:bg-slate-100 transition">Detail</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Pengadaan Terbaru --}}
                            <div class="rounded-2xl border border-raksa-border/40 bg-white p-5 shadow-sm">
                                <div class="border-b border-slate-100 pb-3 mb-4">
                                    <h3 class="font-bold text-raksa-text text-sm sm:text-base">Pengadaan Terbaru</h3>
                                </div>

                                <div class="space-y-3">
                                    <div class="flex items-center justify-between gap-3 p-2.5 rounded-xl border border-slate-100 hover:bg-slate-50 transition">
                                        <div class="min-w-0">
                                            <p class="text-[11px] font-bold text-raksa-primary">SPK-2023-X-01</p>
                                            <p class="text-xs font-semibold text-raksa-text truncate">Pengadaan PC Server Diskominfo</p>
                                        </div>
                                        <span class="text-xs font-semibold text-slate-500 shrink-0">12 Unit</span>
                                    </div>

                                    <div class="flex items-center justify-between gap-3 p-2.5 rounded-xl border border-slate-100 hover:bg-slate-50 transition">
                                        <div class="min-w-0">
                                            <p class="text-[11px] font-bold text-raksa-primary">SPK-2023-X-05</p>
                                            <p class="text-xs font-semibold text-raksa-text truncate">Fasilitasi Jaringan Kelurahan</p>
                                        </div>
                                        <span class="text-xs font-semibold text-slate-500 shrink-0">151 Titik</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Right Column (Aksi Cepat, Alokasi Anggaran, Saran Sistem) --}}
                    <div class="lg:col-span-4 space-y-6">
                        {{-- Aksi Cepat Widget --}}
                        <div class="rounded-2xl border border-raksa-border/40 bg-white p-5 shadow-sm space-y-4">
                            <h3 class="font-bold text-raksa-text text-base">Aksi Cepat</h3>

                            <div class="space-y-3">
                                <button class="flex w-full items-center justify-between rounded-xl bg-raksa-primary p-3.5 text-white shadow-sm transition hover:bg-raksa-primary-hover">
                                    <div class="flex items-center gap-3">
                                        <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-white/20">
                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                                        </span>
                                        <div class="text-left">
                                            <p class="text-xs font-bold leading-tight">Tambah Pengadaan</p>
                                            <p class="text-[10px] text-blue-100">Input data SPK baru</p>
                                        </div>
                                    </div>
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"><path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                                </button>

                                <button class="flex w-full items-center justify-between rounded-xl border border-slate-200 bg-white p-3.5 text-raksa-text shadow-2xs transition hover:bg-slate-50">
                                    <div class="flex items-center gap-3">
                                        <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-50 text-raksa-primary">
                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" stroke="currentColor" stroke-width="2"/><circle cx="10" cy="7" r="4" stroke="currentColor" stroke-width="2"/><path d="M20 8v6M23 11h-6" stroke="currentColor" stroke-width="2"/></svg>
                                        </span>
                                        <div class="text-left">
                                            <p class="text-xs font-bold leading-tight">Tambah Surveyor</p>
                                            <p class="text-[10px] text-slate-500">Daftarkan akun lapangan</p>
                                        </div>
                                    </div>
                                    <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none"><path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                                </button>

                                <button class="flex w-full items-center justify-between rounded-xl border border-slate-200 bg-white p-3.5 text-raksa-text shadow-2xs transition hover:bg-slate-50">
                                    <div class="flex items-center gap-3">
                                        <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-green-50 text-green-700">
                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z" stroke="currentColor" stroke-width="2"/><path d="M14 2v6h6M12 18v-6M9 15l3-3 3 3" stroke="currentColor" stroke-width="2"/></svg>
                                        </span>
                                        <div class="text-left">
                                            <p class="text-xs font-bold leading-tight">Export Excel</p>
                                            <p class="text-[10px] text-slate-500">Laporan Sensus Lengkap</p>
                                        </div>
                                    </div>
                                    <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none"><path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                                </button>
                            </div>
                        </div>

                        {{-- Alokasi Anggaran Widget --}}
                        <div class="rounded-2xl border border-raksa-border/40 bg-white p-5 shadow-sm space-y-4">
                            <h3 class="font-bold text-raksa-text text-base">Alokasi Anggaran</h3>

                            <div class="space-y-3.5">
                                <div class="space-y-1.5">
                                    <div class="flex justify-between text-xs font-bold text-raksa-text">
                                        <span>Infrastruktur</span>
                                        <span>65%</span>
                                    </div>
                                    <div class="h-2 w-full rounded-full bg-slate-100 overflow-hidden">
                                        <div class="h-full bg-raksa-primary rounded-full w-[65%]"></div>
                                    </div>
                                </div>

                                <div class="space-y-1.5">
                                    <div class="flex justify-between text-xs font-bold text-raksa-text">
                                        <span>Elektronik</span>
                                        <span>25%</span>
                                    </div>
                                    <div class="h-2 w-full rounded-full bg-slate-100 overflow-hidden">
                                        <div class="h-full bg-amber-600 rounded-full w-[25%]"></div>
                                    </div>
                                </div>

                                <div class="space-y-1.5">
                                    <div class="flex justify-between text-xs font-bold text-raksa-text">
                                        <span>Lain-lain</span>
                                        <span>10%</span>
                                    </div>
                                    <div class="h-2 w-full rounded-full bg-slate-100 overflow-hidden">
                                        <div class="h-full bg-slate-300 rounded-full w-[10%]"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Saran Sistem Callout Banner --}}
                        <div class="rounded-2xl border border-amber-200 bg-amber-50/70 p-4 shadow-sm">
                            <div class="flex gap-3">
                                <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-amber-100 text-amber-800">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </span>
                                <div>
                                    <h4 class="text-xs font-bold text-amber-900 uppercase tracking-wide">Saran Sistem</h4>
                                    <p class="mt-1 text-xs text-amber-800 leading-relaxed">
                                        Terdapat 12 aset yang belum dimonitoring selama lebih dari 6 bulan. Segera buat penugasan surveyor.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            {{-- Footer Copyright --}}
            <footer class="mt-auto border-t border-raksa-border/40 bg-raksa-primary px-6 py-4 text-white">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-2 text-xs font-medium text-blue-100">
                    <p>COPYRIGHT © 2026 Dinas Komunikasi dan Informatika Kota Bandung</p>
                    <p class="font-semibold text-white">RAKSA v1.0.0</p>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>



