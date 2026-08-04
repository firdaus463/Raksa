<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard Surveyor - RAKSA</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-raksa-background font-sans text-raksa-text antialiased" x-data="{ collapsed: false, mobileSidebarOpen: false }">
    @php
        // Ambil data dummy dari SurveyorDashboardSeeder & SurveyorRiwayatSeeder
        $dashboardData = \Database\Seeders\Surveyor\SurveyorDashboardSeeder::getData();
        $riwayatData = \Database\Seeders\Surveyor\SurveyorRiwayatSeeder::getData()['riwayat_list'];
    @endphp

    <div class="flex min-h-screen">
        {{-- Sidebar Surveyor --}}
        <x-raksa.layout.sidebar />

        {{-- Main Area --}}
        <div class="flex min-w-0 flex-1 flex-col">
            {{-- Top Navbar --}}
            <x-raksa.layout.navbar title="Dashboard Surveyor" />

            {{-- Main Content --}}
            <main class="flex-1 space-y-6 p-4 sm:p-6 laptop:p-8">

                {{-- Greeting & Page Header --}}
                <x-raksa.navigation.page-header
                    title="Selamat Datang, Budi Pratama, S.T. 👋"
                    description="Pantau dan kelola seluruh penugasan sensus fisik aset Barang Milik Daerah Diskominfo Kota Bandung."
                >
                    <x-slot:breadcrumb>
                        <x-raksa.navigation.breadcrumb :items="[
                            ['label' => 'Dashboard', 'url' => route('surveyor.dashboard')],
                            ['label' => 'Surveyor'],
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
                        change="+12 unit bln ini"
                        trend="up"
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
                        change="Dalam antrean admin"
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
                        change="93.4% terverifikasi"
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
                        change="Perlu foto/data ulang"
                    >
                        <x-slot:icon>
                            <svg class="h-5 w-5 text-rose-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </x-slot:icon>
                    </x-raksa.card.statistic-card>
                </div>

                {{-- Hero Section + Progress & Tips Grid --}}
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
                    
                    {{-- Hero Card (Scan Sekarang) --}}
                    <article class="lg:col-span-7 rounded-2xl border border-raksa-primary/20 bg-gradient-to-br from-raksa-primary via-blue-900 to-raksa-primary p-6 sm:p-8 shadow-md text-white flex flex-col justify-between space-y-6 relative overflow-hidden">
                        {{-- Decorative background SVG pattern --}}
                        <div class="absolute -right-8 -bottom-8 opacity-10 pointer-events-none">
                            <svg class="h-64 w-64 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                            </svg>
                        </div>

                        <div class="space-y-3 relative z-10">
                            <div class="inline-flex items-center gap-2 rounded-full bg-white/15 px-3 py-1 text-xs font-bold backdrop-blur-xs text-blue-100">
                                <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span>Sensus Lapangan Aktif</span>
                            </div>
                            <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight leading-snug">Mulai Sensus Fisik Aset</h2>
                            <p class="text-xs sm:text-sm text-blue-100/90 leading-relaxed max-w-xl">
                                Lakukan pemindaian QR Code pada stiker fisik aset Barang Milik Daerah untuk mulai mencatat kondisi fisik, foto lokasi, dan pembaruan spesifikasi inventaris terkini.
                            </p>
                        </div>

                        <div class="pt-2 relative z-10">
                            <x-raksa.action.button variant="secondary" href="{{ route('surveyor.riwayat.index') }}" class="!py-3 !px-6 text-sm font-bold shadow-lg hover:shadow-xl transition">
                                <svg class="h-5 w-5 shrink-0 text-raksa-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                                </svg>
                                <span class="text-raksa-primary">Scan Sekarang</span>
                            </x-raksa.action.button>
                        </div>
                    </article>

                    {{-- Right Cards Stack (Progress Sensus & Tips Hari Ini) --}}
                    <div class="lg:col-span-5 flex flex-col gap-6 justify-between">
                        
                        {{-- Card Progress Sensus --}}
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-xs space-y-4 flex-1">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2.5">
                                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-raksa-primary/10 text-raksa-primary">
                                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-sm font-bold text-raksa-text">Progress Sensus Bulan Ini</h3>
                                        <p class="text-[11px] text-raksa-neutral">Target Agustus 2026</p>
                                    </div>
                                </div>
                                <span class="text-xl font-extrabold text-raksa-primary">78%</span>
                            </div>

                            {{-- Progress Bar --}}
                            <div class="space-y-1.5">
                                <div class="h-3 w-full rounded-full bg-slate-100 overflow-hidden">
                                    <div class="h-full rounded-full bg-raksa-primary transition-all duration-500" style="width: 78%;"></div>
                                </div>
                                <div class="flex items-center justify-between text-xs text-raksa-neutral">
                                    <span>Telah disensus: <strong class="font-bold text-raksa-text">39 Aset</strong></span>
                                    <span>Target: <strong class="font-bold text-raksa-text">50 Aset</strong></span>
                                </div>
                            </div>
                        </article>

                        {{-- Card Tips Hari Ini --}}
                        <article class="rounded-2xl border border-amber-200/80 bg-amber-50/50 p-5 shadow-xs space-y-3 flex-1">
                            <div class="flex items-center gap-2.5">
                                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-amber-100 text-amber-700 shrink-0">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                    </svg>
                                </div>
                                <h3 class="text-sm font-bold text-amber-900">Tips Sensus Hari Ini</h3>
                            </div>
                            <p class="text-xs text-amber-800 leading-relaxed">
                                Pastikan pencahayaan cukup dan nomor stiker QR Code bersih saat mengambil foto fisik aset agar proses verifikasi otomatis oleh Admin BMD berlangsung lebih efisien.
                            </p>
                        </article>

                    </div>
                </div>

                {{-- Tabel Aktivitas Sensus Terbaru --}}
                <article class="rounded-2xl border border-slate-200/80 bg-white shadow-xs overflow-hidden">
                    <header class="p-4 sm:p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <h2 class="text-base font-bold text-raksa-text">Aktivitas Sensus Terbaru</h2>
                            <p class="text-xs text-raksa-neutral">5 pendataan fisik aset terbaru yang telah Anda kirimkan</p>
                        </div>
                        <x-raksa.action.button variant="secondary" href="{{ route('surveyor.riwayat.index') }}" class="!py-2 !px-4 text-xs">
                            <span>Lihat Semua Riwayat</span>
                            <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </x-raksa.action.button>
                    </header>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-raksa-text divide-y divide-raksa-border/20">
                            <thead class="bg-raksa-surface-alt text-xs font-bold text-raksa-neutral uppercase tracking-wider border-b border-raksa-border/20">
                                <tr>
                                    <th scope="col" class="py-4 px-6">TANGGAL</th>
                                    <th scope="col" class="py-4 px-6">QR ID</th>
                                    <th scope="col" class="py-4 px-6">NAMA BARANG</th>
                                    <th scope="col" class="py-4 px-6">LOKASI</th>
                                    <th scope="col" class="py-4 px-6">KONDISI</th>
                                    <th scope="col" class="py-4 px-6">STATUS</th>
                                    <th scope="col" class="py-4 px-6 text-right">AKSI DETAIL</th>
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
                                            {{ $item['nama_aset'] }}
                                        </td>
                                        <td class="py-4 px-6 text-xs text-raksa-neutral">
                                            {{ $item['lokasi'] }}
                                        </td>
                                        <td class="py-4 px-6 text-xs font-semibold">
                                            @if ($item['hasil_kondisi'] === 'Baik')
                                                <span class="text-emerald-700">Baik</span>
                                            @elseif ($item['hasil_kondisi'] === 'Rusak Ringan')
                                                <span class="text-amber-600">Rusak Ringan</span>
                                            @else
                                                <span class="text-rose-600">Rusak Berat</span>
                                            @endif
                                        </td>
                                        <td class="py-4 px-6">
                                            <x-raksa.feedback.badge :variant="$item['status_variant']">
                                                {{ $item['status_verifikasi'] }}
                                            </x-raksa.feedback.badge>
                                        </td>
                                        <td class="py-4 px-6 text-right">
                                            <a href="{{ route('surveyor.riwayat.show') }}" class="inline-flex items-center gap-1 text-xs font-bold text-raksa-primary hover:underline">
                                                <span>Detail</span>
                                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </article>

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
