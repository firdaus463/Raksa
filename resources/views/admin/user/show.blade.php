<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Detail Surveyor - RAKSA</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-raksa-background font-sans text-raksa-text antialiased" x-data="{ collapsed: false, mobileSidebarOpen: false, editModalOpen: false }">
    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <x-raksa.layout.sidebar />

        {{-- Main Area --}}
        <div class="flex min-w-0 flex-1 flex-col">
            {{-- Top Navbar --}}
            <x-raksa.layout.navbar title="Detail Surveyor" />

            {{-- Main Content --}}
            <main class="flex-1 space-y-6 p-4 sm:p-6 laptop:p-8">
                
                {{-- Breadcrumb & Page Header --}}
                <x-raksa.navigation.page-header
                    title="Detail Surveyor"
                    description="Informasi lengkap profil, data pekerjaan, dan riwayat aktivitas sensus surveyor."
                >
                    <x-slot:breadcrumb>
                        <x-raksa.navigation.breadcrumb :items="[
                            ['label' => 'Dashboard', 'url' => route('dashboard')],
                            ['label' => 'Kelola User', 'url' => route('user.index')],
                            ['label' => 'Detail Surveyor'],
                        ]" />
                    </x-slot:breadcrumb>

                    <x-slot:actions>
                        <x-raksa.action.button variant="secondary" href="{{ route('user.index') }}">
                            <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            <span>Kembali</span>
                        </x-raksa.action.button>

                        <x-raksa.action.button variant="primary" type="button" @click="editModalOpen = true">
                            <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            <span>Edit Profil</span>
                        </x-raksa.action.button>
                    </x-slot:actions>
                </x-raksa.navigation.page-header>

                {{-- Profile & Info Grid --}}
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-12 lg:items-start">
                    
                    {{-- Left Column: Surveyor Profile & Stats Card --}}
                    <article class="rounded-2xl border border-slate-200/80 bg-white p-6 text-center shadow-xs space-y-5 lg:col-span-4">
                        <div class="space-y-3">
                            <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-2xl bg-raksa-primary/10 text-2xl font-bold text-raksa-primary border border-raksa-primary/20 shadow-2xs">
                                RH
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-raksa-text">Riyan Hidayat, S.T.</h2>
                                <p class="text-xs font-mono text-raksa-neutral mt-0.5">@riyan_h_surveyor</p>
                            </div>
                            <div>
                                <x-raksa.feedback.badge variant="success" class="px-3 py-1 text-xs font-semibold">
                                    Aktif
                                </x-raksa.feedback.badge>
                            </div>
                        </div>

                        <div class="border-t border-slate-100 pt-5">
                            <h3 class="text-xs font-bold uppercase tracking-wider text-raksa-neutral mb-3">RINGKASAN KINERJA</h3>
                            <div class="grid grid-cols-2 gap-3 text-center">
                                <div class="rounded-xl bg-raksa-surface p-3 border border-slate-200/60">
                                    <span class="block text-[11px] font-semibold text-raksa-neutral uppercase">TOTAL SENSUS</span>
                                    <span class="block text-xl font-extrabold text-raksa-text mt-0.5">156</span>
                                </div>
                                <div class="rounded-xl bg-emerald-50 p-3 border border-emerald-100">
                                    <span class="block text-[11px] font-semibold text-emerald-700 uppercase">DISETUJUI</span>
                                    <span class="block text-xl font-extrabold text-emerald-700 mt-0.5">148</span>
                                </div>
                                <div class="rounded-xl bg-rose-50 p-3 border border-rose-100">
                                    <span class="block text-[11px] font-semibold text-rose-700 uppercase">DITOLAK</span>
                                    <span class="block text-xl font-extrabold text-rose-700 mt-0.5">8</span>
                                </div>
                                <div class="rounded-xl bg-sky-50 p-3 border border-sky-100">
                                    <span class="block text-[11px] font-semibold text-sky-700 uppercase">AKURASI</span>
                                    <span class="block text-xl font-extrabold text-sky-700 mt-0.5">95%</span>
                                </div>
                            </div>
                        </div>
                    </article>

                    {{-- Right Column: Information Cards --}}
                    <div class="space-y-6 lg:col-span-8">
                        
                        {{-- Card 1: Informasi Pribadi --}}
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-6 sm:p-8 shadow-xs space-y-6">
                            <header class="flex items-center gap-3 pb-4 border-b border-slate-100">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-raksa-primary/10 text-raksa-primary shrink-0">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-raksa-text">Informasi Pribadi</h2>
                                    <p class="text-xs text-raksa-neutral">Data identitas diri dan kontak surveyor</p>
                                </div>
                            </header>

                            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">NAMA LENGKAP</dt>
                                    <dd class="text-base font-bold text-raksa-text">Riyan Hidayat, S.T.</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">NIP</dt>
                                    <dd class="text-base font-mono font-bold text-raksa-primary">19920815 201801 1 004</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">EMAIL</dt>
                                    <dd class="text-sm font-semibold text-raksa-text">riyan.hidayat@bandung.go.id</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">NOMOR HP / WHATSAPP</dt>
                                    <dd class="text-sm font-semibold text-raksa-text">0812-3456-7890</dd>
                                </div>
                            </dl>
                        </article>

                        {{-- Card 2: Informasi Pekerjaan --}}
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-6 sm:p-8 shadow-xs space-y-6">
                            <header class="flex items-center gap-3 pb-4 border-b border-slate-100">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-raksa-accent/10 text-raksa-accent-dark shrink-0">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-raksa-text">Informasi Pekerjaan</h2>
                                    <p class="text-xs text-raksa-neutral">Unit kerja dan statistik keanggotaan surveyor</p>
                                </div>
                            </header>

                            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">BIDANG / UNIT KERJA</dt>
                                    <dd class="text-base font-bold text-raksa-text">Sekretariat - Umum</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">TANGGAL BERGABUNG</dt>
                                    <dd class="text-base font-medium text-raksa-text">15 Januari 2024</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">TOTAL ASET DISENSUS</dt>
                                    <dd class="text-base font-bold text-raksa-primary">156 Barang</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">STATUS AKSES AKUN</dt>
                                    <dd class="text-sm font-semibold text-emerald-700 flex items-center gap-1.5">
                                        <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                                        Aktif (Akses Lapangan)
                                    </dd>
                                </div>
                            </dl>
                        </article>

                    </div>
                </div>

                {{-- Section 3: Card Aktivitas Sensus Terakhir --}}
                <article class="rounded-2xl border border-slate-200/80 bg-white shadow-xs overflow-hidden">
                    <header class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <h2 class="text-lg font-bold text-raksa-text">Aktivitas Sensus Terakhir</h2>
                            <p class="text-xs text-raksa-neutral">Daftar laporan sensus terbaru yang diajukan oleh surveyor ini</p>
                        </div>
                        <x-raksa.action.button variant="secondary" href="{{ route('monitoring.index') }}" class="!py-2 !px-3.5 text-xs">
                            <span>Lihat Semua Monitoring</span>
                        </x-raksa.action.button>
                    </header>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-raksa-text divide-y divide-slate-100">
                            <thead class="bg-raksa-surface-alt text-xs font-bold text-raksa-neutral uppercase tracking-wider border-b border-slate-200/60">
                                <tr>
                                    <th scope="col" class="py-4 px-6">QR ID</th>
                                    <th scope="col" class="py-4 px-6">NAMA BARANG</th>
                                    <th scope="col" class="py-4 px-6">KATEGORI</th>
                                    <th scope="col" class="py-4 px-6">PEMEGANG</th>
                                    <th scope="col" class="py-4 px-6">TANGGAL SENSUS</th>
                                    <th scope="col" class="py-4 px-6">KONDISI (USUL)</th>
                                    <th scope="col" class="py-4 px-6">STATUS</th>
                                    <th scope="col" class="py-4 px-6 text-center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 bg-white">
                                {{-- Row 1 --}}
                                <tr class="hover:bg-raksa-surface/60 transition duration-150">
                                    <td class="py-4 px-6 font-mono font-bold text-raksa-primary">
                                        QR-2026-00125
                                    </td>
                                    <td class="py-4 px-6 font-bold text-raksa-text">
                                        Laptop Lenovo ThinkPad T14
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-medium text-raksa-neutral">
                                            Peralatan Kantor
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 font-medium text-raksa-text">
                                        Bu Yully
                                    </td>
                                    <td class="py-4 px-6 text-xs text-raksa-neutral">
                                        25 Juli 2026
                                    </td>
                                    <td class="py-4 px-6">
                                        <x-raksa.feedback.badge variant="warning">Rusak Ringan</x-raksa.feedback.badge>
                                    </td>
                                    <td class="py-4 px-6">
                                        <x-raksa.feedback.badge variant="info">Menunggu Verifikasi</x-raksa.feedback.badge>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <a href="{{ route('monitoring.show') }}" class="p-2 rounded-lg text-slate-400 hover:text-raksa-primary hover:bg-raksa-primary/10 transition inline-flex items-center justify-center" title="Lihat Detail Sensus">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>

                                {{-- Row 2 --}}
                                <tr class="hover:bg-raksa-surface/60 transition duration-150">
                                    <td class="py-4 px-6 font-mono font-bold text-raksa-primary">
                                        QR-2026-00126
                                    </td>
                                    <td class="py-4 px-6 font-bold text-raksa-text">
                                        Apple iPhone 16 Pro
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-medium text-raksa-neutral">
                                            Elektronik
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 font-medium text-raksa-text">
                                        M. Ridwan Fathony
                                    </td>
                                    <td class="py-4 px-6 text-xs text-raksa-neutral">
                                        24 Juli 2026
                                    </td>
                                    <td class="py-4 px-6">
                                        <x-raksa.feedback.badge variant="success">Baik</x-raksa.feedback.badge>
                                    </td>
                                    <td class="py-4 px-6">
                                        <x-raksa.feedback.badge variant="success">Disetujui</x-raksa.feedback.badge>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <a href="{{ route('monitoring.show') }}" class="p-2 rounded-lg text-slate-400 hover:text-raksa-primary hover:bg-raksa-primary/10 transition inline-flex items-center justify-center" title="Lihat Detail Sensus">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>

                                {{-- Row 3 --}}
                                <tr class="hover:bg-raksa-surface/60 transition duration-150">
                                    <td class="py-4 px-6 font-mono font-bold text-raksa-primary">
                                        QR-2026-00127
                                    </td>
                                    <td class="py-4 px-6 font-bold text-raksa-text">
                                        Printer Epson L3210
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-medium text-raksa-neutral">
                                            Elektronik
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 font-medium text-raksa-text">
                                        Dewi Lestari
                                    </td>
                                    <td class="py-4 px-6 text-xs text-raksa-neutral">
                                        24 Juli 2026
                                    </td>
                                    <td class="py-4 px-6">
                                        <x-raksa.feedback.badge variant="danger">Rusak Berat</x-raksa.feedback.badge>
                                    </td>
                                    <td class="py-4 px-6">
                                        <x-raksa.feedback.badge variant="danger">Ditolak</x-raksa.feedback.badge>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <a href="{{ route('monitoring.show') }}" class="p-2 rounded-lg text-slate-400 hover:text-raksa-primary hover:bg-raksa-primary/10 transition inline-flex items-center justify-center" title="Lihat Detail Sensus">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- Table Pagination --}}
                    <div class="px-6 py-4 border-t border-slate-100 bg-raksa-surface-alt/40 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-raksa-neutral">
                        <div>
                            Menampilkan <strong class="font-semibold text-raksa-text">1 - 3</strong> dari 156 sensus
                        </div>

                        <nav class="inline-flex items-center gap-1" aria-label="Navigasi Aktivitas Sensus">
                            <button type="button" disabled class="p-1.5 rounded-lg border border-slate-200 text-slate-300 cursor-not-allowed">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 19l-7-7 7-7"/></svg>
                            </button>
                            <button type="button" class="h-8 w-8 rounded-lg bg-raksa-primary text-white font-bold text-xs">1</button>
                            <button type="button" class="h-8 w-8 rounded-lg text-raksa-text hover:bg-slate-100 font-medium text-xs transition">2</button>
                            <button type="button" class="h-8 w-8 rounded-lg text-raksa-text hover:bg-slate-100 font-medium text-xs transition">3</button>
                            <button type="button" class="p-1.5 rounded-lg border border-slate-200 text-raksa-text hover:bg-slate-100 transition">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 5l7 7-7 7"/></svg>
                            </button>
                        </nav>
                    </div>
                </article>

            </main>

            {{-- Modal Edit Surveyor --}}
            <div
                x-show="editModalOpen"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/50 backdrop-blur-xs overflow-y-auto"
                style="display: none;"
                @keydown.escape.window="editModalOpen = false"
            >
                <div
                    @click.away="editModalOpen = false"
                    class="relative w-full max-w-2xl rounded-2xl bg-white p-6 sm:p-8 shadow-xl border border-slate-200 space-y-6 max-h-[90vh] overflow-y-auto"
                >
                    {{-- Modal Header --}}
                    <header class="flex items-center justify-between pb-4 border-b border-slate-100">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-raksa-primary/10 text-raksa-primary shrink-0">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-raksa-text">Edit Profil Surveyor</h3>
                                <p class="text-xs text-raksa-neutral">Perbarui data pribadi, akun, dan status akses surveyor</p>
                            </div>
                        </div>

                        <button type="button" @click="editModalOpen = false" class="p-2 rounded-xl text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </header>

                    {{-- Modal Form --}}
                    <form action="{{ route('user.index') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <x-raksa.form.form-input
                                label="Nama Lengkap *"
                                name="name"
                                value="Riyan Hidayat, S.T."
                                required
                            />

                            <x-raksa.form.form-input
                                label="Nomor HP *"
                                name="phone"
                                value="0812-3456-7890"
                                required
                            />

                            <x-raksa.form.form-input
                                label="NIP *"
                                name="nip"
                                value="19920815 201801 1 004"
                                required
                            />

                            <x-raksa.form.form-select
                                label="Bidang / Unit Kerja *"
                                name="department"
                                required
                                selected="Sekretariat - Umum"
                                :options="[
                                    'Sekretariat - Umum' => 'Sekretariat - Umum',
                                    'Diskominfo - IT' => 'Diskominfo - IT',
                                    'Monitoring & Sensus' => 'Monitoring & Sensus',
                                    'Infrastruktur Data' => 'Infrastruktur Data',
                                ]"
                            />

                            <x-raksa.form.form-input
                                label="Username *"
                                name="username"
                                value="riyan_h_surveyor"
                                required
                            />

                            <x-raksa.form.form-input
                                label="Email *"
                                name="email"
                                type="email"
                                value="riyan.hidayat@bandung.go.id"
                                required
                            />

                            <x-raksa.form.form-input
                                label="Password Baru"
                                name="password"
                                type="password"
                                hint="Kosongkan jika tidak diubah"
                            />

                            <x-raksa.form.form-input
                                label="Konfirmasi Password"
                                name="password_confirmation"
                                type="password"
                                hint="Ketik ulang password baru"
                            />
                        </div>

                        {{-- Status Akun Radio --}}
                        <div class="space-y-2 pt-2 border-t border-slate-100">
                            <label class="block text-xs font-semibold text-raksa-neutral">Status Akun *</label>
                            <div class="flex items-center gap-6">
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="status" value="1" checked class="h-4 w-4 text-raksa-primary border-slate-300 focus:ring-raksa-primary/20">
                                    <span class="text-sm font-semibold text-emerald-700">Aktif</span>
                                </label>
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="status" value="0" class="h-4 w-4 text-raksa-primary border-slate-300 focus:ring-raksa-primary/20">
                                    <span class="text-sm font-semibold text-slate-500">Nonaktif</span>
                                </label>
                            </div>
                        </div>

                        {{-- Modal Action Buttons --}}
                        <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                            <x-raksa.action.button type="button" variant="secondary" @click="editModalOpen = false">
                                Batal
                            </x-raksa.action.button>

                            <x-raksa.action.button type="submit" variant="primary">
                                <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Simpan Akun</span>
                            </x-raksa.action.button>
                        </div>
                    </form>
                </div>
            </div>

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
