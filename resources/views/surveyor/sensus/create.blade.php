<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Formulir Sensus Aset - RAKSA</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-raksa-background font-sans text-raksa-text antialiased" x-data="{ collapsed: false, mobileSidebarOpen: false }">
    @php
        // Ambil data dummy sensus dari SurveyorSensusSeeder
        $sensusData = \Database\Seeders\Surveyor\SurveyorSensusSeeder::getData()['sensus_list'][0];
    @endphp

    <div class="flex min-h-screen">
        {{-- Sidebar Surveyor --}}
        <x-raksa.layout.sidebar />

        {{-- Main Area --}}
        <div class="flex min-w-0 flex-1 flex-col">
            {{-- Top Navbar --}}
            <x-raksa.layout.navbar title="Formulir Sensus Fisik Aset" />

            {{-- Main Content --}}
            <main class="flex-1 space-y-6 p-4 sm:p-6 laptop:p-8" x-data="{
                kondisi: 'Baik',
                catatan: 'Fisik barang utuh dan beroperasi normal. Suhu ruangan server stabil di 19°C. Stiker label QR Code BMD ditempel ulang dan terlihat jelas.',
                photos: [
                    'https://via.placeholder.com/300x200?text=Foto+Fisik+Aset+1',
                    'https://via.placeholder.com/300x200?text=Stiker+QR+Code+2'
                ],
                addPhotoPlaceholder() {
                    if (this.photos.length < 5) {
                        this.photos.push(`https://via.placeholder.com/300x200?text=Dokumentasi+Foto+${this.photos.length + 1}`);
                    }
                },
                removePhoto(index) {
                    this.photos.splice(index, 1);
                }
            }">

                {{-- Breadcrumb & Page Header --}}
                <x-raksa.navigation.page-header
                    title="Formulir Sensus Fisik Aset"
                    description="Lengkapi hasil pemeriksaan kondisi fisik aset, catatan temuan, serta dokumentasi foto sebelum mengirimkan laporan sensus."
                >
                    <x-slot:breadcrumb>
                        <x-raksa.navigation.breadcrumb :items="[
                            ['label' => 'Dashboard', 'url' => route('surveyor.dashboard')],
                            ['label' => 'Sensus Lapangan', 'url' => route('surveyor.sensus.index')],
                            ['label' => 'Formulir Sensus'],
                        ]" />
                    </x-slot:breadcrumb>

                    <x-slot:actions>
                        <x-raksa.action.button variant="secondary" href="{{ route('surveyor.sensus.index') }}">
                            <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            <span>Kembali</span>
                        </x-raksa.action.button>
                    </x-slot:actions>
                </x-raksa.navigation.page-header>

                {{-- Main Grid Form & Guide Panel --}}
                <form action="{{ route('surveyor.riwayat.index') }}" method="GET" class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

                    {{-- Form Left Section (8 cols) --}}
                    <div class="lg:col-span-8 space-y-6">

                        {{-- Card 1: Ringkasan Identitas Barang --}}
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-6 sm:p-8 shadow-xs space-y-6">
                            <header class="flex items-center gap-3 pb-4 border-b border-slate-100">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-raksa-primary/10 text-raksa-primary shrink-0">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-raksa-text">Ringkasan Identitas Barang</h2>
                                    <p class="text-xs text-raksa-neutral">Data aset hasil pemindaian QR Code</p>
                                </div>
                            </header>

                            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">QR ID</dt>
                                    <dd class="text-base font-bold font-mono text-raksa-primary">{{ $sensusData['kode_sensus'] }}</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">KODE ASET</dt>
                                    <dd class="text-base font-bold font-mono text-raksa-text">{{ $sensusData['kode_aset'] }}</dd>
                                </div>

                                <div class="space-y-1 sm:col-span-2">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">NAMA BARANG</dt>
                                    <dd class="text-lg font-bold text-raksa-text">{{ $sensusData['nama_aset'] }}</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">PEMEGANG BARANG</dt>
                                    <dd class="text-sm font-semibold text-raksa-text">Hendra Kurniawan, S.T.</dd>
                                </div>

                                <div class="space-y-1">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">LOKASI PENEMPATAN</dt>
                                    <dd class="text-sm font-semibold text-raksa-text">{{ $sensusData['lokasi'] }}</dd>
                                </div>
                            </dl>
                        </article>

                        {{-- Card 2: Form Informasi Sensus Lapangan --}}
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-6 sm:p-8 shadow-xs space-y-6">
                            <header class="flex items-center gap-3 pb-4 border-b border-slate-100">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-raksa-accent/10 text-raksa-accent-dark shrink-0">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-raksa-text">Informasi Hasil Sensus</h2>
                                    <p class="text-xs text-raksa-neutral">Pemeriksaan kondisi dan catatan fisik lapangan</p>
                                </div>
                            </header>

                            <div class="space-y-5">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div class="space-y-1.5">
                                        <label class="block text-xs font-semibold text-raksa-neutral">Tanggal Sensus</label>
                                        <input type="text" value="04 Agustus 2026" readonly class="w-full rounded-xl border border-slate-200 bg-slate-100 px-4 py-2.5 text-xs font-medium text-slate-600 cursor-not-allowed" />
                                    </div>

                                    <div class="space-y-1.5">
                                        <label class="block text-xs font-semibold text-raksa-neutral">Surveyor Penanggung Jawab</label>
                                        <input type="text" value="Budi Pratama, S.T." readonly class="w-full rounded-xl border border-slate-200 bg-slate-100 px-4 py-2.5 text-xs font-medium text-slate-600 cursor-not-allowed" />
                                    </div>
                                </div>

                                {{-- Select Kondisi Barang --}}
                                <div class="space-y-1.5">
                                    <label class="block text-xs font-bold text-raksa-text">
                                        Kondisi Fisik Barang <span class="text-rose-600">*</span>
                                    </label>
                                    <select
                                        name="kondisi"
                                        x-model="kondisi"
                                        required
                                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-xs font-medium text-raksa-text focus:border-raksa-primary focus:ring-2 focus:ring-raksa-primary/20 transition cursor-pointer"
                                    >
                                        <option value="Baik">Baik (100% Berfungsi Normal)</option>
                                        <option value="Rusak Ringan">Rusak Ringan (Perlu Perbaikan Kecil / Garansi)</option>
                                        <option value="Rusak Berat">Rusak Berat (Tidak Berfungsi / Usul Penghapusan)</option>
                                    </select>
                                </div>

                                {{-- Textarea Catatan Sensus Lapangan --}}
                                <div class="space-y-1.5">
                                    <label class="block text-xs font-bold text-raksa-text">
                                        Catatan Sensus Lapangan <span class="text-rose-600">*</span>
                                    </label>
                                    <textarea
                                        name="catatan"
                                        rows="4"
                                        x-model="catatan"
                                        required
                                        placeholder="Tuliskan hasil pemeriksaan fisik, kondisi komponen, atau perubahan lokasi jika ada..."
                                        class="w-full rounded-xl border border-slate-200 bg-white p-4 text-xs font-normal text-raksa-text placeholder:text-slate-400 focus:border-raksa-primary focus:ring-2 focus:ring-raksa-primary/20 transition leading-relaxed"
                                    ></textarea>
                                </div>
                            </div>
                        </article>

                        {{-- Card 3: Upload Dokumentasi Foto --}}
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-6 sm:p-8 shadow-xs space-y-6">
                            <header class="flex items-center justify-between pb-4 border-b border-slate-100">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-sky-100 text-sky-700 shrink-0">
                                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h2 class="text-lg font-bold text-raksa-text">Dokumentasi Foto Lapangan</h2>
                                        <p class="text-xs text-raksa-neutral">Unggah foto fisik barang & stiker QR Code (Maksimal 5 foto)</p>
                                    </div>
                                </div>

                                <span class="text-xs font-bold text-raksa-primary"><span x-text="photos.length"></span>/5 Foto</span>
                            </header>

                            {{-- Dropzone Area --}}
                            <div
                                @click="addPhotoPlaceholder()"
                                class="rounded-2xl border-2 border-dashed border-slate-300 bg-slate-50 p-6 text-center hover:bg-slate-100 hover:border-raksa-primary transition cursor-pointer space-y-3"
                            >
                                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-raksa-primary/10 text-raksa-primary mx-auto">
                                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-raksa-text">Klik atau seret foto ke sini untuk mengunggah</p>
                                    <p class="text-[11px] text-slate-400 mt-1">Format JPG, PNG (Maksimal 5MB per file)</p>
                                </div>
                            </div>

                            {{-- Preview Grid --}}
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4" x-show="photos.length > 0">
                                <template x-for="(photo, index) in photos" :key="index">
                                    <div class="relative group rounded-xl border border-slate-200 overflow-hidden bg-slate-100">
                                        <img :src="photo" alt="Preview Foto Sensus" class="h-32 w-full object-cover" />
                                        <div class="absolute inset-0 bg-slate-900/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center gap-2">
                                            <button
                                                type="button"
                                                @click="removePhoto(index)"
                                                class="p-2 rounded-lg bg-rose-600 text-white hover:bg-rose-700 transition"
                                                title="Hapus Foto"
                                            >
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </article>

                        {{-- Action Buttons at the Bottom of Main Form Column --}}
                        <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs flex flex-col sm:flex-row items-center justify-end gap-3">
                            <x-raksa.action.button variant="outline" href="{{ route('surveyor.sensus.index') }}" class="w-full sm:w-auto text-xs px-6">
                                <span>Batal</span>
                            </x-raksa.action.button>

                            <x-raksa.action.button variant="secondary" type="button" class="w-full sm:w-auto text-xs px-6">
                                <span>Simpan Draft</span>
                            </x-raksa.action.button>

                            <x-raksa.action.button variant="primary" type="submit" class="w-full sm:w-auto text-xs px-8 !py-3 font-bold shadow-md">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                                <span>Kirim Hasil Sensus</span>
                            </x-raksa.action.button>
                        </div>

                    </div>

                    {{-- Form Right Section (Supporting Info Only - 4 cols) --}}
                    <div class="lg:col-span-4 space-y-6">

                        {{-- Card Panduan Sensus Lapangan --}}
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs space-y-4">
                            <div class="flex items-center gap-2.5 pb-3 border-b border-slate-100">
                                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-raksa-primary/10 text-raksa-primary shrink-0">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <h3 class="text-base font-bold text-raksa-text">Panduan Pengisian</h3>
                            </div>

                            <ul class="space-y-3 text-xs text-raksa-neutral leading-relaxed">
                                <li class="flex items-start gap-2">
                                    <span class="h-1.5 w-1.5 rounded-full bg-raksa-primary shrink-0 mt-1.5"></span>
                                    <span>Pastikan pemeriksaan dilakukan <strong>langsung di lokasi fisik barang</strong>.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="h-1.5 w-1.5 rounded-full bg-raksa-primary shrink-0 mt-1.5"></span>
                                    <span>Ambil foto kerusakan dengan <strong>pencahayaan yang cukup</strong> dan sudut yang jelas.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="h-1.5 w-1.5 rounded-full bg-raksa-primary shrink-0 mt-1.5"></span>
                                    <span>Berikan catatan jika terdapat <strong>perubahan pemegang</strong> atau perpindahan posisi barang.</span>
                                </li>
                            </ul>
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
