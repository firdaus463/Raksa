<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Detail Sensus Lapangan - RAKSA</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-raksa-background font-sans text-raksa-text antialiased" x-data="{ collapsed: false, mobileSidebarOpen: false }">
    @php
        // Sample detail item (realistis RAKSA e-BMD Diskominfo Kota Bandung)
        $detail = [
            'kode_sensus' => 'SNS-2026-081',
            'kode_aset' => 'BMD-2.01.03.01.005',
            'nama_aset' => 'Server Storage SAN Dell Unity 380',
            'kategori' => 'Peralatan Komputer Data Center',
            'merek_tipe' => 'Dell / Unity 380 All-Flash SAN',
            'nup' => '0001',
            'serial_number' => 'SN: DELL-UNITY-380-BDG',
            'nilai_aset' => 'Rp 280.000.000,00',
            'lokasi' => 'Ruang Data Center Lt. 3 Diskominfo',
            'kondisi' => 'Baik',
            'surveyor' => 'Budi Pratama, S.T. (NIP: 19900822 201503 1 005)',
            'tanggal_sensus' => '04 Agustus 2026, 08:30 WIB',
            'catatan_surveyor' => 'Fisik barang utuh dan beroperasi normal. Suhu ruangan server stabil di 19°C. Stiker label QR Code BMD ditempel ulang dan terlihat jelas.',
            'status_verifikasi' => 'Disetujui', // Pilihan: Disetujui | Ditolak | Menunggu Verifikasi
            'status_variant' => 'success',
            'alasan_penolakan' => 'Foto stiker QR-Code kurang jelas dan blur. Mohon lakukan foto ulang dengan jarak lebih dekat.',
            'verifikator' => 'Hendra Setiawan, S.Kom (Admin Utama BMD)',
            'tanggal_verifikasi' => '04 Agustus 2026, 09:15 WIB',
        ];
    @endphp

    <div class="flex min-h-screen">
        {{-- Sidebar Surveyor --}}
        <x-raksa.layout.sidebar />

        {{-- Main Area --}}
        <div class="flex min-w-0 flex-1 flex-col">
            {{-- Top Navbar --}}
            <x-raksa.layout.navbar title="Detail Sensus Lapangan" />

            {{-- Main Content --}}
            <main class="flex-1 space-y-6 p-4 sm:p-6 laptop:p-8">

                {{-- Breadcrumb & Page Header --}}
                <x-raksa.navigation.page-header
                    title="Detail Sensus Fisik Aset"
                    description="Rincian hasil pendataan fisik lapangan, lokasi penempatan, catatan kondisi, dokumentasi foto, serta status verifikasi Admin."
                >
                    <x-slot:breadcrumb>
                        <x-raksa.navigation.breadcrumb :items="[
                            ['label' => 'Dashboard', 'url' => route('surveyor.dashboard')],
                            ['label' => 'Riwayat Sensus', 'url' => route('surveyor.riwayat.index')],
                            ['label' => 'Detail Sensus'],
                        ]" />
                    </x-slot:breadcrumb>

                    <x-slot:actions>
                        <x-raksa.action.button variant="secondary" href="{{ route('surveyor.riwayat.index') }}">
                            <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            <span>Kembali ke Riwayat</span>
                        </x-raksa.action.button>
                    </x-slot:actions>
                </x-raksa.navigation.page-header>

                {{-- Status Alert Banners --}}
                @if ($detail['status_verifikasi'] === 'Ditolak')
                    <div class="rounded-2xl border border-rose-200 bg-rose-50 p-5 text-rose-900 shadow-xs flex items-start gap-3">
                        <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-rose-100 text-rose-700 shrink-0 mt-0.5">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div class="space-y-1 min-w-0">
                            <h3 class="text-sm font-bold text-rose-900">Hasil Sensus Ditolak Admin</h3>
                            <p class="text-xs text-rose-800 leading-relaxed">
                                <strong>Catatan Revisi Admin:</strong> {{ $detail['alasan_penolakan'] }}
                            </p>
                            <p class="text-[11px] text-rose-700">Diverifikasi oleh: {{ $detail['verifikator'] }} pada {{ $detail['tanggal_verifikasi'] }}</p>
                        </div>
                    </div>
                @elseif ($detail['status_verifikasi'] === 'Disetujui')
                    <div class="rounded-2xl border border-emerald-200 bg-emerald-50 p-5 text-emerald-900 shadow-xs flex items-start gap-3">
                        <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700 shrink-0 mt-0.5">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="space-y-1 min-w-0">
                            <h3 class="text-sm font-bold text-emerald-900">Sensus Telah Diverifikasi & Disetujui</h3>
                            <p class="text-xs text-emerald-800 leading-relaxed">
                                Data hasil pendataan fisik aset BMD ini telah diperiksa dan disetujui secara sah oleh Admin BMD.
                            </p>
                            <p class="text-[11px] text-emerald-700">Diverifikasi oleh: <strong>{{ $detail['verifikator'] }}</strong> pada {{ $detail['tanggal_verifikasi'] }}</p>
                        </div>
                    </div>
                @else
                    <div class="rounded-2xl border border-amber-200 bg-amber-50 p-5 text-amber-900 shadow-xs flex items-start gap-3">
                        <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-amber-100 text-amber-700 shrink-0 mt-0.5">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="space-y-1 min-w-0">
                            <h3 class="text-sm font-bold text-amber-900">Menunggu Verifikasi Admin</h3>
                            <p class="text-xs text-amber-800 leading-relaxed">
                                Laporan sensus fisik telah berhasil dikirim dan berada dalam antrean peninjauan oleh tim Admin BMD Diskominfo.
                            </p>
                        </div>
                    </div>
                @endif

                {{-- Main Grid Layout (Struktur Selaras Detail Aset Admin) --}}
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

                    {{-- Left Column (Main Information) --}}
                    <div class="lg:col-span-8 space-y-6">

                        {{-- Section 1: Informasi Barang --}}
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-6 sm:p-8 shadow-xs space-y-6">
                            <header class="flex items-center gap-3 pb-4 border-b border-slate-100">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-raksa-primary/10 text-raksa-primary shrink-0">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-raksa-text">Informasi Barang</h2>
                                    <p class="text-xs text-raksa-neutral">Identitas barang dan kode registrasi BMD</p>
                                </div>
                            </header>

                            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">KODE ASET / REGISTRASI</dt>
                                    <dd class="text-base font-bold font-mono text-raksa-primary">{{ $detail['kode_aset'] }}</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">NAMA BARANG</dt>
                                    <dd class="text-base font-bold text-raksa-text">{{ $detail['nama_aset'] }}</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">KATEGORI BARANG</dt>
                                    <dd>
                                        <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-raksa-neutral">
                                            {{ $detail['kategori'] }}
                                        </span>
                                    </dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">MERK / TIPE</dt>
                                    <dd class="text-base font-medium text-raksa-text">{{ $detail['merek_tipe'] }}</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">NUP (NOMOR REGISTRASI)</dt>
                                    <dd class="text-base font-mono font-medium text-raksa-text">NUP: {{ $detail['nup'] }}</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">NILAI PEROLEHAN ASET</dt>
                                    <dd class="text-xl font-extrabold text-raksa-primary">{{ $detail['nilai_aset'] }}</dd>
                                </div>
                            </dl>
                        </article>

                        {{-- Section 2: Lokasi & Kondisi Saat Disensus --}}
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-6 sm:p-8 shadow-xs space-y-6">
                            <header class="flex items-center gap-3 pb-4 border-b border-slate-100">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-raksa-accent/10 text-raksa-accent-dark shrink-0">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-raksa-text">Lokasi & Hasil Kondisi Fisik</h2>
                                    <p class="text-xs text-raksa-neutral">Lokasi terkini dan kondisi hasil pemeriksaan lapangan</p>
                                </div>
                            </header>

                            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">LOKASI PENEMPATAN TERKINI</dt>
                                    <dd class="text-base font-bold text-raksa-text">{{ $detail['lokasi'] }}</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">KONDISI SAAT DISENSUS</dt>
                                    <dd class="text-base font-bold text-emerald-700 flex items-center gap-1.5">
                                        <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                                        <span>{{ $detail['kondisi'] }} (100% Berfungsi)</span>
                                    </dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">TANGGAL SENSUS LAPANGAN</dt>
                                    <dd class="text-base font-medium text-raksa-text">{{ $detail['tanggal_sensus'] }}</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">SURVEYOR PENANGGUNG JAWAB</dt>
                                    <dd class="text-base font-medium text-raksa-text">{{ $detail['surveyor'] }}</dd>
                                </div>
                            </dl>

                            <div class="pt-6 border-t border-slate-100 space-y-2">
                                <span class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral block">CATATAN SURVEYOR</span>
                                <p class="text-sm text-raksa-text leading-relaxed bg-raksa-surface p-4 rounded-xl border border-slate-200/60">
                                    "{{ $detail['catatan_surveyor'] }}"
                                </p>
                            </div>
                        </article>

                        {{-- Section 3: Dokumentasi Foto Barang & Stiker QR --}}
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-6 sm:p-8 shadow-xs space-y-6">
                            <header class="flex items-center gap-3 pb-4 border-b border-slate-100">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-sky-100 text-sky-700 shrink-0">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-raksa-text">Dokumentasi Foto Lapangan</h2>
                                    <p class="text-xs text-raksa-neutral">Bukti foto fisik barang dan stiker QR Code yang diunggah</p>
                                </div>
                            </header>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                {{-- Photo 1 --}}
                                <div class="rounded-xl border border-slate-200/80 overflow-hidden bg-slate-100 space-y-2">
                                    <div class="h-48 w-full bg-slate-200 flex items-center justify-center relative group">
                                        <svg class="h-12 w-12 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <div class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                            <span class="text-xs font-bold text-white bg-raksa-primary/80 px-3 py-1.5 rounded-lg">Foto Fisik Unit</span>
                                        </div>
                                    </div>
                                    <div class="p-3 bg-white">
                                        <p class="text-xs font-bold text-raksa-text">Foto Tampak Depan Server SAN</p>
                                        <p class="text-[11px] text-slate-400">Diambil 04 Agu 2026, 08:28 WIB</p>
                                    </div>
                                </div>

                                {{-- Photo 2 --}}
                                <div class="rounded-xl border border-slate-200/80 overflow-hidden bg-slate-100 space-y-2">
                                    <div class="h-48 w-full bg-slate-200 flex items-center justify-center relative group">
                                        <svg class="h-12 w-12 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                                        </svg>
                                        <div class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                            <span class="text-xs font-bold text-white bg-raksa-primary/80 px-3 py-1.5 rounded-lg">Stiker Label QR</span>
                                        </div>
                                    </div>
                                    <div class="p-3 bg-white">
                                        <p class="text-xs font-bold text-raksa-text">Foto Stiker QR Code Terpasang</p>
                                        <p class="text-[11px] text-slate-400">Diambil 04 Agu 2026, 08:29 WIB</p>
                                    </div>
                                </div>
                            </div>
                        </article>

                    </div>

                    {{-- Right Column (QR Code & Timeline Verifikasi Admin) --}}
                    <div class="lg:col-span-4 space-y-6">

                        {{-- QR Code Card --}}
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs space-y-6 text-center">
                            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                                <span class="text-xs font-bold uppercase tracking-wider text-raksa-neutral">STATUS SENSUS</span>
                                <x-raksa.feedback.badge :variant="$detail['status_variant']" class="text-xs px-3 py-1 font-semibold">
                                    {{ $detail['status_verifikasi'] }}
                                </x-raksa.feedback.badge>
                            </div>

                            {{-- QR Box --}}
                            <div class="flex flex-col items-center justify-center p-6 rounded-2xl bg-raksa-surface border border-slate-200/60 space-y-3">
                                <div class="h-36 w-36 rounded-xl bg-white p-3 shadow-xs border border-slate-200/80 flex items-center justify-center">
                                    <svg class="h-full w-full text-slate-800" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-raksa-text">{{ $detail['kode_sensus'] }}</p>
                                    <p class="text-[11px] text-slate-400">{{ $detail['kode_aset'] }}</p>
                                </div>
                            </div>

                            <dl class="space-y-3 text-xs text-left">
                                <div class="flex items-center justify-between">
                                    <dt class="text-raksa-neutral">Kondisi Hasil Sensus:</dt>
                                    <dd class="font-bold text-emerald-700">Baik</dd>
                                </div>
                                <div class="flex items-center justify-between">
                                    <dt class="text-raksa-neutral">Tanggal Pendataan:</dt>
                                    <dd class="font-semibold text-raksa-text">04 Agu 2026</dd>
                                </div>
                                <div class="flex items-center justify-between">
                                    <dt class="text-raksa-neutral">Verifikasi Admin:</dt>
                                    <dd class="font-semibold text-emerald-700">Disetujui Sah</dd>
                                </div>
                            </dl>

                            <div class="space-y-3 pt-4 border-t border-slate-100">
                                <x-raksa.action.button variant="primary" class="w-full text-xs">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                    </svg>
                                    <span>Cetak Bukti Sensus</span>
                                </x-raksa.action.button>

                                <x-raksa.action.button variant="outline" href="{{ route('surveyor.riwayat.index') }}" class="w-full text-xs">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                    </svg>
                                    <span>Kembali ke Riwayat</span>
                                </x-raksa.action.button>
                            </div>
                        </article>

                        {{-- Timeline Riwayat Verifikasi Admin --}}
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs space-y-4">
                            <h3 class="text-xs font-bold uppercase tracking-wider text-raksa-neutral pb-2 border-b border-slate-100">
                                RIWAYAT VERIFIKASI ADMIN
                            </h3>

                            <ol class="relative border-l border-slate-200 space-y-4 ml-3">
                                {{-- Step 1 --}}
                                <li class="ml-4">
                                    <div class="absolute -left-1.5 mt-1.5 h-3 w-3 rounded-full bg-emerald-500 border-2 border-white"></div>
                                    <time class="text-[10px] text-slate-400 block font-mono">04 Agu 2026, 08:30 WIB</time>
                                    <p class="text-xs font-bold text-raksa-text">Sensus Fisik Dikirim</p>
                                    <p class="text-[11px] text-raksa-neutral">Dikirim oleh Budi Pratama (Surveyor)</p>
                                </li>

                                {{-- Step 2 --}}
                                <li class="ml-4">
                                    <div class="absolute -left-1.5 mt-1.5 h-3 w-3 rounded-full bg-emerald-500 border-2 border-white"></div>
                                    <time class="text-[10px] text-slate-400 block font-mono">04 Agu 2026, 09:00 WIB</time>
                                    <p class="text-xs font-bold text-raksa-text">Peninjauan Berkas Admin</p>
                                    <p class="text-[11px] text-raksa-neutral">Pemeriksaan foto & catatan fisik</p>
                                </li>

                                {{-- Step 3 --}}
                                <li class="ml-4">
                                    <div class="absolute -left-1.5 mt-1.5 h-3 w-3 rounded-full bg-emerald-500 border-2 border-white"></div>
                                    <time class="text-[10px] text-slate-400 block font-mono">04 Agu 2026, 09:15 WIB</time>
                                    <p class="text-xs font-bold text-emerald-700">Verifikasi Disetujui</p>
                                    <p class="text-[11px] text-raksa-neutral">Disetujui oleh Hendra Setiawan (Admin BMD)</p>
                                </li>
                            </ol>
                        </article>

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
