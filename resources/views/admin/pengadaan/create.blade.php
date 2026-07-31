<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tambah Pengadaan - RAKSA</title>

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
                    title="Tambah Pengadaan"
                    description="Masukkan informasi administrasi pengadaan sebagai dasar pencatatan aset daerah."
                >
                    <x-slot:breadcrumb>
                        <x-raksa.navigation.breadcrumb :items="[
                            ['label' => 'Dashboard', 'url' => route('dashboard')],
                            ['label' => 'Pengadaan', 'url' => route('pengadaan.index')],
                            ['label' => 'Tambah Pengadaan'],
                        ]" />
                    </x-slot:breadcrumb>
                </x-raksa.navigation.page-header>

                {{-- Info Banner --}}
                <div class="flex items-center gap-3 rounded-2xl bg-raksa-primary px-5 py-4 shadow-sm">
                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-white/15">
                        <svg class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 16v-4M12 8h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <p class="text-sm text-raksa-primary-light leading-relaxed">
                        Setelah data pengadaan berhasil disimpan, Admin dapat menambahkan aset/barang yang berasal dari pengadaan ini.
                    </p>
                </div>

                {{-- Form --}}
                <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    {{-- Row 1: Informasi SPK + Administrasi Dokumen --}}
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                        {{-- Section: Informasi SPK --}}
                        <x-raksa.card.form-card title="Informasi SPK">
                            <x-slot:icon>
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z" stroke="currentColor" stroke-width="2"/><polyline points="14 2 14 8 20 8" stroke="currentColor" stroke-width="2"/><line x1="16" y1="13" x2="8" y2="13" stroke="currentColor" stroke-width="2"/><line x1="16" y1="17" x2="8" y2="17" stroke="currentColor" stroke-width="2"/></svg>
                            </x-slot:icon>

                            <div class="space-y-4">
                                <x-raksa.form.form-input
                                    label="Nomor SPK"
                                    name="nomor_spk"
                                    :required="true"
                                    placeholder="SPK/DISKOMINFO/2024/001"
                                />

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <x-raksa.form.form-input
                                        label="Tanggal SPK"
                                        name="tanggal_spk"
                                        type="date"
                                        :required="true"
                                    />
                                    <x-raksa.form.form-input
                                        label="Jangka Waktu (Hari)"
                                        name="jangka_waktu"
                                        type="number"
                                        :required="true"
                                        placeholder="0"
                                    />
                                </div>

                                <x-raksa.form.form-input
                                    label="Nilai Kontrak"
                                    name="nilai_kontrak"
                                    type="text"
                                    :required="true"
                                    prefix="Rp"
                                    placeholder="0"
                                />
                            </div>
                        </x-raksa.card.form-card>

                        {{-- Section: Administrasi Dokumen --}}
                        <x-raksa.card.form-card title="Administrasi Dokumen">
                            <x-slot:icon>
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M22 19a2 2 0 01-2 2H4a2 2 0 01-2-2V5a2 2 0 012-2h5l2 3h9a2 2 0 012 2z" stroke="currentColor" stroke-width="2"/></svg>
                            </x-slot:icon>

                            <div class="space-y-4">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <x-raksa.form.form-input
                                        label="Nomor BAST"
                                        name="nomor_bast"
                                        :required="true"
                                        placeholder="No. BAST"
                                    />
                                    <x-raksa.form.form-input
                                        label="Tanggal BAST"
                                        name="tanggal_bast"
                                        type="date"
                                        :required="true"
                                    />
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <x-raksa.form.form-input
                                        label="Nomor SPM"
                                        name="nomor_spm"
                                        :required="true"
                                        placeholder="No. SPM"
                                    />
                                    <x-raksa.form.form-input
                                        label="Tanggal SPM"
                                        name="tanggal_spm"
                                        type="date"
                                        :required="true"
                                    />
                                </div>
                            </div>
                        </x-raksa.card.form-card>
                    </div>

                    {{-- Row 2: Informasi Penyedia (Full Width) --}}
                    <x-raksa.card.form-card title="Informasi Penyedia">
                        <x-slot:icon>
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" stroke="currentColor" stroke-width="2"/><polyline points="9 22 9 12 15 12 15 22" stroke="currentColor" stroke-width="2"/></svg>
                        </x-slot:icon>

                        <div class="flex flex-col lg:flex-row gap-6">
                            {{-- Left: Company Info --}}
                            <div class="flex-1 space-y-4">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <x-raksa.form.form-input
                                        label="Nama Perusahaan"
                                        name="nama_perusahaan"
                                        :required="true"
                                        placeholder="Contoh: PT Teknologi Bangsa"
                                    />
                                    <x-raksa.form.form-input
                                        label="Nama Pemilik"
                                        name="nama_pemilik"
                                        :required="true"
                                        placeholder="Nama lengkap pemilik"
                                    />
                                </div>

                                <x-raksa.form.textarea
                                    label="Alamat Perusahaan"
                                    name="alamat_perusahaan"
                                    :required="true"
                                    :rows="3"
                                    placeholder="Alamat lengkap kantor"
                                />

                                <x-raksa.form.form-input
                                    label="NPWP"
                                    name="npwp"
                                    :required="true"
                                    placeholder="00.000.000.0-000.000"
                                />
                            </div>

                            {{-- Right: Bank Info Panel --}}
                            <div class="lg:w-80 shrink-0 rounded-xl bg-raksa-background p-5 space-y-4">
                                <x-raksa.form.form-select
                                    label="Bank"
                                    name="bank"
                                    :required="true"
                                    placeholder="Pilih Bank"
                                    :options="[
                                        'bjb' => 'Bank BJB',
                                        'bri' => 'Bank BRI',
                                        'bni' => 'Bank BNI',
                                        'mandiri' => 'Bank Mandiri',
                                        'bca' => 'Bank BCA',
                                    ]"
                                />

                                <x-raksa.form.form-input
                                    label="Atas Nama Rekening"
                                    name="atas_nama_rekening"
                                    :required="true"
                                    placeholder="Atas nama sesuai buku tabungan"
                                />

                                <x-raksa.form.form-input
                                    label="Nomor Rekening"
                                    name="nomor_rekening"
                                    :required="true"
                                    placeholder="Masukkan nomor rekening"
                                />
                            </div>
                        </div>
                    </x-raksa.card.form-card>

                    {{-- Row 3: Keterangan + Dokumen Pendukung --}}
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                        {{-- Section: Keterangan --}}
                        <x-raksa.card.form-card title="Keterangan">
                            <x-slot:icon>
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7" stroke="currentColor" stroke-width="2"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" stroke="currentColor" stroke-width="2"/></svg>
                            </x-slot:icon>

                            <x-raksa.form.textarea
                                name="keterangan"
                                :rows="7"
                                placeholder="Tambahkan informasi tambahan jika diperlukan..."
                                hint="Contoh: Belanja Modal Alat Komunikasi - PPTK M. Ridwan Fathony"
                            />
                        </x-raksa.card.form-card>

                        {{-- Section: Dokumen Pendukung --}}
                        <x-raksa.card.form-card title="Dokumen Pendukung">
                            <x-slot:icon>
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><polyline points="17 8 12 3 7 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><line x1="12" y1="3" x2="12" y2="15" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                            </x-slot:icon>

                            <div class="space-y-3">
                                <p class="text-sm font-semibold text-raksa-text leading-relaxed">
                                    Upload bukti dokumen administrasi pengadaan seperti SPK, BAST, SPM, atau dokumen pendukung lainnya.
                                </p>
                                <x-raksa.form.file-upload
                                    name="dokumen_pendukung"
                                    accept=".pdf,.docx,.doc,.jpg,.jpeg,.png"
                                    maxSize="10MB"
                                />
                            </div>
                        </x-raksa.card.form-card>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex flex-col-reverse sm:flex-row items-center justify-between gap-4 pt-6 border-t border-raksa-border/20">
                        <x-raksa.action.button variant="outline" href="{{ route('pengadaan.index') }}">
                            Batal
                        </x-raksa.action.button>

                        <div class="flex items-center gap-3 w-full sm:w-auto">
                            <x-raksa.action.button variant="ghost" type="submit" name="action" value="draft" class="flex-1 sm:flex-initial">
                                Simpan Draft
                            </x-raksa.action.button>

                            <x-raksa.action.button variant="primary" type="submit" name="action" value="submit" class="flex-1 sm:flex-initial">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" stroke="currentColor" stroke-width="2"/><polyline points="17 21 17 13 7 13 7 21" stroke="currentColor" stroke-width="2"/><polyline points="7 3 7 8 15 8" stroke="currentColor" stroke-width="2"/></svg>
                                Simpan Pengadaan
                            </x-raksa.action.button>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>
</body>
</html>
