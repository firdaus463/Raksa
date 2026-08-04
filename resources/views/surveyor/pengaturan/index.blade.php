<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pengaturan Akun Surveyor - RAKSA</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-raksa-background font-sans text-raksa-text antialiased" x-data="{ collapsed: false, mobileSidebarOpen: false, infoModalOpen: false, passwordModalOpen: false }">
    @php
        // Ambil data dummy profil dari SurveyorPengaturanSeeder
        $profil = \Database\Seeders\Surveyor\SurveyorPengaturanSeeder::getData()['profil_surveyor'];
    @endphp

    <div class="flex min-h-screen">
        {{-- Sidebar Surveyor --}}
        <x-raksa.layout.sidebar />

        {{-- Main Area --}}
        <div class="flex min-w-0 flex-1 flex-col">
            {{-- Top Navbar --}}
            <x-raksa.layout.navbar title="Pengaturan Akun" />

            {{-- Main Content --}}
            <main class="flex-1 space-y-6 p-4 sm:p-6 laptop:p-8 w-full">
                
                {{-- Breadcrumb & Page Header --}}
                <x-raksa.navigation.page-header
                    title="Pengaturan Akun & Preferensi"
                    description="Kelola informasi pribadi surveyor, nomor kontak, kata sandi, serta preferensi aplikasi RAKSA e-BMD."
                >
                    <x-slot:breadcrumb>
                        <x-raksa.navigation.breadcrumb :items="[
                            ['label' => 'Dashboard', 'url' => route('surveyor.dashboard')],
                            ['label' => 'Pengaturan Akun'],
                        ]" />
                    </x-slot:breadcrumb>
                </x-raksa.navigation.page-header>

                {{-- Card 1: Informasi Akun Surveyor --}}
                <article class="rounded-2xl border border-slate-200/80 bg-white p-6 sm:p-8 shadow-xs space-y-6 w-full">
                    <header class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-4 border-b border-slate-100">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-raksa-primary/10 text-raksa-primary shrink-0">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-raksa-text">Informasi Akun Surveyor</h2>
                                <p class="text-xs text-raksa-neutral">Identitas personel dan wilayah penugasan sensus</p>
                            </div>
                        </div>

                        <x-raksa.action.button variant="secondary" type="button" @click="infoModalOpen = true" class="!py-2 !px-4 text-xs shrink-0">
                            <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            <span>Edit Profil</span>
                        </x-raksa.action.button>
                    </header>

                    <dl class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="space-y-1">
                            <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">NAMA LENGKAP</dt>
                            <dd class="text-base font-bold text-raksa-text">{{ $profil['nama'] }}</dd>
                        </div>

                        <div class="space-y-1">
                            <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">NIP</dt>
                            <dd class="text-base font-mono font-bold text-raksa-primary">{{ $profil['nip'] }}</dd>
                        </div>

                        <div class="space-y-1">
                            <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">EMAIL RESMI</dt>
                            <dd class="text-sm font-semibold text-raksa-text">{{ $profil['email'] }}</dd>
                        </div>

                        <div class="space-y-1">
                            <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">PERAN / ROLE</dt>
                            <dd class="text-sm font-semibold text-raksa-text">{{ $profil['role'] }}</dd>
                        </div>

                        <div class="space-y-1">
                            <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">BIDANG / UNIT KERJA</dt>
                            <dd class="text-sm font-semibold text-raksa-text">{{ $profil['bidang'] }}</dd>
                        </div>

                        <div class="space-y-1">
                            <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">WILAYAH TUGAS</dt>
                            <dd class="text-sm font-semibold text-raksa-text">{{ $profil['wilayah_tugas'] }}</dd>
                        </div>
                    </dl>
                </article>

                {{-- Card 2: Keamanan Akun --}}
                <article class="rounded-2xl border border-slate-200/80 bg-white p-6 sm:p-8 shadow-xs space-y-6 w-full">
                    <header class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-4 border-b border-slate-100">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-raksa-accent/10 text-raksa-accent-dark shrink-0">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-raksa-text">Keamanan Akun</h2>
                                <p class="text-xs text-raksa-neutral">Kata sandi dan keamanan login sistem</p>
                            </div>
                        </div>

                        <x-raksa.action.button variant="secondary" type="button" @click="passwordModalOpen = true" class="!py-2 !px-4 text-xs shrink-0">
                            <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                            </svg>
                            <span>Ubah Password</span>
                        </x-raksa.action.button>
                    </header>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="space-y-1">
                            <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">KATA SANDI / PASSWORD</dt>
                            <dd class="text-base font-mono font-bold text-raksa-text tracking-widest">••••••••••••</dd>
                        </div>

                        <div class="space-y-1 lg:col-span-2">
                            <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">REKOMENDASI KEAMANAN</dt>
                            <dd class="text-xs text-raksa-neutral leading-relaxed">
                                Selalu perbarui kata sandi secara berkala untuk menjaga kerahasiaan data pendataan sensus fisik aset BMD Kota Bandung.
                            </dd>
                        </div>
                    </div>
                </article>

                {{-- Card 3: Informasi & Preferensi Sistem --}}
                <article class="rounded-2xl border border-slate-200/80 bg-white p-6 sm:p-8 shadow-xs space-y-6 w-full">
                    <header class="flex items-center gap-3 pb-4 border-b border-slate-100">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-sky-100 text-sky-700 shrink-0">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-raksa-text">Informasi Sistem & Preferensi</h2>
                            <p class="text-xs text-raksa-neutral">Detail rilis aplikasi dan preferensi aplikasi</p>
                        </div>
                    </header>

                    <dl class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="space-y-1">
                            <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">NAMA SISTEM</dt>
                            <dd class="text-sm font-bold text-raksa-text">RAKSA (Aplikasi Sensus BMD)</dd>
                        </div>

                        <div class="space-y-1">
                            <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">VERSI APLIKASI</dt>
                            <dd class="text-sm font-mono font-bold text-raksa-primary">v1.0.0 (Production)</dd>
                        </div>

                        <div class="space-y-1">
                            <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">MODE SINKRONISASI</dt>
                            <dd class="text-sm font-semibold text-emerald-700">Auto-Sync Wi-Fi (Aktif)</dd>
                        </div>

                        <div class="space-y-1">
                            <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">TAGGING GEOLOKASI</dt>
                            <dd class="text-sm font-semibold text-emerald-700">GPS Tagging (Aktif)</dd>
                        </div>
                    </dl>
                </article>

                {{-- Card 4: Bantuan & Dukungan --}}
                <article class="rounded-2xl border border-slate-200/80 bg-white p-6 sm:p-8 shadow-xs space-y-6 w-full">
                    <header class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-4 border-b border-slate-100">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-purple-100 text-purple-700 shrink-0">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-raksa-text">Bantuan & Dukungan Sensus</h2>
                                <p class="text-xs text-raksa-neutral">Layanan bantuan kendala aplikasi & stiker QR Code</p>
                            </div>
                        </div>

                        <x-raksa.action.button variant="secondary" href="mailto:support.diskominfo@bandung.go.id" class="!py-2 !px-4 text-xs shrink-0">
                            <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>Hubungi Admin BMD</span>
                        </x-raksa.action.button>
                    </header>

                    <p class="text-xs sm:text-sm text-raksa-neutral leading-relaxed">
                        Jika terdapat kendala pemindaian label QR Code, stiker rusak, atau keraguan kondisi barang saat sensus di lapangan, hubungi Helpdesk BMD Diskominfo Kota Bandung.
                    </p>
                </article>

                {{-- Card 5: Keluar dari Sesi (Logout) --}}
                <article class="rounded-2xl border border-rose-200 bg-rose-50/50 p-6 sm:p-8 shadow-xs space-y-4 w-full">
                    <div class="flex items-center gap-3 pb-3 border-b border-rose-100">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-rose-100 text-rose-700 shrink-0">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-rose-900">Keluar dari Sesi</h2>
                            <p class="text-xs text-rose-700">Mengakhiri sesi akses akun surveyor Anda</p>
                        </div>
                    </div>

                    <p class="text-xs sm:text-sm text-rose-800 leading-relaxed">
                        Mengakhiri sesi pengguna Anda saat ini. Pastikan seluruh draft sensus fisik telah terkirim sebelum keluar dari aplikasi.
                    </p>

                    <div class="pt-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-raksa.action.button variant="danger" type="submit">
                                <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                <span>Keluar Akun (Logout)</span>
                            </x-raksa.action.button>
                        </form>
                    </div>
                </article>

            </main>

            {{-- Modal 1: Edit Profil Surveyor --}}
            <div
                x-show="infoModalOpen"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/50 backdrop-blur-xs overflow-y-auto"
                style="display: none;"
                @keydown.escape.window="infoModalOpen = false"
            >
                <div
                    @click.away="infoModalOpen = false"
                    class="relative w-full max-w-lg rounded-2xl bg-white p-6 sm:p-8 shadow-xl border border-slate-200 space-y-6 max-h-[90vh] overflow-y-auto"
                >
                    <header class="flex items-center justify-between pb-4 border-b border-slate-100">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-raksa-primary/10 text-raksa-primary shrink-0">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-raksa-text">Edit Profil Surveyor</h3>
                                <p class="text-xs text-raksa-neutral">Perbarui nama lengkap, nomor WhatsApp, dan email</p>
                            </div>
                        </div>

                        <button type="button" @click="infoModalOpen = false" class="p-2 rounded-xl text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </header>

                    <form action="{{ route('surveyor.pengaturan.index') }}" method="GET" class="space-y-4">
                        <x-raksa.form.form-input
                            label="Nama Lengkap *"
                            name="name"
                            value="{{ $profil['nama'] }}"
                            required
                        />

                        <x-raksa.form.form-input
                            label="NIP *"
                            name="nip"
                            value="{{ $profil['nip'] }}"
                            required
                        />

                        <x-raksa.form.form-input
                            label="Email Resmi *"
                            name="email"
                            type="email"
                            value="{{ $profil['email'] }}"
                            required
                        />

                        <x-raksa.form.form-input
                            label="Nomor Telepon / WhatsApp *"
                            name="phone"
                            value="{{ $profil['telepon'] }}"
                            required
                        />

                        <x-raksa.form.form-input
                            label="Wilayah Tugas *"
                            name="wilayah_tugas"
                            value="{{ $profil['wilayah_tugas'] }}"
                            required
                        />

                        <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                            <x-raksa.action.button type="button" variant="secondary" @click="infoModalOpen = false">
                                Batal
                            </x-raksa.action.button>

                            <x-raksa.action.button type="submit" variant="primary">
                                <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Simpan Perubahan</span>
                            </x-raksa.action.button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Modal 2: Ubah Password Surveyor --}}
            <div
                x-show="passwordModalOpen"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/50 backdrop-blur-xs overflow-y-auto"
                style="display: none;"
                @keydown.escape.window="passwordModalOpen = false"
            >
                <div
                    @click.away="passwordModalOpen = false"
                    class="relative w-full max-w-lg rounded-2xl bg-white p-6 sm:p-8 shadow-xl border border-slate-200 space-y-6 max-h-[90vh] overflow-y-auto"
                >
                    <header class="flex items-center justify-between pb-4 border-b border-slate-100">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-raksa-accent/10 text-raksa-accent-dark shrink-0">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-raksa-text">Ubah Password</h3>
                                <p class="text-xs text-raksa-neutral">Perbarui kata sandi login untuk keamanan akun Anda</p>
                            </div>
                        </div>

                        <button type="button" @click="passwordModalOpen = false" class="p-2 rounded-xl text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </header>

                    <form action="{{ route('surveyor.pengaturan.index') }}" method="GET" class="space-y-4">
                        <x-raksa.form.form-input
                            label="Password Saat Ini *"
                            name="current_password"
                            type="password"
                            placeholder="Masukkan password saat ini"
                            required
                        />

                        <x-raksa.form.form-input
                            label="Password Baru *"
                            name="new_password"
                            type="password"
                            placeholder="Masukkan password baru (min. 8 karakter)"
                            required
                        />

                        <x-raksa.form.form-input
                            label="Konfirmasi Password Baru *"
                            name="new_password_confirmation"
                            type="password"
                            placeholder="Ketik ulang password baru"
                            required
                        />

                        <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                            <x-raksa.action.button type="button" variant="secondary" @click="passwordModalOpen = false">
                                Batal
                            </x-raksa.action.button>

                            <x-raksa.action.button type="submit" variant="primary">
                                <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Simpan Password</span>
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
