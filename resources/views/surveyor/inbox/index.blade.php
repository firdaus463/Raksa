<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pusat Notifikasi Surveyor - RAKSA</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-raksa-background font-sans text-raksa-text antialiased" x-data="{ collapsed: false, mobileSidebarOpen: false }">
    @php
        // Ambil data dummy dari SurveyorInboxSeeder
        $inboxData = \Database\Seeders\Surveyor\SurveyorInboxSeeder::getData()['inbox_list'];
    @endphp

    <div class="flex min-h-screen">
        {{-- Sidebar Surveyor --}}
        <x-raksa.layout.sidebar />

        {{-- Main Area --}}
        <div class="flex min-w-0 flex-1 flex-col">
            {{-- Top Navbar --}}
            <x-raksa.layout.navbar title="Pusat Notifikasi Surveyor" />

            {{-- Main Content --}}
            <main class="flex-1 space-y-6 p-4 sm:p-6 laptop:p-8" x-data="{
                selectedId: 1,
                activeTab: 'all',
                searchQuery: '',
                notifications: [
                    {
                        id: 1,
                        category: 'disetujui',
                        categoryLabel: 'Sensus Disetujui',
                        badgeColor: 'bg-emerald-100 text-emerald-700 border-emerald-200',
                        badgeVariant: 'success',
                        title: 'Sensus Disetujui: Server Rack Dell PowerEdge',
                        summary: 'Admin Hendra Setiawan telah memverifikasi & menyetujui hasil sensus fisik aset Data Center.',
                        description: 'Hasil pendataan sensus fisik barang Server Rack Dell PowerEdge R750 (QR ID: SNS-2026-070 / BMD-2.01.03.01.001) yang Anda kirimkan telah diperiksa oleh Admin Utama. Data kondisi barang (Baik) dan posisi lokasi penempatan telah diperbarui secara resmi pada sistem e-BMD.',
                        time: '15 Menit yang lalu',
                        fullTime: '04 Agustus 2026, 08:25 WIB',
                        sender: 'Hendra Setiawan, S.Kom (Admin Utama)',
                        read: false,
                        priority: 'high',
                        actionText: 'Lihat Detail Sensus',
                        actionUrl: '{{ route('surveyor.riwayat.show') }}',
                        details: {
                            surveyor: 'Budi Pratama, S.T.',
                            itemName: 'Server Rack Dell PowerEdge R750',
                            qrId: 'SNS-2026-070 (BMD-2.01.03.01.001)',
                            location: 'Data Center Gedung Diskominfo',
                            condition: 'Disetujui (Kondisi Baik)',
                            note: 'Stiker label QR-Code tercetak jelas'
                        }
                    },
                    {
                        id: 2,
                        category: 'ditolak',
                        categoryLabel: 'Sensus Ditolak',
                        badgeColor: 'bg-rose-100 text-rose-700 border-rose-200',
                        badgeVariant: 'danger',
                        title: 'Sensus Ditolak: UPS APC Smart-UPS 3000VA',
                        summary: 'Laporan sensus fisik ditolak admin karena foto dokumentasi label QR-Code blur.',
                        description: 'Hasil sensus fisik untuk aset UPS APC Smart-UPS RT 3000VA (QR ID: SNS-2026-074) ditolak oleh tim verifikasi Admin. Alasan Penolakan: Foto stiker QR-Code kurang jelas dan blur. Mohon lakukan foto ulang dengan jarak lebih dekat.',
                        time: '1 Jam yang lalu',
                        fullTime: '04 Agustus 2026, 07:30 WIB',
                        sender: 'Rina Nuraini, A.Md (Operator Aset)',
                        read: false,
                        priority: 'high',
                        actionText: 'Perbaiki & Foto Ulang',
                        actionUrl: '{{ route('surveyor.riwayat.show') }}',
                        details: {
                            surveyor: 'Budi Pratama, S.T.',
                            itemName: 'UPS APC Smart-UPS RT 3000VA',
                            qrId: 'SNS-2026-074 (BMD-2.01.03.08.005)',
                            location: 'Ruang Subbag Keuangan & Aset',
                            condition: 'Ditolak (Perlu Foto Ulang)',
                            note: 'Foto label stiker QR kurang jelas'
                        }
                    },
                    {
                        id: 3,
                        category: 'revisi',
                        categoryLabel: 'Revisi Data',
                        badgeColor: 'bg-amber-100 text-amber-800 border-amber-200',
                        badgeVariant: 'warning',
                        title: 'Permintaan Revisi: Laptop Lenovo ThinkPad T14',
                        summary: 'Admin meminta pembaruan catatan kondisi fisik dan kelengkapan aksesoris laptop.',
                        description: 'Pesan dari Pengelola BMD: Harap tambahkan rincian kelengkapan charger adaptor dan ketersediaan tas laptop pada kolom catatan fisik sebelum pengajuan disetujui.',
                        time: '3 Jam yang lalu',
                        fullTime: '04 Agustus 2026, 05:15 WIB',
                        sender: 'Siti Rahmawati, S.E. (Pengelola BMD)',
                        read: true,
                        priority: 'normal',
                        actionText: 'Update Catatan Sensus',
                        actionUrl: '{{ route('surveyor.riwayat.show') }}',
                        details: {
                            surveyor: 'Budi Pratama, S.T.',
                            itemName: 'Laptop Lenovo ThinkPad T14 Gen 3',
                            qrId: 'SNS-2026-072 (BMD-2.01.03.05.088)',
                            location: 'Bidang Aplikasi & E-Government',
                            condition: 'Revisi Catatan Fisik',
                            note: 'Lengkapi info charger & tas'
                        }
                    },
                    {
                        id: 4,
                        category: 'informasi',
                        categoryLabel: 'Informasi Penugasan',
                        badgeColor: 'bg-raksa-primary/10 text-raksa-primary border-blue-200',
                        badgeVariant: 'info',
                        title: 'Penugasan Sensus Baru: Gedung Command Center',
                        summary: 'Anda mendapatkan tugas sensus fisik 5 unit perangkat IT di Studio Command Center.',
                        description: 'Surat Tugas Sensus Lapangan #094/ST-BMD/2026 telah diterbitkan. Anda ditugaskan melakukan pemindaian fisik 5 unit perangkat Workstation & Kamera Peliputan di Ruang Command Center Kota Bandung.',
                        time: '1 Hari yang lalu',
                        fullTime: '03 Agustus 2026, 14:20 WIB',
                        sender: 'Hendra Setiawan, S.Kom (Admin Utama)',
                        read: true,
                        priority: 'normal',
                        actionText: 'Lihat Daftar Tugas',
                        actionUrl: '{{ route('surveyor.dashboard') }}',
                        details: {
                            surveyor: 'Budi Pratama, S.T.',
                            itemName: '5 Perangkat IT & Multimedia',
                            qrId: 'ST-094/BMD/2026',
                            location: 'Studio Media & Video Command Center',
                            condition: 'Penugasan Baru Lapangan',
                            note: 'Tenggat 06 Agustus 2026'
                        }
                    },
                    {
                        id: 5,
                        category: 'reminder',
                        categoryLabel: 'Reminder Tenggat',
                        badgeColor: 'bg-yellow-100 text-yellow-800 border-yellow-200',
                        badgeVariant: 'warning',
                        title: 'Pengingat: Tenggat Sensus Tahunan Semester I',
                        summary: 'Pengingat otomatis batas akhir pengiriman sensus lapangan sisa 10 hari.',
                        description: 'Peringatan Sistem: Seluruh berkas pengajuan sensus fisik aset BMD Semester I harus sudah terverifikasi sebelum 15 Agustus 2026 untuk penyusunan Laporan Pertanggungjawaban BMD.',
                        time: '2 Hari yang lalu',
                        fullTime: '02 Agustus 2026, 09:00 WIB',
                        sender: 'Sistem RAKSA e-BMD',
                        read: true,
                        priority: 'normal',
                        actionText: 'Pantau Progress Sensus',
                        actionUrl: '{{ route('surveyor.dashboard') }}',
                        details: {
                            surveyor: 'Tim Surveyor Lapangan',
                            itemName: 'Aset Inventaris BMD Diskominfo',
                            qrId: 'Jadwal Sensus S1-2026',
                            location: 'Seluruh SKPD Kota Bandung',
                            condition: 'Reminder Batas Akhir',
                            note: 'Batas akhir 15 Agu 2026'
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
                            n.categoryLabel.toLowerCase().includes(this.searchQuery.toLowerCase());
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
                    title="Pusat Notifikasi Surveyor"
                    description="Pantau pemberitahuan status verifikasi sensus (Disetujui / Ditolak), penugasan baru, dan instruksi revisi dari Admin BMD."
                >
                    <x-slot:breadcrumb>
                        <x-raksa.navigation.breadcrumb :items="[
                            ['label' => 'Dashboard', 'url' => route('surveyor.dashboard')],
                            ['label' => 'Inbox'],
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

                {{-- Two Panel Layout Grid (Selaras 100% dengan Admin Inbox) --}}
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                    
                    {{-- Left Panel: Notification List & Filters --}}
                    <div class="lg:col-span-5 space-y-4">
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-4 sm:p-5 shadow-xs space-y-4">
                            {{-- Panel Header --}}
                            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                                <div class="flex items-center gap-2">
                                    <h2 class="text-base font-bold text-raksa-text">Pemberitahuan</h2>
                                    <x-raksa.feedback.badge variant="info" class="text-xs px-2.5 py-0.5 font-bold">
                                        <span x-text="notifications.filter(n => !n.read).length"></span> Belum Dibaca
                                    </x-raksa.feedback.badge>
                                </div>
                            </div>

                            {{-- Search Input --}}
                            <x-raksa.form.search-bar
                                name="search_inbox"
                                placeholder="Cari pemberitahuan, QR ID, atau status..."
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
                                <button type="button" @click="activeTab = 'disetujui'"
                                    :class="activeTab === 'disetujui' ? 'bg-emerald-600 text-white font-bold' : 'bg-emerald-50 text-emerald-700 hover:bg-emerald-100'"
                                    class="rounded-lg px-3 py-1.5 font-medium transition shrink-0 border border-emerald-200">
                                    Disetujui
                                </button>
                                <button type="button" @click="activeTab = 'ditolak'"
                                    :class="activeTab === 'ditolak' ? 'bg-rose-600 text-white font-bold' : 'bg-rose-50 text-rose-700 hover:bg-rose-100'"
                                    class="rounded-lg px-3 py-1.5 font-medium transition shrink-0 border border-rose-200">
                                    Ditolak
                                </button>
                                <button type="button" @click="activeTab = 'revisi'"
                                    :class="activeTab === 'revisi' ? 'bg-amber-500 text-white font-bold' : 'bg-amber-50 text-amber-800 hover:bg-amber-100'"
                                    class="rounded-lg px-3 py-1.5 font-medium transition shrink-0 border border-amber-200">
                                    Revisi
                                </button>
                                <button type="button" @click="activeTab = 'informasi'"
                                    :class="activeTab === 'informasi' ? 'bg-blue-600 text-white font-bold' : 'bg-blue-50 text-blue-700 hover:bg-blue-100'"
                                    class="rounded-lg px-3 py-1.5 font-medium transition shrink-0 border border-blue-200">
                                    Informasi
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
                                                <span :class="item.badgeColor" class="rounded-md px-2 py-0.5 text-[11px] font-bold border">
                                                    <span x-text="item.categoryLabel"></span>
                                                </span>

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
                                        <span :class="selectedNotification.badgeColor" class="rounded-lg px-2.5 py-1 text-xs font-bold border">
                                            <span x-text="selectedNotification.categoryLabel"></span>
                                        </span>

                                        <template x-if="selectedNotification.priority === 'high'">
                                            <x-raksa.feedback.badge variant="danger">Prioritas Tinggi</x-raksa.feedback.badge>
                                        </template>
                                    </div>

                                    <span class="text-xs text-slate-400 font-medium" x-text="selectedNotification.fullTime"></span>
                                </div>

                                <h1 class="text-xl sm:text-2xl font-extrabold text-raksa-text leading-snug" x-text="selectedNotification.title"></h1>
                                
                                <p class="text-xs text-raksa-neutral">
                                    Pengirim: <strong class="font-bold text-raksa-text" x-text="selectedNotification.sender"></strong>
                                </p>
                            </div>

                            {{-- Description Content --}}
                            <div class="space-y-2">
                                <h2 class="text-xs font-bold uppercase tracking-wider text-raksa-neutral">RINCIAN PEMBERITAHUAN VERIFIKASI</h2>
                                <p class="text-sm text-raksa-text leading-relaxed" x-text="selectedNotification.description"></p>
                            </div>

                            {{-- Detail Informasi Terkait Card --}}
                            <div class="rounded-xl bg-raksa-surface p-5 border border-slate-200/60 space-y-4">
                                <h3 class="text-xs font-bold uppercase tracking-wider text-raksa-neutral pb-2 border-b border-slate-200/50">
                                    INFORMASI TERKAIT SENSUS FISIK
                                </h3>

                                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs sm:text-sm">
                                    <div>
                                        <dt class="text-xs font-medium text-raksa-neutral">Surveyor Lapangan</dt>
                                        <dd class="font-bold text-raksa-text mt-0.5" x-text="selectedNotification.details.surveyor"></dd>
                                    </div>

                                    <div>
                                        <dt class="text-xs font-medium text-raksa-neutral">Nama Barang Aset</dt>
                                        <dd class="font-bold text-raksa-text mt-0.5" x-text="selectedNotification.details.itemName"></dd>
                                    </div>

                                    <div>
                                        <dt class="text-xs font-medium text-raksa-neutral">QR ID / Kode Registrasi</dt>
                                        <dd class="font-mono font-bold text-raksa-primary mt-0.5" x-text="selectedNotification.details.qrId"></dd>
                                    </div>

                                    <div>
                                        <dt class="text-xs font-medium text-raksa-neutral">Lokasi Penempatan Fisik</dt>
                                        <dd class="font-semibold text-raksa-text mt-0.5" x-text="selectedNotification.details.location"></dd>
                                    </div>

                                    <div>
                                        <dt class="text-xs font-medium text-raksa-neutral">Status Verifikasi Admin</dt>
                                        <dd class="font-bold text-emerald-700 mt-0.5" x-text="selectedNotification.details.condition"></dd>
                                    </div>

                                    <div>
                                        <dt class="text-xs font-medium text-raksa-neutral">Catatan Tambahan</dt>
                                        <dd class="font-semibold text-raksa-text mt-0.5" x-text="selectedNotification.details.note"></dd>
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
