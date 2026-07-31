<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Monitoring Sensus - RAKSA</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

@php
    $summaryCards = [
        [
            'label' => 'TOTAL MONITORING',
            'value' => '1.248',
            'change' => '+12% dari bulan lalu',
            'trend' => 'up',
            'variant' => 'primary',
            'icon' => 'chart',
        ],
        [
            'label' => 'MENUNGGU VERIFIKASI',
            'value' => '18',
            'change' => 'Perlu segera diproses',
            'trend' => 'neutral',
            'variant' => 'warning',
            'icon' => 'clock',
        ],
        [
            'label' => 'DISETUJUI',
            'value' => '1.180',
            'change' => 'Kondisi data terupdate',
            'trend' => 'up',
            'variant' => 'success',
            'icon' => 'check',
        ],
        [
            'label' => 'DITOLAK',
            'value' => '50',
            'change' => 'Butuh survei ulang',
            'trend' => 'down',
            'variant' => 'danger',
            'icon' => 'x',
        ],
    ];

    $monitoringRows = [
        [
            'qr' => 'QR-2026-00125',
            'asset' => 'Laptop Lenovo ThinkPad T14',
            'serial' => 'SN: LENO-9921-X1',
            'holder' => 'Bu Yully',
            'initials' => 'BY',
            'surveyor' => 'Rian Hidayat, S.T.',
            'date' => '25 Juli 2026',
            'condition' => 'Rusak Ringan',
            'conditionVariant' => 'warning',
            'status' => 'Menunggu',
            'statusVariant' => 'warning',
        ],
        [
            'qr' => 'QR-2026-00118',
            'asset' => 'Printer Epson EcoTank L3250',
            'serial' => 'SN: EPS-4419-Z2',
            'holder' => 'R. Sekretariat',
            'initials' => 'RS',
            'surveyor' => 'Andi Pratama',
            'date' => '24 Juli 2026',
            'condition' => 'Baik',
            'conditionVariant' => 'success',
            'status' => 'Disetujui',
            'statusVariant' => 'success',
        ],
        [
            'qr' => 'QR-2026-00104',
            'asset' => 'Proyektor Epson EB-X500',
            'serial' => 'SN: EPSN-2210-Z',
            'holder' => 'Ruang Rapat A',
            'initials' => 'RA',
            'surveyor' => 'Budi Santoso',
            'date' => '22 Juli 2026',
            'condition' => 'Rusak Berat',
            'conditionVariant' => 'danger',
            'status' => 'Ditolak',
            'statusVariant' => 'danger',
        ],
    ];
@endphp

