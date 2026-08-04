<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Riwayat Sensus Lapangan - RAKSA</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-raksa-background font-sans text-raksa-text antialiased" x-data="{ collapsed: false, mobileSidebarOpen: false }">
    @php
        // Ambil data dummy dari SurveyorRiwayatSeeder
        $riwayatData = \Database\Seeders\Surveyor\SurveyorRiwayatSeeder::getData()['riwayat_list'];
    @endphp

    <div class="flex min-h-screen">
        {{-- Sidebar Surveyor --}}
        <x-raksa.layout.sidebar />

        {{-- Main Area --}}
        <div class="flex min-w-0 flex-1 flex-col">
            {{-- Top Navbar --}}
            <x-raksa.layout.navbar title="Riwayat Sensus Lapangan" />

            {{-- Main Content --}}
            <main class="flex-1 space-y-6 p-4 sm:p-6 laptop:p-8">

                {{-- Breadcrumb & Page Header --}}
                <x-raksa.navigation.page-header
                    title="Riwayat Sensus Lapangan"
                    description="Daftar riwayat seluruh pendataan sensus fisik aset Barang Milik Daerah yang telah Anda kirimkan."
                >
                    <x-slot:breadcrumb>
                        <x-raksa.navigation.breadcrumb :items="[
                            ['label' => 'Dashboard', 'url' => route('surveyor.dashboard')],
                            ['label' => 'Riwayat Sensus'],
                        ]" />
                    </x-slot:breadcrumb>
                </x-raksa.navigation.page-header>

                {{-- 4 Summary Cards --}}
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    {{-- Total Sensus (Biru) --}}
                    <x-raksa.card.statistic-card
                        label="TOTAL SENSUS"
                        value="184"
                        variant="primary"
                        change="Semua riwayat"
                    >
                        <x-slot:icon>
                            <svg class="h-5 w-5 text-raksa-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </x-slot:icon>
                    </x-raksa.card.statistic-card>

                    {{-- Menunggu Verifikasi (Kuning) --}}
                    <x-raksa.card.statistic-card
                        label="MENUNGGU VERIFIKASI"
                        value="6"
                        variant="warning"
                        change="Proses review admin"
                    >
                        <x-slot:icon>
                            <svg class="h-5 w-5 text-amber-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </x-slot:icon>
                    </x-raksa.card.statistic-card>

                    {{-- Disetujui (Hijau) --}}
                    <x-raksa.card.statistic-card
                        label="DISETUJUI"
                        value="172"
                        variant="success"
                        change="Terverifikasi sah"
                        trend="up"
                    >
                        <x-slot:icon>
                            <svg class="h-5 w-5 text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </x-slot:icon>
                    </x-raksa.card.statistic-card>

                    {{-- Ditolak (Merah) --}}
                    <x-raksa.card.statistic-card
                        label="DITOLAK"
                        value="6"
                        variant="danger"
                        change="Perlu foto/revisi"
                    >
                        <x-slot:icon>
                            <svg class="h-5 w-5 text-rose-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </x-slot:icon>
                    </x-raksa.card.statistic-card>
                </div>

                {{-- Filter & Toolbar Section --}}
                <div class="rounded-2xl border border-raksa-border/20 bg-white p-4 sm:p-5 shadow-xs space-y-4 lg:space-y-0 lg:flex lg:items-center lg:justify-between lg:gap-4">
                    {{-- Search Bar --}}
                    <x-raksa.form.search-bar
                        name="search"
                        placeholder="Cari QR ID, Nama Barang, atau Lokasi Sensus..."
                        class="max-w-full lg:max-w-md shrink-0"
                    />

                    {{-- Status Select Filter --}}
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                        <x-raksa.form.form-select
                            name="status_filter"
                            :options="[
                                'all' => 'Semua Status Verifikasi',
                                'approved' => 'Disetujui',
                                'pending' => 'Menunggu Verifikasi',
                                'rejected' => 'Ditolak',
                            ]"
                            selected="all"
                            class="!py-2 text-xs"
                        />

                        <x-raksa.form.form-select
                            name="periode_filter"
                            :options="[
                                '2026-08' => 'Agustus 2026',
                                '2026-07' => 'Juli 2026',
                                '2026-06' => 'Juni 2026',
                            ]"
                            selected="2026-08"
                            class="!py-2 text-xs"
                        />
                    </div>
                </div>

                {{-- Tabel Section (Riwayat Sensus) --}}
                <div class="rounded-2xl border border-raksa-border/20 bg-white shadow-xs overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-raksa-text divide-y divide-raksa-border/20">
                            <thead class="bg-raksa-surface-alt text-xs font-bold text-raksa-neutral uppercase tracking-wider border-b border-raksa-border/20">
                                <tr>
                                    <th scope="col" class="py-4 px-6">TANGGAL</th>
                                    <th scope="col" class="py-4 px-6">QR ID</th>
                                    <th scope="col" class="py-4 px-6">NAMA BARANG</th>
                                    <th scope="col" class="py-4 px-6">KONDISI</th>
                                    <th scope="col" class="py-4 px-6">STATUS VERIFIKASI</th>
                                    <th scope="col" class="py-4 px-6 text-right">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-raksa-border/20 bg-white">
                                @foreach ($riwayatData as $item)
                                    <tr class="hover:bg-raksa-surface/60 transition duration-150">
                                        <td class="py-4 px-6 text-xs text-raksa-neutral font-medium">
                                            {{ $item['tanggal_formatted'] }}
                                        </td>
                                        <td class="py-4 px-6 font-mono font-bold text-xs text-raksa-primary">
                                            <a href="{{ route('surveyor.riwayat.show') }}" class="hover:underline focus:outline-none rounded">
                                                {{ $item['kode_sensus'] }}
                                            </a>
                                        </td>
                                        <td class="py-4 px-6 font-semibold text-raksa-text">
                                            <div>{{ $item['nama_aset'] }}</div>
                                            <span class="text-[11px] text-slate-400 font-normal">{{ $item['lokasi'] }}</span>
                                        </td>
                                        <td class="py-4 px-6 text-xs font-semibold">
                                            @if ($item['hasil_kondisi'] === 'Baik')
                                                <span class="inline-flex items-center gap-1 text-emerald-700">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                                    Baik
                                                </span>
                                            @elseif ($item['hasil_kondisi'] === 'Rusak Ringan')
                                                <span class="inline-flex items-center gap-1 text-amber-700">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                                    Rusak Ringan
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1 text-rose-700">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-rose-500"></span>
                                                    Rusak Berat
                                                </span>
                                            @endif
                                        </td>
                                        <td class="py-4 px-6">
                                            <x-raksa.feedback.badge :variant="$item['status_variant']">
                                                {{ $item['status_verifikasi'] }}
                                            </x-raksa.feedback.badge>
                                        </td>
                                        <td class="py-4 px-6 text-right">
                                            <a href="{{ route('surveyor.riwayat.show') }}" class="inline-flex items-center gap-1.5 rounded-xl border border-slate-200 px-3 py-1.5 text-xs font-bold text-raksa-primary hover:bg-raksa-primary/10 hover:border-raksa-primary/40 transition">
                                                <span>Detail</span>
                                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Table Pagination Footer --}}
                    <div class="px-6 py-4 border-t border-raksa-border/20 bg-raksa-surface-alt/40 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-raksa-neutral">
                        <div>
                            Menampilkan <strong class="font-semibold text-raksa-text">5</strong> dari 184 riwayat sensus
                        </div>

                        <nav class="inline-flex items-center gap-1" aria-label="Navigasi Halaman">
                            <button type="button" disabled class="p-1.5 rounded-lg border border-raksa-border/40 text-slate-300 cursor-not-allowed">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 19l-7-7 7-7"/></svg>
                            </button>
                            <button type="button" class="h-8 w-8 rounded-lg bg-raksa-primary text-white font-medium text-xs">1</button>
                            <button type="button" class="h-8 w-8 rounded-lg text-raksa-text hover:bg-slate-100 font-medium text-xs transition">2</button>
                            <button type="button" class="h-8 w-8 rounded-lg text-raksa-text hover:bg-slate-100 font-medium text-xs transition">3</button>
                            <span class="px-1 text-slate-400">...</span>
                            <button type="button" class="h-8 w-8 rounded-lg text-raksa-text hover:bg-slate-100 font-medium text-xs transition">37</button>
                            <button type="button" class="p-1.5 rounded-lg border border-raksa-border/40 text-raksa-text hover:bg-slate-100 transition">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 5l7 7-7 7"/></svg>
                            </button>
                        </nav>
                    </div>
                </div>

            </main>

            {{-- Footer --}}
            <footer class="mt-auto border-t border-raksa-border/40 bg-raksa-primary px-6 py-4 text-white">
                <div class="flex flex-col items-center justify-between gap-2 text-xs font-medium text-blue-100 sm:flex-row">
                    <p>COPYRIGHT &copy; 2026 Dinas Komunikasi dan Informatika Kota Bandung</p>
                    <p class="font-semibold text-white">RAKSA v1.0.0</p>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
