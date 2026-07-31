<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Detail Pengadaan - RAKSA</title>

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
                    title="Detail Pengadaan"
                    description="Informasi lengkap administrasi SPK, penyedia, dan dokumen pendukung pengadaan."
                >
                    <x-slot:breadcrumb>
                        <x-raksa.navigation.breadcrumb :items="[
                            ['label' => 'Dashboard', 'url' => route('dashboard')],
                            ['label' => 'Pengadaan', 'url' => route('pengadaan.index')],
                            ['label' => 'Riwayat Pengadaan', 'url' => route('pengadaan.index')],
                            ['label' => 'Detail Pengadaan'],
                        ]" />
                    </x-slot:breadcrumb>

                    <x-slot:actions>
                        <x-raksa.action.button variant="secondary" href="{{ route('pengadaan.index') }}">
                            <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            <span>Kembali</span>
                        </x-raksa.action.button>

                        <x-raksa.action.button variant="primary" href="{{ route('pengadaan.create') }}">
                            <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            <span>Edit Informasi Pengadaan</span>
                        </x-raksa.action.button>
                    </x-slot:actions>
                </x-raksa.navigation.page-header>

                {{-- Main Grid Layout --}}
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                    
                    {{-- Left Column (Main Information) --}}
                    <div class="lg:col-span-8 space-y-6">

                        {{-- Section 1: Informasi Pengadaan Card --}}
                        <article class="rounded-2xl border border-raksa-border/20 bg-white p-6 sm:p-8 shadow-sm space-y-6">
                            <header class="flex items-center gap-3 pb-4 border-b border-raksa-border/20">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-raksa-primary/10 text-raksa-primary shrink-0">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-raksa-text">Informasi Pengadaan</h2>
                                    <p class="text-xs text-raksa-neutral">Detail utama kontrak dan nilai pengadaan</p>
                                </div>
                            </header>

                            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">NOMOR SPK</dt>
                                    <dd class="text-base font-bold text-raksa-text">SPK/DISKOMINFO/2024/001</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">TANGGAL SPK</dt>
                                    <dd class="text-base font-bold text-raksa-text">21 Januari 2026</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">JANGKA WAKTU</dt>
                                    <dd class="text-base font-bold text-raksa-text">30 Hari Kerja</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">NILAI KONTRAK (RP)</dt>
                                    <dd class="text-xl font-extrabold text-raksa-primary">Rp 450.000.000,00</dd>
                                </div>
                            </dl>

                            <div class="pt-6 border-t border-raksa-border/20 space-y-1.5">
                                <span class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral block">KETERANGAN TAMBAHAN</span>
                                <p class="text-sm text-raksa-text leading-relaxed">
                                    Belanja Modal Alat Komunikasi - PPTK M. Ridwan Fathony - Sekretariat
                                </p>
                            </div>
                        </article>

                        {{-- Section 2: Informasi Penyedia Card --}}
                        <article class="rounded-2xl border border-raksa-border/20 bg-white p-6 sm:p-8 shadow-sm space-y-6">
                            <header class="flex items-center gap-3 pb-4 border-b border-raksa-border/20">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-raksa-accent/10 text-raksa-accent-dark shrink-0">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m0 0h4m-4 0V11m0 0h4m-4 0H9"/>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-raksa-text">Informasi Penyedia</h2>
                                    <p class="text-xs text-raksa-neutral">Identitas perusahaan dan rekening penyedia barang/jasa</p>
                                </div>
                            </header>

                            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">NAMA PERUSAHAAN</dt>
                                    <dd class="text-base font-bold text-raksa-text">PT. Indonesia Bangun Semesta</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">NAMA PEMILIK</dt>
                                    <dd class="text-base font-bold text-raksa-text">Meirani</dd>
                                </div>

                                <div class="sm:col-span-2 space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">NPWP</dt>
                                    <dd class="text-base font-bold text-raksa-text">10.000.000.0-439.582</dd>
                                </div>

                                <div class="sm:col-span-2 space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">ALAMAT PERUSAHAAN</dt>
                                    <dd class="text-sm font-medium text-raksa-text">Jl. Sari Indah 2 No 5 RT 01 RW 12, Kota Bandung 16417</dd>
                                </div>
                            </dl>

                            {{-- Bank Details Sub-Card --}}
                            <div class="rounded-xl bg-raksa-surface p-4 sm:p-5 border border-raksa-border/30 grid grid-cols-1 sm:grid-cols-3 gap-4">
                                <div class="space-y-1">
                                    <span class="text-[11px] font-bold uppercase tracking-wider text-raksa-neutral block">BANK</span>
                                    <span class="text-sm font-semibold text-raksa-text block">BJB</span>
                                </div>
                                <div class="space-y-1">
                                    <span class="text-[11px] font-bold uppercase tracking-wider text-raksa-neutral block">ATAS NAMA</span>
                                    <span class="text-sm font-semibold text-raksa-text block">Aura Mandiri Sejati PT</span>
                                </div>
                                <div class="space-y-1">
                                    <span class="text-[11px] font-bold uppercase tracking-wider text-raksa-neutral block">NOMOR REKENING</span>
                                    <span class="text-sm font-semibold text-raksa-text block">152086180001</span>
                                </div>
                            </div>
                        </article>

                        {{-- Section 3: Dokumen Pengadaan Card --}}
                        <article class="rounded-2xl border border-raksa-border/20 bg-white p-6 sm:p-8 shadow-sm space-y-6">
                            <header class="flex items-center gap-3 pb-4 border-b border-raksa-border/20">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-green-500/10 text-green-700 shrink-0">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-raksa-text">Dokumen Pengadaan</h2>
                                    <p class="text-xs text-raksa-neutral">Berkas administrasi dan dokumen serah terima (BAST / SPM)</p>
                                </div>
                            </header>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                {{-- Doc 1: BAST --}}
                                <div class="rounded-xl border border-raksa-border/30 bg-raksa-surface/60 p-4 flex flex-col justify-between space-y-4 hover:border-raksa-primary/40 transition">
                                    <div class="flex items-start justify-between gap-2">
                                        <div class="space-y-1">
                                            <h3 class="text-sm font-bold text-raksa-text">Dokumen BAST</h3>
                                            <p class="text-xs text-raksa-neutral">Berita Acara Serah Terima</p>
                                        </div>
                                        <x-raksa.feedback.badge variant="success">Tersedia</x-raksa.feedback.badge>
                                    </div>
                                    <button type="button" class="inline-flex items-center justify-center gap-2 rounded-lg border border-raksa-border/50 bg-white py-2 px-3 text-xs font-semibold text-raksa-primary hover:bg-raksa-primary/5 transition">
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                        </svg>
                                        <span>Unduh File</span>
                                    </button>
                                </div>

                                {{-- Doc 2: SPM --}}
                                <div class="rounded-xl border border-raksa-border/30 bg-raksa-surface/60 p-4 flex flex-col justify-between space-y-4 hover:border-raksa-primary/40 transition">
                                    <div class="flex items-start justify-between gap-2">
                                        <div class="space-y-1">
                                            <h3 class="text-sm font-bold text-raksa-text">Dokumen SPM</h3>
                                            <p class="text-xs text-raksa-neutral">Surat Perintah Membayar</p>
                                        </div>
                                        <x-raksa.feedback.badge variant="success">Tersedia</x-raksa.feedback.badge>
                                    </div>
                                    <button type="button" class="inline-flex items-center justify-center gap-2 rounded-lg border border-raksa-border/50 bg-white py-2 px-3 text-xs font-semibold text-raksa-primary hover:bg-raksa-primary/5 transition">
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                        </svg>
                                        <span>Unduh File</span>
                                    </button>
                                </div>

                                {{-- Doc 3: Pendukung --}}
                                <div class="rounded-xl border border-raksa-border/30 bg-raksa-surface/60 p-4 flex flex-col justify-between space-y-4 hover:border-raksa-primary/40 transition">
                                    <div class="flex items-start justify-between gap-2">
                                        <div class="space-y-1">
                                            <h3 class="text-sm font-bold text-raksa-text">Dokumen Pendukung</h3>
                                            <p class="text-xs text-raksa-neutral">Lampiran Tambahan</p>
                                        </div>
                                        <x-raksa.feedback.badge variant="info">2 File</x-raksa.feedback.badge>
                                    </div>
                                    <button type="button" class="inline-flex items-center justify-center gap-2 rounded-lg border border-raksa-border/50 bg-white py-2 px-3 text-xs font-semibold text-raksa-primary hover:bg-raksa-primary/5 transition">
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        <span>Lihat Berkas</span>
                                    </button>
                                </div>
                            </div>
                        </article>

                    </div>

                    {{-- Right Column (Overview & Quick Actions Sidebar) --}}
                    <div class="lg:col-span-4 space-y-6">

                        {{-- Quick Action Card --}}
                        <article class="rounded-2xl border border-raksa-border/20 bg-white p-6 shadow-sm space-y-6">
                            <div class="flex items-center justify-between pb-4 border-b border-raksa-border/20">
                                <span class="text-xs font-bold uppercase tracking-wider text-raksa-neutral">STATUS PENGADAAN</span>
                                <x-raksa.feedback.badge variant="success" class="text-xs px-3 py-1 font-semibold">Selesai</x-raksa.feedback.badge>
                            </div>

                            <dl class="space-y-3 text-xs">
                                <div class="flex items-center justify-between">
                                    <dt class="text-raksa-neutral">Dibuat Pada:</dt>
                                    <dd class="font-semibold text-raksa-text">21 Jan 2026</dd>
                                </div>
                                <div class="flex items-center justify-between">
                                    <dt class="text-raksa-neutral">Diinput Oleh:</dt>
                                    <dd class="font-semibold text-raksa-text">Admin EBMD</dd>
                                </div>
                                <div class="flex items-center justify-between">
                                    <dt class="text-raksa-neutral">Jumlah Aset:</dt>
                                    <dd class="font-semibold text-raksa-primary">42 Aset</dd>
                                </div>
                            </dl>

                            <div class="space-y-3 pt-4 border-t border-raksa-border/20">
                                <x-raksa.action.button variant="primary" href="{{ route('pengadaan.create') }}" class="w-full text-xs">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    <span>Edit Informasi Pengadaan</span>
                                </x-raksa.action.button>

                                <x-raksa.action.button variant="secondary" href="{{ route('aset.index') }}" class="w-full text-xs">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                    <span>Review Aset Pengadaan</span>
                                </x-raksa.action.button>

                                <x-raksa.action.button variant="outline" href="{{ route('pengadaan.index') }}" class="w-full text-xs">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                    </svg>
                                    <span>Kembali ke Riwayat</span>
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