<body class="bg-raksa-background font-sans text-raksa-text antialiased" x-data="{ collapsed: false, mobileSidebarOpen: false }">
    <div class="flex min-h-screen">
        <x-raksa.layout.sidebar />

        <div class="flex min-w-0 flex-1 flex-col">
            <x-raksa.layout.navbar title="Monitoring Sensus" />

            <main class="flex-1 space-y-6 p-4 sm:p-6 laptop:p-8">
                <x-raksa.navigation.page-header
                    title="Monitoring Sensus"
                    description="Kelola laporan hasil monitoring aset yang dikirim oleh surveyor serta lakukan verifikasi untuk memperbarui kondisi aset."
                >
                    <x-slot:breadcrumb>
                        <x-raksa.navigation.breadcrumb :items="[
                            ['label' => 'Dashboard', 'url' => route('dashboard')],
                            ['label' => 'Monitoring Sensus'],
                        ]" />
                    </x-slot:breadcrumb>

                    <x-slot:actions>
                        <x-raksa.action.button variant="outline" type="button">
                            <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M12 3v12m0 0l-4-4m4 4l4-4M5 21h14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span>Export Excel</span>
                        </x-raksa.action.button>
                    </x-slot:actions>
                </x-raksa.navigation.page-header>

                <section class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 sm:gap-5" aria-label="Ringkasan monitoring">
                    @foreach ($summaryCards as $card)
                        <x-raksa.card.statistic-card
                            :label="$card['label']"
                            :value="$card['value']"
                            :change="$card['change']"
                            :trend="$card['trend']"
                            :variant="$card['variant']"
                        >
                            <x-slot:icon>
                                @if ($card['icon'] === 'chart')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M4 19V5m0 14h16M8 16v-5m4 5V8m4 8v-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                @elseif ($card['icon'] === 'clock')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                                        <path d="M12 7v5l3 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                @elseif ($card['icon'] === 'check')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                @else
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M15 9l-6 6m0-6l6 6m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                @endif
                            </x-slot:icon>
                        </x-raksa.card.statistic-card>
                    @endforeach
                </section>

                <section class="rounded-2xl border border-slate-200/80 bg-white p-4 shadow-sm sm:p-5" aria-label="Filter aset">
                    <form class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-6" action="#" method="GET">
                        <div class="xl:col-span-2">
                            <x-raksa.form.search-bar
                                name="search"
                                placeholder="Cari nama barang, QR ID..."
                                class="max-w-none"
                            />
                        </div>

                        <x-raksa.form.form-select
                            label="Status Sensus"
                            name="status"
                            :options="[
                                '' => 'Semua',
                                'approved' => 'Sudah Disensus',
                                'pending' => 'Belum Disensus',
                            ]"
                            class="!py-2.5"
                        />

                        <x-raksa.form.form-select
                            label="Surveyor"
                            name="surveyor"
                            :options="[
                                '' => 'Semua Surveyor',
                                'andi' => 'Andi Pratama',
                                'budi' => 'Budi Santoso',
                                'citra' => 'Citra Lestari',
                            ]"
                            class="!py-2.5"
                        />

                        <x-raksa.form.form-select
                            label="Kondisi Barang"
                            name="condition"
                            :options="[
                                '' => 'Semua',
                                'baik' => 'Baik',
                                'rusak-ringan' => 'Rusak Ringan',
                                'rusak-berat' => 'Rusak Berat',
                            ]"
                            class="!py-2.5"
                        />

                        <div class="flex items-end gap-3">
                            <x-raksa.form.form-input
                                label="Rentang Tanggal"
                                name="date_range"
                                value="01/07/2026 - 31/07/2026"
                                class="!py-2.5"
                            />

                            <button
                                type="reset"
                                class="mb-px inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-400 transition hover:bg-raksa-surface hover:text-raksa-primary focus:outline-none focus:ring-2 focus:ring-raksa-primary/15"
                                title="Atur ulang filter"
                                aria-label="Atur ulang filter"
                            >
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M4 4v6h6M20 20v-6h-6M5 15a7 7 0 0012 3M19 9A7 7 0 007 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </section>

                <section class="overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-sm" aria-label="Hasil survey monitoring">
                    <div class="border-b border-slate-200/80 px-5 py-4">
                        <h2 class="text-base font-bold text-raksa-text sm:text-lg">Hasil Surveyor</h2>
                        <p class="mt-1 text-xs text-raksa-neutral">Daftar aset yang sudah dikirimkan dari proses monitoring lapangan.</p>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[960px] divide-y divide-slate-200 text-left text-sm">
                            <thead class="bg-raksa-surface-alt text-xs font-bold uppercase tracking-wider text-raksa-neutral">
                                <tr>
                                    <th scope="col" class="px-5 py-4">QR ID</th>
                                    <th scope="col" class="px-5 py-4">Nama Barang</th>
                                    <th scope="col" class="px-5 py-4">Pemegang</th>
                                    <th scope="col" class="px-5 py-4">Surveyor</th>
                                    <th scope="col" class="px-5 py-4">Tanggal</th>
                                    <th scope="col" class="px-5 py-4">Kondisi</th>
                                    <th scope="col" class="px-5 py-4">Status</th>
                                    <th scope="col" class="px-5 py-4 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 bg-white">
                                @foreach ($monitoringRows as $row)
                                    <tr class="transition hover:bg-raksa-surface/70">
                                        <td class="px-5 py-4">
                                            <span class="font-mono text-xs font-bold text-raksa-primary">{{ $row['qr'] }}</span>
                                        </td>
                                        <td class="px-5 py-4">
                                            <span class="block font-semibold text-raksa-text">{{ $row['asset'] }}</span>
                                            <span class="mt-0.5 block font-mono text-xs text-slate-500">{{ $row['serial'] }}</span>
                                        </td>
                                        <td class="px-5 py-4">
                                            <div class="flex items-center gap-3">
                                                <span class="inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-raksa-surface-alt text-xs font-bold text-raksa-text">
                                                    {{ $row['initials'] }}
                                                </span>
                                                <span class="font-medium text-raksa-text">{{ $row['holder'] }}</span>
                                            </div>
                                        </td>
                                        <td class="px-5 py-4 text-raksa-neutral">{{ $row['surveyor'] }}</td>
                                        <td class="px-5 py-4 text-raksa-neutral">{{ $row['date'] }}</td>
                                        <td class="px-5 py-4">
                                            <x-raksa.feedback.badge :variant="$row['conditionVariant']">{{ $row['condition'] }}</x-raksa.feedback.badge>
                                        </td>
                                        <td class="px-5 py-4">
                                            <x-raksa.feedback.badge :variant="$row['statusVariant']">{{ $row['status'] }}</x-raksa.feedback.badge>
                                        </td>
                                        <td class="px-5 py-4 text-right">
                                            <a href="{{ route('monitoring.show') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-raksa-primary px-4 py-2 text-xs font-semibold text-white shadow-xs transition hover:bg-raksa-primary-hover focus:outline-none focus:ring-2 focus:ring-raksa-primary/20 focus:ring-offset-2">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke="currentColor" stroke-width="2" />
                                                    <path d="M2.5 12C3.7 7.9 7.5 5 12 5s8.3 2.9 9.5 7c-1.2 4.1-5 7-9.5 7s-8.3-2.9-9.5-7z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <span>Lihat Detail</span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="flex flex-col items-center justify-between gap-4 border-t border-slate-200/80 bg-raksa-surface-alt/40 px-5 py-4 text-xs text-raksa-neutral sm:flex-row">
                        <p>Menampilkan <strong class="font-semibold text-raksa-text">1 - 3</strong> dari 1.248 monitoring</p>

                        <nav class="inline-flex items-center gap-1" aria-label="Pagination monitoring">
                            <button type="button" disabled class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 text-slate-300">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M15 19l-7-7 7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg>
                            </button>
                            <button type="button" class="h-8 w-8 rounded-lg bg-raksa-primary text-xs font-bold text-white">1</button>
                            <button type="button" class="h-8 w-8 rounded-lg text-xs font-semibold text-raksa-text transition hover:bg-slate-100">2</button>
                            <button type="button" class="h-8 w-8 rounded-lg text-xs font-semibold text-raksa-text transition hover:bg-slate-100">3</button>
                            <span class="px-1 text-slate-400">...</span>
                            <button type="button" class="h-8 w-9 rounded-lg text-xs font-semibold text-raksa-text transition hover:bg-slate-100">416</button>
                            <button type="button" class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 text-raksa-text transition hover:bg-slate-100">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M9 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg>
                            </button>
                        </nav>
                    </div>
                </section>

                <section class="grid grid-cols-1 gap-5 lg:grid-cols-2" aria-label="Informasi monitoring dan bantuan">
                    <article class="overflow-hidden rounded-2xl bg-raksa-primary p-5 text-white shadow-sm sm:p-6">
                        <div class="flex items-start justify-between gap-5">
                            <div>
                                <h2 class="text-lg font-bold">Kualitas Data Monitoring</h2>
                                <p class="mt-2 max-w-xl text-sm leading-6 text-blue-50">
                                    Bulan ini, 95% hasil monitoring surveyor dinyatakan valid setelah verifikasi pertama kali. Akurasi pelaporan meningkat 4% dibandingkan bulan Juni.
                                </p>
                            </div>
                            <span class="hidden h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-white/15 sm:inline-flex" aria-hidden="true">
                                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 13l4 4L19 7M5 5h14v14H5V5z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                    </article>

                    <aside class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm sm:p-6">
                        <h2 class="text-lg font-bold text-raksa-text">Butuh Bantuan?</h2>
                        <p class="mt-2 text-sm leading-6 text-raksa-neutral">
                            Pelajari panduan verifikasi aset atau hubungi tim teknis Diskominfo Kota Bandung jika menemui kendala pada sistem monitoring.
                        </p>
                        <div class="mt-4 flex flex-wrap gap-3">
                            <a href="#manual" class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-raksa-primary transition hover:bg-raksa-surface focus:outline-none focus:ring-2 focus:ring-raksa-primary/15">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M7 3h7l5 5v13H7a2 2 0 01-2-2V5a2 2 0 012-2zM14 3v5h5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span>Unduh Manual</span>
                            </a>
                            <a href="#chat-support" class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-raksa-primary transition hover:bg-raksa-surface focus:outline-none focus:ring-2 focus:ring-raksa-primary/15">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M21 12a8 8 0 01-8 8H8l-5 3 2-5a8 8 0 118-6z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span>Chat Support</span>
                            </a>
                        </div>
                    </aside>
                </section>
            </main>

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
