<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tambah Aset - RAKSA</title>

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
                    title="Tambah Aset"
                    description="Tambahkan aset baru berdasarkan data pengadaan yang telah terdaftar."
                >
                    <x-slot:breadcrumb>
                        <x-raksa.navigation.breadcrumb :items="[
                            ['label' => 'Dashboard', 'url' => route('dashboard')],
                            ['label' => 'Pengadaan', 'url' => route('pengadaan.index')],
                            ['label' => 'Data Aset', 'url' => route('aset.index')],
                            ['label' => 'Tambah Aset'],
                        ]" />
                    </x-slot:breadcrumb>
                </x-raksa.navigation.page-header>

                {{-- Notice Banner --}}
                <div class="flex items-start gap-3.5 rounded-xl border-l-4 border-raksa-primary bg-raksa-primary/10 p-4 sm:p-5 shadow-xs">
                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-raksa-primary text-white">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M12 16v-4M12 8h.01" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <p class="text-xs sm:text-sm text-raksa-primary-hover leading-relaxed">
                        Aset yang disimpan akan otomatis terhubung dengan data Pengadaan yang dipilih.
                        <strong class="font-bold">QR Code</strong> dan <strong class="font-bold">Pakta Integritas</strong> dapat dibuat setelah aset berhasil disimpan.
                    </p>
                </div>

                {{-- Form Section --}}
                <form action="{{ route('aset.index') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    {{-- Card 1: Informasi Pengadaan --}}
                    <article class="rounded-2xl border border-raksa-border/20 bg-white p-6 sm:p-8 shadow-sm space-y-6">
                        <header class="flex items-center gap-3 pb-4 border-b border-raksa-border/20">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-raksa-primary/10 text-raksa-primary shrink-0">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-raksa-text">Informasi Pengadaan</h2>
                                <p class="text-xs text-raksa-neutral">Pilih dokumen pengadaan sumber aset ini</p>
                            </div>
                        </header>

                        <div class="space-y-2">
                            <x-raksa.form.form-select
                                label="Pengadaan *"
                                name="procurement_id"
                                required
                                :options="[
                                    '1' => 'SPK/DISKOMINFO/2024/001 - PT. Indonesia Bangun Semesta (21 Januari 2026)',
                                    '2' => 'SPK/DISKOMINFO/2024/002 - PT. Teknologi Nusantara (18 Februari 2026)',
                                ]"
                            />
                            <p class="text-xs italic text-raksa-neutral">
                                Data pengadaan memuat Nomor SPK, Nama Rekanan, dan Tanggal Kontrak.
                            </p>
                        </div>
                    </article>

                    {{-- Card 2: Informasi Aset --}}
                    <article class="rounded-2xl border border-raksa-border/20 bg-white p-6 sm:p-8 shadow-sm space-y-6">
                        <header class="flex items-center gap-3 pb-4 border-b border-raksa-border/20">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-raksa-accent/10 text-raksa-accent-dark shrink-0">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-raksa-text">Informasi Aset</h2>
                                <p class="text-xs text-raksa-neutral">Rincian spesifikasi dan penanggung jawab barang</p>
                            </div>
                        </header>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Left Column --}}
                            <div class="space-y-4">
                                <x-raksa.form.form-input
                                    label="Tanggal Pembelian *"
                                    name="purchase_date"
                                    type="text"
                                    value="28/01/2026"
                                    required
                                />

                                <x-raksa.form.form-select
                                    label="Kategori Barang *"
                                    name="category"
                                    required
                                    selected="Elektronik"
                                    :options="[
                                        'Elektronik' => 'Elektronik',
                                        'Meubelair' => 'Meubelair',
                                        'Kendaraan' => 'Kendaraan',
                                        'Peralatan Kantor' => 'Peralatan Kantor',
                                    ]"
                                />

                                <x-raksa.form.form-input
                                    label="Merk"
                                    name="brand"
                                    type="text"
                                    value="MacBook"
                                />

                                <x-raksa.form.form-input
                                    label="Type"
                                    name="type"
                                    type="text"
                                    value='Pro M2 14"'
                                />

                                <x-raksa.form.form-input
                                    label="Ukuran"
                                    name="size"
                                    type="text"
                                    placeholder="Contoh: 150cc, 14 Inch, L"
                                />
                            </div>

                            {{-- Right Column --}}
                            <div class="space-y-4">
                                <div>
                                    <label for="value" class="mb-1.5 block text-xs font-semibold text-raksa-neutral">
                                        Nilai (IDR) *
                                    </label>
                                    <div class="relative rounded-lg shadow-2xs">
                                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-sm font-bold text-raksa-neutral">
                                            Rp
                                        </div>
                                        <input
                                            type="text"
                                            name="value"
                                            id="value"
                                            value="0"
                                            required
                                            class="block w-full rounded-lg border border-raksa-border py-3 pl-10 pr-3.5 text-sm text-raksa-text transition focus:border-raksa-primary focus:ring-1 focus:ring-raksa-primary"
                                        />
                                    </div>
                                </div>

                                <x-raksa.form.form-input
                                    label="Serial Number / No. Rangka"
                                    name="serial_number"
                                    type="text"
                                    value="SN-BMD-2026-XYZ-001"
                                />

                                <x-raksa.form.form-input
                                    label="Bahan"
                                    name="material"
                                    type="text"
                                    value="Aluminium"
                                />

                                <x-raksa.form.form-input
                                    label="Pemegang Barang *"
                                    name="holder"
                                    type="text"
                                    value="Hendra Kurniawan, S.T."
                                    required
                                />

                                {{-- Lampiran Dokumen & Foto --}}
                                <div class="space-y-2 pt-2">
                                    <label class="block text-xs font-semibold text-raksa-neutral">
                                        Dokumen & Lampiran Aset
                                    </label>
                                    <x-raksa.form.file-upload
                                        name="attachments"
                                        label="Upload BAST & Foto Pemegang"
                                        maxSize="10MB"
                                    />
                                </div>
                            </div>
                        </div>

                        {{-- Full Width Form Inputs --}}
                        <div class="space-y-4 pt-4 border-t border-raksa-border/20">
                            <x-raksa.form.form-select
                                label="Kondisi Barang *"
                                name="condition"
                                required
                                selected="Sangat Baik"
                                :options="[
                                    'Sangat Baik' => 'Sangat Baik',
                                    'Baik' => 'Baik',
                                    'Rusak Ringan' => 'Rusak Ringan',
                                    'Rusak Berat' => 'Rusak Berat',
                                ]"
                            />

                            <x-raksa.form.textarea
                                label="Keterangan"
                                name="description"
                                rows="3"
                                value="Belanja Modal Alat Komunikasi untuk kebutuhan operasional Sekretariat."
                            />
                        </div>
                    </article>

                    {{-- Form Footer Actions --}}
                    <div class="flex items-center justify-end gap-4 pb-8">
                        <x-raksa.action.button variant="secondary" href="{{ route('aset.index') }}">
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

            </main>
        </div>
    </div>
</body>
</html>
