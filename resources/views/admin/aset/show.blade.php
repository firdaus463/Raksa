<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Detail Aset - RAKSA</title>

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
                    title="Detail Aset Daerah"
                    description="Informasi spesifikasi lengkap, nomor registrasi, penanggung jawab, dan status QR Code / Pakta Integritas aset."
                >
                    <x-slot:breadcrumb>
                        <x-raksa.navigation.breadcrumb :items="[
                            ['label' => 'Dashboard', 'url' => route('dashboard')],
                            ['label' => 'Pengadaan', 'url' => route('pengadaan.index')],
                            ['label' => 'Data Aset', 'url' => route('aset.index')],
                            ['label' => 'Detail Aset'],
                        ]" />
                    </x-slot:breadcrumb>

                    <x-slot:actions>
                        <x-raksa.action.button variant="secondary" href="{{ route('aset.index') }}">
                            <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            <span>Kembali</span>
                        </x-raksa.action.button>

                        <x-raksa.action.button variant="primary" href="{{ route('aset.create') }}">
                            <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            <span>Edit Aset</span>
                        </x-raksa.action.button>
                    </x-slot:actions>
                </x-raksa.navigation.page-header>

                {{-- Main Grid Layout --}}
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

                    {{-- Left Column (Main Information) --}}
                    <div class="lg:col-span-8 space-y-6">

                        {{-- Section 1: Spesifikasi & Identitas Barang --}}
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-6 sm:p-8 shadow-xs space-y-6">
                            <header class="flex items-center gap-3 pb-4 border-b border-slate-100">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-raksa-primary/10 text-raksa-primary shrink-0">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-raksa-text">Spesifikasi & Identitas Barang</h2>
                                    <p class="text-xs text-raksa-neutral">Detail fisik dan nomor serial inventaris barang</p>
                                </div>
                            </header>

                            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">KODE ASET / REGISTRASI</dt>
                                    <dd class="text-base font-bold font-mono text-raksa-primary">AST-2026-00891</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">NAMA BARANG</dt>
                                    <dd class="text-base font-bold text-raksa-text">MacBook Pro M2 14"</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">KATEGOIR BARANG</dt>
                                    <dd>
                                        <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-raksa-neutral">
                                            Peralatan Kantor
                                        </span>
                                    </dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">MERK / TYPE</dt>
                                    <dd class="text-base font-medium text-raksa-text">MacBook / Pro M2 14"</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">SERIAL NUMBER / NO. RANGKA</dt>
                                    <dd class="text-base font-mono font-medium text-raksa-text">SN: APPL-99283-X</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">TANGGAL PEMBELIAN</dt>
                                    <dd class="text-base font-medium text-raksa-text">28 Januari 2026</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">BAHAN / MATERIAL</dt>
                                    <dd class="text-base font-medium text-raksa-text">Aluminium</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">NILAI ASET (IDR)</dt>
                                    <dd class="text-xl font-extrabold text-raksa-primary">Rp 32.500.000,00</dd>
                                </div>
                            </dl>

                            <div class="pt-6 border-t border-slate-100 space-y-1.5">
                                <span class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral block">KETERANGAN TAMBAHAN</span>
                                <p class="text-sm text-raksa-text leading-relaxed">
                                    Belanja Modal Alat Komunikasi untuk kebutuhan operasional Sekretariat Diskominfo Kota Bandung.
                                </p>
                            </div>
                        </article>

                        {{-- Section 2: Penanggung Jawab & Sumber Pengadaan --}}
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-6 sm:p-8 shadow-xs space-y-6">
                            <header class="flex items-center gap-3 pb-4 border-b border-slate-100">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-raksa-accent/10 text-raksa-accent-dark shrink-0">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-raksa-text">Penanggung Jawab & Sumber Pengadaan</h2>
                                    <p class="text-xs text-raksa-neutral">Lokasi penempatan barang dan nomor kontrak pengadaan</p>
                                </div>
                            </header>

                            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">PEMEGANG BARANG</dt>
                                    <dd class="text-base font-bold text-raksa-text">Hendra Kurniawan, S.T.</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">LOKASI PENEMPATAN</dt>
                                    <dd class="text-base font-bold text-raksa-text">Ruang Data Center Diskominfo</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">NOMOR SPK PENGADAAN</dt>
                                    <dd class="text-base font-bold text-raksa-primary">
                                        <a href="{{ route('pengadaan.show') }}" class="hover:underline">
                                            SPK/DISKOMINFO/2024/001
                                        </a>
                                    </dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">PENYEDIA / REKANAN</dt>
                                    <dd class="text-base font-medium text-raksa-text">PT. Indonesia Bangun Semesta</dd>
                                </div>
                            </dl>
                        </article>

                        {{-- Section 3: Lampiran & Berkas Terhubung --}}
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-6 sm:p-8 shadow-xs space-y-6">
                            <header class="flex items-center gap-3 pb-4 border-b border-slate-100">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/10 text-emerald-700 shrink-0">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-raksa-text">Lampiran & Berkas Terhubung</h2>
                                    <p class="text-xs text-raksa-neutral">Dokumen serah terima dan foto bukti penyerahan barang</p>
                                </div>
                            </header>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                {{-- Attachment 1 --}}
                                <div class="rounded-xl border border-slate-200/80 bg-raksa-surface/60 p-4 flex items-center justify-between gap-3 hover:border-raksa-primary/40 transition">
                                    <div class="flex items-center gap-3 min-w-0">
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-rose-50 text-rose-600">
                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                        <div class="min-w-0">
                                            <p class="text-sm font-bold text-raksa-text truncate">BAST_DISKOMINFO_001.pdf</p>
                                            <p class="text-xs text-slate-400">1.2 MB • Dokumen BAST</p>
                                        </div>
                                    </div>
                                    <button type="button" class="p-2 rounded-lg text-slate-400 hover:text-raksa-primary hover:bg-raksa-primary/10 transition" title="Unduh File">
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                        </svg>
                                    </button>
                                </div>

                                {{-- Attachment 2 --}}
                                <div class="rounded-xl border border-slate-200/80 bg-raksa-surface/60 p-4 flex items-center justify-between gap-3 hover:border-raksa-primary/40 transition">
                                    <div class="flex items-center gap-3 min-w-0">
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-sky-50 text-sky-600">
                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                        <div class="min-w-0">
                                            <p class="text-sm font-bold text-raksa-text truncate">foto_pemegang_barang.jpg</p>
                                            <p class="text-xs text-slate-400">2.4 MB • Foto Penyerahan</p>
                                        </div>
                                    </div>
                                    <button type="button" class="p-2 rounded-lg text-slate-400 hover:text-raksa-primary hover:bg-raksa-primary/10 transition" title="Lihat Foto">
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </article>

                    </div>

                    {{-- Right Column (QR Code & Quick Actions) --}}
                    <div class="lg:col-span-4 space-y-6">

                        {{-- QR Code Card --}}
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs space-y-6 text-center">
                            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                                <span class="text-xs font-bold uppercase tracking-wider text-raksa-neutral">STATUS BARANG</span>
                                <x-raksa.feedback.badge variant="success" class="text-xs px-3 py-1 font-semibold">Aktif</x-raksa.feedback.badge>
                            </div>

                            {{-- QR Box --}}
                            <div class="flex flex-col items-center justify-center p-6 rounded-2xl bg-raksa-surface border border-slate-200/60 space-y-3">
                                <div class="h-36 w-36 rounded-xl bg-white p-3 shadow-xs border border-slate-200/80 flex items-center justify-center">
                                    <svg class="h-full w-full text-slate-800" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-raksa-text">AST-2026-00891</p>
                                    <p class="text-[11px] text-slate-400">Scan QR untuk verifikasi inventaris</p>
                                </div>
                            </div>

                            <dl class="space-y-3 text-xs text-left">
                                <div class="flex items-center justify-between">
                                    <dt class="text-raksa-neutral">Kondisi Barang:</dt>
                                    <dd class="font-bold text-emerald-700">Sangat Baik</dd>
                                </div>
                                <div class="flex items-center justify-between">
                                    <dt class="text-raksa-neutral">Tanggal Input:</dt>
                                    <dd class="font-semibold text-raksa-text">28 Jan 2026</dd>
                                </div>
                                <div class="flex items-center justify-between">
                                    <dt class="text-raksa-neutral">Terakhir Disensus:</dt>
                                    <dd class="font-semibold text-raksa-text">15 Feb 2026</dd>
                                </div>
                            </dl>

                            <div class="space-y-3 pt-4 border-t border-slate-100">
                                <x-raksa.action.button variant="primary" class="w-full text-xs">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                    </svg>
                                    <span>Cetak Label QR Code</span>
                                </x-raksa.action.button>

                                <x-raksa.action.button variant="secondary" class="w-full text-xs">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <span>Cetak Pakta Integritas</span>
                                </x-raksa.action.button>

                                <x-raksa.action.button variant="outline" href="{{ route('aset.index') }}" class="w-full text-xs">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                    </svg>
                                    <span>Kembali ke Data Aset</span>
                                </x-raksa.action.button>
                            </div>
                        </article>

                    </div>

                </div>

            </main>
        </div>
    </div>
</body>
</html>
