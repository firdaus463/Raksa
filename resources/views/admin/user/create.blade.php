<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tambah Surveyor - RAKSA</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-raksa-background font-sans text-raksa-text antialiased" x-data="{ collapsed: false, mobileSidebarOpen: false }">
    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <x-raksa.layout.sidebar />

        {{-- Main Area --}}
        <div class="flex min-w-0 flex-1 flex-col">
            {{-- Top Navbar --}}
            <x-raksa.layout.navbar title="Tambah Surveyor" />

            {{-- Main Content --}}
            <main class="flex-1 space-y-6 p-4 sm:p-6 laptop:p-8">
                
                {{-- Breadcrumb & Page Header --}}
                <x-raksa.navigation.page-header
                    title="Tambah Surveyor"
                    description="Lengkapi data akun surveyor baru untuk memberikan akses sensus aset di sistem RAKSA."
                >
                    <x-slot:breadcrumb>
                        <x-raksa.navigation.breadcrumb :items="[
                            ['label' => 'Dashboard', 'url' => route('dashboard')],
                            ['label' => 'Kelola User', 'url' => route('user.index')],
                            ['label' => 'Tambah Surveyor'],
                        ]" />
                    </x-slot:breadcrumb>

                    <x-slot:actions>
                        <x-raksa.action.button variant="secondary" href="{{ route('user.index') }}">
                            <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            <span>Kembali</span>
                        </x-raksa.action.button>
                    </x-slot:actions>
                </x-raksa.navigation.page-header>

                {{-- Form Section --}}
                <form action="{{ route('user.index') }}" method="POST" class="grid grid-cols-1 gap-6 lg:grid-cols-12 items-start">
                    @csrf

                    {{-- Left Column: Form Cards --}}
                    <div class="space-y-6 lg:col-span-8">

                        {{-- Card 1: Informasi Pribadi & Identitas --}}
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-6 sm:p-8 shadow-xs space-y-6">
                            <header class="flex items-center gap-3 pb-4 border-b border-slate-100">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-raksa-primary/10 text-raksa-primary shrink-0">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-raksa-text">Informasi Pribadi & Identitas</h2>
                                    <p class="text-xs text-raksa-neutral">Data identitas diri dan nomor kontak resmi surveyor</p>
                                </div>
                            </header>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <x-raksa.form.form-input
                                    label="Nama Lengkap *"
                                    name="name"
                                    placeholder="Contoh: Riyan Hidayat, S.T."
                                    required
                                />

                                <x-raksa.form.form-input
                                    label="Nomor HP / WhatsApp *"
                                    name="phone"
                                    placeholder="Contoh: 0812-3456-7890"
                                    required
                                />

                                <x-raksa.form.form-input
                                    label="NIP *"
                                    name="nip"
                                    placeholder="Contoh: 19920815 201801 1 004"
                                    required
                                />

                                <x-raksa.form.form-input
                                    label="Email Resmi *"
                                    name="email"
                                    type="email"
                                    placeholder="nama@bandung.go.id"
                                    required
                                />
                            </div>
                        </article>

                        {{-- Card 2: Informasi Pekerjaan & Akses Akun --}}
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-6 sm:p-8 shadow-xs space-y-6">
                            <header class="flex items-center gap-3 pb-4 border-b border-slate-100">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-raksa-accent/10 text-raksa-accent-dark shrink-0">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-raksa-text">Informasi Pekerjaan & Kredensial</h2>
                                    <p class="text-xs text-raksa-neutral">Penempatan unit kerja dan kata sandi login sistem</p>
                                </div>
                            </header>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <x-raksa.form.form-select
                                    label="Bidang / Unit Kerja *"
                                    name="department"
                                    required
                                    placeholder="Pilih Bidang / Unit Kerja"
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
                                    placeholder="Contoh: riyan_h_surveyor"
                                    required
                                />

                                <x-raksa.form.form-input
                                    label="Password *"
                                    name="password"
                                    type="password"
                                    placeholder="Masukkan password baru"
                                    required
                                />

                                <x-raksa.form.form-input
                                    label="Konfirmasi Password *"
                                    name="password_confirmation"
                                    type="password"
                                    placeholder="Ketik ulang password"
                                    required
                                />
                            </div>

                            {{-- Status Radio --}}
                            <div class="space-y-2 pt-4 border-t border-slate-100">
                                <label class="block text-xs font-semibold text-raksa-neutral">Status Akun *</label>
                                <div class="flex items-center gap-6">
                                    <label class="inline-flex items-center gap-2 cursor-pointer">
                                        <input type="radio" name="status" value="1" checked class="h-4 w-4 text-raksa-primary border-slate-300 focus:ring-raksa-primary/20">
                                        <span class="text-sm font-semibold text-emerald-700">Aktif (Akses Lapangan)</span>
                                    </label>
                                    <label class="inline-flex items-center gap-2 cursor-pointer">
                                        <input type="radio" name="status" value="0" class="h-4 w-4 text-raksa-primary border-slate-300 focus:ring-raksa-primary/20">
                                        <span class="text-sm font-semibold text-slate-500">Nonaktif</span>
                                    </label>
                                </div>
                            </div>
                        </article>

                        {{-- Form Action Buttons at the Bottom of Main Column --}}
                        <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs flex flex-col sm:flex-row items-center justify-end gap-3">
                            <x-raksa.action.button variant="secondary" href="{{ route('user.index') }}" class="w-full sm:w-auto text-xs px-6">
                                <span>Batal</span>
                            </x-raksa.action.button>

                            <x-raksa.action.button type="submit" variant="primary" class="w-full sm:w-auto text-xs px-8 !py-3 font-bold shadow-md">
                                <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Simpan Akun Surveyor</span>
                            </x-raksa.action.button>
                        </div>

                    </div>

                    {{-- Right Column: Information & Support Panel Only --}}
                    <div class="space-y-6 lg:col-span-4">
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs space-y-4">
                            <div class="flex items-center gap-3.5 rounded-xl border border-raksa-primary/20 bg-raksa-primary/5 p-4">
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-raksa-primary text-white">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"/>
                                        <path d="M12 16v-4M12 8h.01" stroke-linecap="round"/>
                                    </svg>
                                </div>
                                <p class="text-xs text-raksa-primary-hover leading-relaxed">
                                    Akun baru yang dibuat akan langsung mendapatkan peran <strong class="font-bold">Surveyor Lapangan</strong> untuk melakukan sensus aset dan pengajuan verifikasi.
                                </p>
                            </div>
                        </article>
                    </div>

                </form>
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
