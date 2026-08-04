<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Scan QR Code Sensus - RAKSA</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-raksa-background font-sans text-raksa-text antialiased" x-data="{ collapsed: false, mobileSidebarOpen: false }">
    @php
        // Data dummy aset terdeteksi dari SurveyorSensusSeeder
        $sensusData = \Database\Seeders\Surveyor\SurveyorSensusSeeder::getData()['sensus_list'][0];
    @endphp

    <div class="flex min-h-screen">
        {{-- Sidebar Surveyor --}}
        <x-raksa.layout.sidebar />

        {{-- Main Area --}}
        <div class="flex min-w-0 flex-1 flex-col">
            {{-- Top Navbar --}}
            <x-raksa.layout.navbar title="Pindai QR Code Sensus" />

            {{-- Main Content --}}
            <main class="flex-1 space-y-6 p-4 sm:p-6 laptop:p-8" x-data="{
                scanSuccess: true,
                selectedCamera: 'environment',
                scanTime: '14:02 WIB',
                isVerified: false,
                handleRescan() {
                    const now = new Date();
                    const hours = String(now.getHours()).padStart(2, '0');
                    const minutes = String(now.getMinutes()).padStart(2, '0');
                    this.scanTime = `${hours}:${minutes} WIB`;
                    this.scanSuccess = true;
                }
            }">

                {{-- Breadcrumb & Page Header --}}
                <x-raksa.navigation.page-header
                    title="Scan QR Code Aset"
                    description="Pindai QR Code yang terpasang pada stiker fisik aset BMD untuk memulai proses pendataan sensus secara cepat dan akurat."
                >
                    <x-slot:breadcrumb>
                        <x-raksa.navigation.breadcrumb :items="[
                            ['label' => 'Dashboard', 'url' => route('surveyor.dashboard')],
                            ['label' => 'Sensus Lapangan', 'url' => route('surveyor.sensus.index')],
                            ['label' => 'Scan QR Code'],
                        ]" />
                    </x-slot:breadcrumb>
                </x-raksa.navigation.page-header>

                {{-- Grid Pemindai QR & Tips / Target --}}
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

                    {{-- Pemindai Kamera QR Code (Kiri - 8 cols) --}}
                    <div class="lg:col-span-8 space-y-6">
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-6 sm:p-8 shadow-xs space-y-6 relative overflow-hidden">
                            {{-- Ambient Radial Backdrop Pattern --}}
                            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(0,72,174,0.04)_0%,transparent_70%)] pointer-events-none" aria-hidden="true"></div>

                            {{-- Scanner Instructional Badge --}}
                            <div class="flex justify-center">
                                <div class="inline-flex items-center gap-2 rounded-full bg-raksa-primary/10 border border-raksa-primary/20 px-4 py-2 text-xs font-semibold text-raksa-primary">
                                    <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    <span>Arahkan kamera ke stiker QR Code yang terpasang pada aset fisik.</span>
                                </div>
                            </div>

                            {{-- Camera Viewfinder Box --}}
                            <div class="flex flex-col items-center justify-center p-8 sm:p-12 rounded-2xl bg-slate-900 border border-slate-800 relative space-y-4 shadow-inner">
                                {{-- QR Scanner Grid Frame --}}
                                <div class="relative h-64 w-64 sm:h-72 sm:w-72 rounded-2xl border-2 border-dashed border-raksa-primary/60 p-4 flex items-center justify-center bg-slate-950/60 overflow-hidden">
                                    {{-- Laser Scanning Line Animation --}}
                                    <div class="absolute inset-x-0 h-1 bg-raksa-primary shadow-[0_0_12px_#0048ae] animate-pulse top-1/2"></div>
                                    
                                    {{-- QR Code Icon Placeholder --}}
                                    <div class="h-44 w-44 rounded-xl bg-white p-3 shadow-md border border-slate-200 flex items-center justify-center">
                                        <svg class="h-full w-full text-slate-800" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                                        </svg>
                                    </div>
                                </div>

                                <p class="text-xs text-slate-300 font-medium">Status Pemindai: <span class="text-emerald-400 font-bold">Kamera Aktif & Ready</span></p>
                            </div>

                            {{-- Camera Selector Controls --}}
                            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                                <button
                                    type="button"
                                    @click="selectedCamera = 'environment'"
                                    :class="selectedCamera === 'environment' ? 'bg-raksa-primary text-white shadow-md' : 'bg-slate-100 text-raksa-neutral hover:bg-slate-200'"
                                    class="flex items-center justify-center gap-2 rounded-xl px-5 py-3 text-xs font-bold transition w-full sm:w-auto"
                                >
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span>Kamera Belakang (Utama)</span>
                                </button>

                                <button
                                    type="button"
                                    @click="selectedCamera = 'user'"
                                    :class="selectedCamera === 'user' ? 'bg-raksa-primary text-white shadow-md' : 'bg-slate-100 text-raksa-neutral hover:bg-slate-200'"
                                    class="flex items-center justify-center gap-2 rounded-xl px-5 py-3 text-xs font-bold transition w-full sm:w-auto"
                                >
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    <span>Kamera Depan</span>
                                </button>
                            </div>
                        </article>
                    </div>

                    {{-- Side Panel: Tips Scanning & Target Harian (Kanan - 4 cols) --}}
                    <div class="lg:col-span-4 space-y-6">

                        {{-- Card Tips Scanning --}}
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs space-y-5">
                            <div class="flex items-center gap-2.5 pb-3 border-b border-slate-100">
                                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-raksa-primary/10 text-raksa-primary shrink-0">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <h2 class="text-base font-bold text-raksa-text">Tips Scanning</h2>
                            </div>

                            <ul class="space-y-4">
                                {{-- Tip 1 --}}
                                <li class="flex items-start gap-3">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-700">
                                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-xs font-bold text-raksa-text">QR Terlihat Jelas</h3>
                                        <p class="text-[11px] text-raksa-neutral leading-relaxed">Pastikan kode tidak tertutup kotoran, debu, atau stiker lain.</p>
                                    </div>
                                </li>

                                {{-- Tip 2 --}}
                                <li class="flex items-start gap-3">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-amber-100 text-amber-800">
                                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-xs font-bold text-raksa-text">Hindari Pantulan</h3>
                                        <p class="text-[11px] text-raksa-neutral leading-relaxed">Cari sudut pengambilan yang tidak memantulkan cahaya lampu.</p>
                                    </div>
                                </li>

                                {{-- Tip 3 --}}
                                <li class="flex items-start gap-3">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-slate-700">
                                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-xs font-bold text-raksa-text">Dekatkan Kamera</h3>
                                        <p class="text-[11px] text-raksa-neutral leading-relaxed">Berikan jarak ideal sekitar 10-15 cm dari permukaan aset.</p>
                                    </div>
                                </li>

                                {{-- Tip 4 --}}
                                <li class="flex items-start gap-3">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-rose-100 text-rose-700">
                                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-xs font-bold text-raksa-text">QR Tidak Rusak</h3>
                                        <p class="text-[11px] text-raksa-neutral leading-relaxed">Laporkan ke Admin jika stiker QR sobek atau tidak terbaca.</p>
                                    </div>
                                </li>
                            </ul>
                        </article>

                        {{-- Card Target Hari Ini --}}
                        <article class="rounded-2xl border border-raksa-primary/20 bg-raksa-primary p-6 shadow-md text-white space-y-4 relative overflow-hidden">
                            <div class="space-y-1">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-blue-200">TARGET HARI INI</span>
                                <div class="flex items-baseline gap-2">
                                    <span class="text-4xl font-extrabold">24</span>
                                    <span class="text-sm font-medium text-blue-100">/ 50 Aset</span>
                                </div>
                            </div>

                            <div class="space-y-1.5">
                                <div class="h-2.5 w-full rounded-full bg-white/20 overflow-hidden">
                                    <div class="h-full rounded-full bg-white transition-all duration-500" style="width: 48%;"></div>
                                </div>
                                <p class="text-xs text-blue-100/90 leading-relaxed">
                                    Ayo selesaikan sisa 26 aset lagi untuk mencapai target harian Anda. Semangat Petugas!
                                </p>
                            </div>
                        </article>

                    </div>

                </div>

                {{-- Hasil Deteksi Scan Berhasil (Asset Scan Success Section - Matched to Figma Reference) --}}
                <div x-show="scanSuccess" x-transition.duration.300ms class="space-y-6 pt-4">

                    {{-- Top Success Header Banner --}}
                    <div class="rounded-2xl border border-emerald-100 bg-emerald-50/70 p-8 text-center space-y-3">
                        <div class="inline-flex h-14 w-14 items-center justify-center rounded-full bg-emerald-100 text-emerald-600 ring-8 ring-emerald-50 shrink-0 mx-auto">
                            <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>

                        <div class="space-y-1">
                            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">QR Code Berhasil Dipindai</h2>
                            <p class="text-sm text-slate-600">Data aset ditemukan dan telah divalidasi oleh sistem RAKSA.</p>
                        </div>
                    </div>

                    {{-- Card Utama Rincian Aset --}}
                    <article class="rounded-2xl border border-slate-200/80 bg-white p-6 sm:p-8 shadow-xs space-y-8">
                        {{-- Top Grid: Info Barang (Left 8) + Status & Kondisi (Right 4) --}}
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                            
                            {{-- Info Barang Left (8 cols) --}}
                            <div class="lg:col-span-8 space-y-6">
                                <div class="flex flex-col sm:flex-row items-start gap-6">
                                    {{-- Thumbnail --}}
                                    <div class="h-28 w-28 sm:h-32 sm:w-32 rounded-2xl bg-slate-100 border border-slate-200/80 p-2 shrink-0 flex items-center justify-center overflow-hidden">
                                        <svg class="h-14 w-14 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>

                                    <div class="space-y-2 flex-1 w-full">
                                        <div class="flex items-center justify-between gap-2">
                                            <span class="text-xs font-bold font-mono text-raksa-primary tracking-wider">
                                                {{ $sensusData['kode_sensus'] }}
                                            </span>
                                            <span class="text-xs text-slate-500 font-medium">Dipindai: <span x-text="scanTime"></span></span>
                                        </div>

                                        <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900 leading-tight">{{ $sensusData['nama_aset'] }}</h3>
                                        <p class="text-xs text-slate-500 font-medium">Kode Aset: <span class="font-mono font-semibold text-slate-700">{{ $sensusData['kode_aset'] }}</span></p>
                                    </div>
                                </div>

                                {{-- Kategori Divider Section --}}
                                <div class="pt-4 border-t border-slate-100 space-y-1">
                                    <span class="text-xs text-slate-400 font-medium">Kategori</span>
                                    <div class="flex items-center gap-2 text-slate-900 font-bold text-sm sm:text-base">
                                        <svg class="h-4 w-4 text-raksa-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                        <span>Laptop</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Status & Kondisi Right Box (4 cols) --}}
                            <div class="lg:col-span-4 space-y-4">
                                {{-- Card Box Status & Kondisi --}}
                                <div class="rounded-2xl bg-slate-100/80 border border-slate-200/60 p-5 space-y-4">
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500">STATUS &amp; KONDISI</span>
                                    
                                    <div class="space-y-3">
                                        <div>
                                            <span class="block text-xs text-slate-500 font-medium mb-1">Status Aset</span>
                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-3 py-1 text-xs font-bold text-emerald-800">
                                                <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                                                <span>Aktif</span>
                                            </span>
                                        </div>

                                        <div>
                                            <span class="block text-xs text-slate-500 font-medium mb-1">Kondisi</span>
                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-100 px-3 py-1 text-xs font-bold text-blue-800">
                                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                                </svg>
                                                <span>Baik</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                {{-- Card Blue Terakhir Sensus --}}
                                <div class="rounded-2xl bg-raksa-primary p-5 text-white flex items-center gap-4 shadow-sm">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white/10">
                                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block text-[10px] font-bold uppercase tracking-wider text-blue-200">TERAKHIR SENSUS</span>
                                        <span class="text-base font-bold">12 Des 2024</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- Middle Section: Pemegang Barang --}}
                        <div class="pt-6 border-t border-slate-100 space-y-6">
                            <div class="flex items-center gap-2 pb-2 border-b border-slate-100">
                                <svg class="h-5 w-5 text-raksa-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <h4 class="text-base font-bold text-slate-900">Pemegang Barang</h4>
                            </div>

                            <div class="flex flex-col sm:flex-row items-start gap-6">
                                {{-- Avatar Pemegang --}}
                                <div class="h-16 w-16 rounded-full bg-raksa-primary/10 border-2 border-raksa-primary text-raksa-primary font-bold text-xl flex items-center justify-center shrink-0 shadow-sm">
                                    HK
                                </div>

                                {{-- Data Pemegang (2 Columns Grid) --}}
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-4 flex-1 text-xs sm:text-sm">
                                    <div>
                                        <span class="block text-xs text-slate-500 font-medium">Nama Pemegang Barang</span>
                                        <span class="font-bold text-slate-900 mt-0.5 block">Hendra Kurniawan, S.T.</span>
                                    </div>

                                    <div>
                                        <span class="block text-xs text-slate-500 font-medium">NIP</span>
                                        <span class="font-mono font-semibold text-slate-900 mt-0.5 block">198705222015031002</span>
                                    </div>

                                    <div>
                                        <span class="block text-xs text-slate-500 font-medium">Jabatan</span>
                                        <span class="font-semibold text-slate-900 mt-0.5 block">Administrator</span>
                                    </div>

                                    <div>
                                        <span class="block text-xs text-slate-500 font-medium">Bidang / Unit Kerja</span>
                                        <span class="font-semibold text-slate-900 mt-0.5 block">Diskominfo Kota Bandung</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Action Buttons (Verifikasi Sekarang & Scan Ulang) --}}
                        <div class="pt-6 flex flex-col sm:flex-row items-center justify-center gap-4">
                            <x-raksa.action.button variant="primary" href="{{ route('surveyor.sensus.create') }}" class="w-full sm:w-auto px-8 !py-3.5 text-xs sm:text-sm font-bold shadow-md">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                                <span>Verifikasi Sekarang</span>
                            </x-raksa.action.button>

                            <x-raksa.action.button variant="secondary" type="button" @click="handleRescan()" class="w-full sm:w-auto px-8 !py-3.5 text-xs sm:text-sm">
                                <svg class="h-4 w-4 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                                <span>Scan Ulang</span>
                            </x-raksa.action.button>
                        </div>
                    </article>

                    {{-- Bottom Verification Alert Notice --}}
                    <div class="rounded-2xl border border-blue-200/80 bg-blue-50/70 p-4 text-blue-900 flex items-center gap-3 text-xs sm:text-sm font-medium">
                        <div class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-blue-100 text-blue-600">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <p>Pastikan kondisi fisik barang sesuai dengan data sistem sebelum menekan <strong>Verifikasi Sekarang / Lanjutkan Sensus</strong>.</p>
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
