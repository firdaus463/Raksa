<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pusat Notifikasi e-BMD - RAKSA</title>

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
            <x-raksa.layout.navbar title="Pusat Notifikasi" />

            {{-- Main Content --}}
            <main class="flex-1 space-y-6 p-4 sm:p-6 laptop:p-8" x-data="{
                selectedId: 1,
                activeTab: 'all',
                searchQuery: '',
                notifications: [
                    {
                        id: 1,
                        category: 'Sensus',
                        categoryLabel: 'Sensus Aset',
                        type: 'Sensus Baru',
                        title: 'Sensus Baru: Laptop Lenovo ThinkPad T14',
                        summary: 'Surveyor Riyan Hidayat mengunggah hasil sensus lapangan dan menunggu verifikasi admin.',
                        description: 'Surveyor Riyan Hidayat telah menyelesaikan sensus lapangan untuk barang Laptop Lenovo ThinkPad T14 (QR ID: QR-2026-00125). Surveyor mengusulkan perubahan kondisi barang menjadi Rusak Ringan karena terdapat penurunan kinerja baterai. Diperlukan verifikasi admin sebelum data kondisi disimpan secara permanen pada sistem e-BMD.',
                        time: '10 Menit yang lalu',
                        fullTime: '31 Juli 2026, 09:10 WIB',
                        sender: 'Riyan Hidayat, S.T. (Surveyor)',
                        read: false,
                        priority: 'high',
                        actionText: 'Verifikasi Hasil Sensus',
                        actionUrl: '{{ route('monitoring.show') }}',
                        details: {
                            surveyor: 'Riyan Hidayat, S.T.',
                            itemName: 'Laptop Lenovo ThinkPad T14',
                            qrId: 'QR-2026-00125 (AST-2026-00891)',
                            location: 'Ruang Data Center Diskominfo',
                            condition: 'Rusak Ringan (Diusulkan)',
                            spk: 'SPK/DISKOMINFO/2024/001'
                        }
                    },
                    {
                        id: 2,
                        category: 'Sensus',
                        categoryLabel: 'Sensus Aset',
                        type: 'Sensus Menunggu Verifikasi',
                        title: '18 Hasil Sensus Menunggu Verifikasi',
                        summary: 'Terdapat 18 laporan sensus aset bulan Juli 2026 yang perlu segera ditindaklanjuti admin.',
                        description: 'Sistem mencatat ada 18 berkas pengajuan sensus fisik dari tim surveyor lapangan yang masih berada dalam antrean peninjauan. Mohon segera lakukan proses audit dan persetujuan kondisi agar neraca aset e-BMD tetap diperbarui secara akurat.',
                        time: '45 Menit yang lalu',
                        fullTime: '31 Juli 2026, 08:35 WIB',
                        sender: 'Sistem E-BMD RAKSA',
                        read: false,
                        priority: 'high',
                        actionText: 'Proses Antrean Verifikasi',
                        actionUrl: '{{ route('monitoring.index') }}',
                        details: {
                            surveyor: 'Tim Surveyor Lapangan',
                            itemName: '18 Baris Inventaris Aset',
                            qrId: 'Batch #2026-07-31',
                            location: 'Seluruh SKPD Kota Bandung',
                            condition: 'Menunggu Verifikasi Admin',
                            spk: 'Program Sensus Tahunan 2026'
                        }
                    },
                    {
                        id: 3,
                        category: 'Pengadaan',
                        categoryLabel: 'Pengadaan e-BMD',
                        type: 'Pengadaan Baru',
                        title: 'Pengadaan Baru: Belanja Modal Komputer Server',
                        summary: 'Paket pengadaan SPK/DKI/2026/089 baru dibuat dan memerlukan verifikasi kelengkapan SPK.',
                        description: 'Pusat pengadaan e-BMD menerbitkan dokumen pengadaan baru dengan Nomor SPK: SPK/DKI/2026/089 atas nama rekanan PT. Global Informatika. Harap periksa rincian unit barang dan jadwal serah terima fisik aset.',
                        time: '1 Jam yang lalu',
                        fullTime: '31 Juli 2026, 08:00 WIB',
                        sender: 'Bagian Pengadaan & Asset Control',
                        read: false,
                        priority: 'normal',
                        actionText: 'Lihat Detail Pengadaan',
                        actionUrl: '{{ route('pengadaan.show') }}',
                        details: {
                            surveyor: 'Pejabat Pembuat Komitmen (PPK)',
                            itemName: 'Server Rackmount Dell PowerEdge R750',
                            qrId: 'SPK/DKI/2026/089',
                            location: 'Gedung Diskominfo Lantai 2',
                            condition: 'Proses Pengadaan',
                            spk: 'SPK/DKI/2026/089'
                        }
                    },
                    {
                        id: 4,
                        category: 'Inventaris',
                        categoryLabel: 'Inventaris Aset',
                        type: 'Barang Baru Terdaftar',
                        title: 'Barang Baru Terdaftar: Honda Vario 160 CBS',
                        summary: 'Aset kendaraan operasional dinas baru telah resmi masuk ke katalog inventaris RAKSA.',
                        description: 'Pendaftaran aset baru hasil pengadaan anggaran 2026 telah selesai diproses. Kendaraan operasional Honda Vario 160 CBS dengan Plat Nomor D 4452 ABD telah terdaftar di katalog inventaris e-BMD beserta QR Code ID fisik.',
                        time: '3 Jam yang lalu',
                        fullTime: '31 Juli 2026, 06:15 WIB',
                        sender: 'Admin Inventaris Aset',
                        read: true,
                        priority: 'normal',
                        actionText: 'Lihat Data Inventaris',
                        actionUrl: '{{ route('aset.show') }}',
                        details: {
                            surveyor: 'Penanggung Jawab Aset',
                            itemName: 'Honda Vario 160 CBS (Plat D 4452 ABD)',
                            qrId: 'QR-2026-00442',
                            location: 'Garasi Operasional Diskominfo',
                            condition: 'Baik (Aset Baru)',
                            spk: 'SPK/DKI/2026/044'
                        }
                    },
                    {
                        id: 5,
                        category: 'Monitoring',
                        categoryLabel: 'Monitoring Sensus',
                        type: 'Monitoring Ditolak',
                        title: 'Monitoring Ditolak: Projector Epson EB-X500',
                        summary: 'Hasil monitoring fisik ditolak admin karena foto dokumentasi fisik kurang jelas.',
                        description: 'Hasil pemantauan berkala untuk barang Projector Epson EB-X500 (QR ID: QR-2022-00115) ditolak pada verifikasi tahap 1. Diharapkan surveyor melakukan foto ulang fisik barang dan nomor seri (SN) sebelum diunggah kembali.',
                        time: '5 Jam yang lalu',
                        fullTime: '31 Juli 2026, 04:10 WIB',
                        sender: 'Tim Verifikator Internal',
                        read: true,
                        priority: 'normal',
                        actionText: 'Lihat Catatan Revisi',
                        actionUrl: '{{ route('monitoring.show') }}',
                        details: {
                            surveyor: 'Budi Santoso (Surveyor)',
                            itemName: 'Projector Epson EB-X500',
                            qrId: 'QR-2022-00115',
                            location: 'Ruang Rapat Utama A',
                            condition: 'Ditolak (Perlu Foto Ulang)',
                            spk: 'SPK/DKI/2022/115'
                        }
                    },
                    {
                        id: 6,
                        category: 'Pengadaan',
                        categoryLabel: 'Pengadaan e-BMD',
                        type: 'Pengadaan Selesai',
                        title: 'Pengadaan Selesai: Apple iPhone 16 Pro',
                        summary: 'Proses pengadaan selesai, dokumen BAST ditandatangani dan aset siap didistribusikan.',
                        description: 'Seluruh tahapan pengadaan SPK/DKI/2026/012 telah diselesaikan. Berkas BAST fisik dan digital sudah diverifikasi sah. Barang siap untuk diserahterimakan kepada penanggung jawab unit.',
                        time: '1 Hari yang lalu',
                        fullTime: '30 Juli 2026, 15:45 WIB',
                        sender: 'Panitia Pemeriksa Hasil Pekerjaan',
                        read: true,
                        priority: 'normal',
                        actionText: 'Lihat Berkas BAST',
                        actionUrl: '{{ route('pengadaan.show') }}',
                        details: {
                            surveyor: 'M. Ridwan Fathony (Pemegang)',
                            itemName: 'Apple iPhone 16 Pro 256GB',
                            qrId: 'QR-2026-00126',
                            location: 'Ruang Bidang TIK',
                            condition: 'Baik (100% Selesai)',
                            spk: 'SPK/DKI/2026/012'
                        }
                    },
                    {
                        id: 7,
                        category: 'Sensus',
                        categoryLabel: 'Sensus Aset',
                        type: 'Pengingat Jadwal Sensus',
                        title: 'Pengingat: Jadwal Sensus Aset Triwulan III',
                        summary: 'Jadwal sensus fisik inventaris aset gedung Pemkot akan dimulai 3 hari lagi.',
                        description: 'Pengingat otomatis sistem: Sensus berkala Aset Barang Milik Daerah (BMD) Triwulan III Kota Bandung akan dilaksanakan mulai tanggal 3 Agustus 2026. Mohon persiapkan daftar penugasan surveyor dan cetak stiker QR Code.',
                        time: '1 Hari yang lalu',
                        fullTime: '30 Juli 2026, 11:20 WIB',
                        sender: 'Sistem E-BMD RAKSA',
                        read: true,
                        priority: 'high',
                        actionText: 'Lihat Penugasan Surveyor',
                        actionUrl: '{{ route('user.index') }}',
                        details: {
                            surveyor: 'Seluruh Tim Surveyor Lapangan',
                            itemName: 'Aset Bangunan & Peralatan Kantor',
                            qrId: 'Jadwal TW III - 2026',
                            location: 'Gedung Pemkot Bandung',
                            condition: 'Persiapan Sensus',
                            spk: 'Surat Tugas #094/ST-BMD/2026'
                        }
                    }
                ],
                get filteredNotifications() {
                    return this.notifications.filter(n => {
                        const matchesTab = this.activeTab === 'all' || 
                            (this.activeTab === 'unread' && !n.read) ||
                            (this.activeTab.toLowerCase() === n.category.toLowerCase());
                        const matchesSearch = n.title.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                            n.summary.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                            n.type.toLowerCase().includes(this.searchQuery.toLowerCase());
                        return matchesTab && matchesSearch;
                    });
                },
                get selectedNotification() {
                    return this.notifications.find(n => n.id === this.selectedId) || this.notifications[0];
                },
                markAllRead() {
                    this.notifications.forEach(n => n.read = true);
                }
            }">
                
                {{-- Breadcrumb & Page Header --}}
                <x-raksa.navigation.page-header
                    title="Pusat Notifikasi e-BMD"
                    description="Pantau pemberitahuan sensus aset, verifikasi monitoring, proses pengadaan, dan pembaruan inventaris."
                >
                    <x-slot:breadcrumb>
                        <x-raksa.navigation.breadcrumb :items="[
                            ['label' => 'Dashboard', 'url' => route('dashboard')],
                            ['label' => 'Pusat Notifikasi'],
                        ]" />
                    </x-slot:breadcrumb>

                    <x-slot:actions>
                        <x-raksa.action.button variant="secondary" type="button" @click="markAllRead()">
                            <svg class="h-4 w-4 shrink-0 text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Tandai Semua Dibaca</span>
                        </x-raksa.action.button>
                    </x-slot:actions>
                </x-raksa.navigation.page-header>

                {{-- Two Panel Layout Grid --}}
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                    
                    {{-- Left Panel: Notification List & Filters --}}
                    <div class="lg:col-span-5 space-y-4">
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-4 sm:p-5 shadow-xs space-y-4">
                            {{-- Panel Header --}}
                            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                                <div class="flex items-center gap-2">
                                    <h2 class="text-base font-bold text-raksa-text">Daftar Notifikasi</h2>
                                    <x-raksa.feedback.badge variant="info" class="text-xs px-2.5 py-0.5 font-bold">
                                        <span x-text="notifications.filter(n => !n.read).length"></span> Belum Dibaca
                                    </x-raksa.feedback.badge>
                                </div>
                            </div>

                            {{-- Search Input --}}
                            <x-raksa.form.search-bar
                                name="search_inbox"
                                placeholder="Cari tipe, barang, atau QR ID..."
                                class="max-w-full"
                                x-model="searchQuery"
                            />

                            {{-- Category Filter Pills --}}
                            <div class="flex items-center gap-1.5 overflow-x-auto pb-1 text-xs">
                                <button type="button" @click="activeTab = 'all'"
                                    :class="activeTab === 'all' ? 'bg-raksa-primary text-white font-bold' : 'bg-slate-100 text-raksa-neutral hover:bg-slate-200'"
                                    class="rounded-lg px-3 py-1.5 font-medium transition shrink-0">
                                    Semua
                                </button>
                                <button type="button" @click="activeTab = 'unread'"
                                    :class="activeTab === 'unread' ? 'bg-raksa-primary text-white font-bold' : 'bg-slate-100 text-raksa-neutral hover:bg-slate-200'"
                                    class="rounded-lg px-3 py-1.5 font-medium transition shrink-0">
                                    Belum Dibaca
                                </button>
                                <button type="button" @click="activeTab = 'sensus'"
                                    :class="activeTab === 'sensus' ? 'bg-raksa-primary text-white font-bold' : 'bg-slate-100 text-raksa-neutral hover:bg-slate-200'"
                                    class="rounded-lg px-3 py-1.5 font-medium transition shrink-0">
                                    Sensus
                                </button>
                                <button type="button" @click="activeTab = 'monitoring'"
                                    :class="activeTab === 'monitoring' ? 'bg-raksa-primary text-white font-bold' : 'bg-slate-100 text-raksa-neutral hover:bg-slate-200'"
                                    class="rounded-lg px-3 py-1.5 font-medium transition shrink-0">
                                    Monitoring
                                </button>
                                <button type="button" @click="activeTab = 'pengadaan'"
                                    :class="activeTab === 'pengadaan' ? 'bg-raksa-primary text-white font-bold' : 'bg-slate-100 text-raksa-neutral hover:bg-slate-200'"
                                    class="rounded-lg px-3 py-1.5 font-medium transition shrink-0">
                                    Pengadaan
                                </button>
                                <button type="button" @click="activeTab = 'inventaris'"
                                    :class="activeTab === 'inventaris' ? 'bg-raksa-primary text-white font-bold' : 'bg-slate-100 text-raksa-neutral hover:bg-slate-200'"
                                    class="rounded-lg px-3 py-1.5 font-medium transition shrink-0">
                                    Inventaris
                                </button>
                            </div>

                            {{-- Notification Items Stack --}}
                            <div class="space-y-2.5 max-h-[600px] overflow-y-auto pr-1">
                                <template x-for="item in filteredNotifications" :key="item.id">
                                    <div
                                        @click="selectedId = item.id; item.read = true"
                                        :class="{
                                            'border-raksa-primary bg-raksa-primary/5 shadow-2xs': selectedId === item.id,
                                            'border-slate-200/80 bg-white hover:border-slate-300': selectedId !== item.id,
                                            'opacity-75': item.read && selectedId !== item.id
                                        }"
                                        class="rounded-xl border p-4 transition duration-200 cursor-pointer relative space-y-2"
                                    >
                                        <div class="flex items-start justify-between gap-2">
                                            <div class="flex items-center gap-1.5 flex-wrap">
                                                <span :class="{
                                                    'bg-raksa-primary/10 text-raksa-primary': item.category === 'Sensus',
                                                    'bg-purple-100 text-purple-700': item.category === 'Monitoring',
                                                    'bg-raksa-accent/10 text-raksa-accent-dark': item.category === 'Pengadaan',
                                                    'bg-emerald-100 text-emerald-700': item.category === 'Inventaris'
                                                }" class="rounded-md px-2 py-0.5 text-[11px] font-bold">
                                                    <span x-text="item.categoryLabel"></span>
                                                </span>

                                                <span class="rounded-md bg-slate-100 text-raksa-neutral px-2 py-0.5 text-[10px] font-semibold" x-text="item.type"></span>

                                                <template x-if="item.priority === 'high'">
                                                    <span class="rounded-md bg-rose-100 text-rose-700 px-2 py-0.5 text-[10px] font-bold">Penting</span>
                                                </template>
                                            </div>

                                            <div class="flex items-center gap-1.5 shrink-0">
                                                <span class="text-[11px] text-slate-400" x-text="item.time"></span>
                                                <template x-if="!item.read">
                                                    <span class="h-2 w-2 rounded-full bg-raksa-primary animate-pulse"></span>
                                                </template>
                                            </div>
                                        </div>

                                        <div>
                                            <h3 class="text-xs sm:text-sm font-bold text-raksa-text leading-snug" x-text="item.title"></h3>
                                            <p class="text-xs text-raksa-neutral/80 line-clamp-2 mt-1 leading-relaxed" x-text="item.summary"></p>
                                        </div>
                                    </div>
                                </template>

                                <template x-if="filteredNotifications.length === 0">
                                    <div class="text-center py-8 text-slate-400 text-xs">
                                        Tidak ada notifikasi yang sesuai dengan filter.
                                    </div>
                                </template>
                            </div>
                        </article>
                    </div>

                    {{-- Right Panel: Notification Detail --}}
                    <div class="lg:col-span-7 space-y-6">
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-6 sm:p-8 shadow-xs space-y-6">
                            {{-- Detail Header --}}
                            <div class="space-y-3 pb-5 border-b border-slate-100">
                                <div class="flex items-center justify-between gap-3 flex-wrap">
                                    <div class="flex items-center gap-2">
                                        <span :class="{
                                            'bg-raksa-primary/10 text-raksa-primary': selectedNotification.category === 'Sensus',
                                            'bg-purple-100 text-purple-700': selectedNotification.category === 'Monitoring',
                                            'bg-raksa-accent/10 text-raksa-accent-dark': selectedNotification.category === 'Pengadaan',
                                            'bg-emerald-100 text-emerald-700': selectedNotification.category === 'Inventaris'
                                        }" class="rounded-lg px-2.5 py-1 text-xs font-bold">
                                            <span x-text="selectedNotification.categoryLabel"></span>
                                        </span>

                                        <span class="rounded-lg bg-slate-100 text-raksa-neutral px-2.5 py-1 text-xs font-semibold" x-text="selectedNotification.type"></span>

                                        <template x-if="selectedNotification.priority === 'high'">
                                            <x-raksa.feedback.badge variant="danger">Prioritas Tinggi</x-raksa.feedback.badge>
                                        </template>
                                    </div>

                                    <span class="text-xs text-slate-400 font-medium" x-text="selectedNotification.fullTime"></span>
                                </div>

                                <h1 class="text-xl sm:text-2xl font-extrabold text-raksa-text leading-snug" x-text="selectedNotification.title"></h1>
                                
                                <p class="text-xs text-raksa-neutral">
                                    Pengirim / Sumber: <strong class="font-bold text-raksa-text" x-text="selectedNotification.sender"></strong>
                                </p>
                            </div>

                            {{-- Description Content --}}
                            <div class="space-y-2">
                                <h2 class="text-xs font-bold uppercase tracking-wider text-raksa-neutral">RINCIAN PEMBERITAHUAN E-BMD</h2>
                                <p class="text-sm text-raksa-text leading-relaxed" x-text="selectedNotification.description"></p>
                            </div>

                            {{-- Detail Informasi Terkait Card --}}
                            <div class="rounded-xl bg-raksa-surface p-5 border border-slate-200/60 space-y-4">
                                <h3 class="text-xs font-bold uppercase tracking-wider text-raksa-neutral pb-2 border-b border-slate-200/50">
                                    INFORMASI TERKAIT PROSES E-BMD
                                </h3>

                                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs sm:text-sm">
                                    <div>
                                        <dt class="text-xs font-medium text-raksa-neutral">Surveyor / Penanggung Jawab</dt>
                                        <dd class="font-bold text-raksa-text mt-0.5" x-text="selectedNotification.details.surveyor"></dd>
                                    </div>

                                    <div>
                                        <dt class="text-xs font-medium text-raksa-neutral">Nama Barang / Objek Aset</dt>
                                        <dd class="font-bold text-raksa-text mt-0.5" x-text="selectedNotification.details.itemName"></dd>
                                    </div>

                                    <div>
                                        <dt class="text-xs font-medium text-raksa-neutral">QR ID / Kode Registrasi</dt>
                                        <dd class="font-mono font-bold text-raksa-primary mt-0.5" x-text="selectedNotification.details.qrId"></dd>
                                    </div>

                                    <div>
                                        <dt class="text-xs font-medium text-raksa-neutral">Lokasi Fisik Terakhir</dt>
                                        <dd class="font-semibold text-raksa-text mt-0.5" x-text="selectedNotification.details.location"></dd>
                                    </div>

                                    <div>
                                        <dt class="text-xs font-medium text-raksa-neutral">Kondisi / Status Akun</dt>
                                        <dd class="font-bold text-amber-700 mt-0.5" x-text="selectedNotification.details.condition"></dd>
                                    </div>

                                    <div>
                                        <dt class="text-xs font-medium text-raksa-neutral">Nomor SPK Kontrak / Berkas</dt>
                                        <dd class="font-mono font-bold text-raksa-text mt-0.5" x-text="selectedNotification.details.spk"></dd>
                                    </div>
                                </dl>
                            </div>

                            {{-- Action Buttons --}}
                            <div class="flex flex-col sm:flex-row items-center justify-end gap-3 pt-4 border-t border-slate-100">
                                <x-raksa.action.button variant="secondary" type="button" @click="selectedNotification.read = true">
                                    <svg class="h-4 w-4 shrink-0 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Tandai Sudah Dibaca</span>
                                </x-raksa.action.button>

                                <x-raksa.action.button variant="primary" ::href="selectedNotification.actionUrl">
                                    <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span x-text="selectedNotification.actionText"></span>
                                </x-raksa.action.button>
                            </div>
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
