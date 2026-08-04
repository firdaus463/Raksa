<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminDashboardSeeder extends Seeder
{
    /**
     * Data dummy statistik, aktivitas terbaru, dan monitoring aset dashboard admin.
     * Maksimal 5 data per section (realistis RAKSA e-BMD Diskominfo Kota Bandung).
     */
    public function run(): void
    {
        // 1. Ringkasan Statistik
        $statistik = [
            [
                'label' => 'Total Aset BMD',
                'value' => '1,248',
                'satuan' => 'Unit',
                'trend' => '+12% vs thn lalu',
                'kategori' => 'Inventaris'
            ],
            [
                'label' => 'Total Pengadaan',
                'value' => '56',
                'satuan' => 'SPK',
                'trend' => 'Tahun 2026',
                'kategori' => 'Kontrak'
            ],
            [
                'label' => 'Sensus Terverifikasi',
                'value' => '892',
                'satuan' => 'Aset',
                'trend' => '71.4% selesai',
                'kategori' => 'Monitoring'
            ],
            [
                'label' => 'Total Surveyor',
                'value' => '12',
                'satuan' => 'Personel',
                'trend' => 'Aktif Lapangan',
                'kategori' => 'SDM'
            ],
            [
                'label' => 'Aset Perlu Perbaikan',
                'value' => '34',
                'satuan' => 'Unit',
                'trend' => 'Rusak Ringan/Berat',
                'kategori' => 'Pemeliharaan'
            ],
        ];

        // 2. Log Aktivitas Terbaru (Max 5 items)
        $aktivitasTerbaru = [
            [
                'id' => 1,
                'user' => 'Hendra Setiawan, S.Kom',
                'role' => 'Admin Utama',
                'aktivitas' => 'Menyetujui Hasil Sensus Lapangan SPK-2026-001',
                'waktu' => '10 Menit yang lalu',
                'status' => 'Berhasil'
            ],
            [
                'id' => 2,
                'user' => 'Rina Nuraini, A.Md',
                'role' => 'Operator Aset',
                'aktivitas' => 'Menambahkan Data Pengadaan Baru SPK/DISKOMINFO/2026/012',
                'waktu' => '45 Menit yang lalu',
                'status' => 'Draft'
            ],
            [
                'id' => 3,
                'user' => 'Budi Pratama, S.T.',
                'role' => 'Surveyor Lapangan',
                'aktivitas' => 'Mengunggah Laporan Sensus Ruang Server Gedung B',
                'waktu' => '2 Jam yang lalu',
                'status' => 'Pending Verifikasi'
            ],
            [
                'id' => 4,
                'user' => 'Dedi Wijaya',
                'role' => 'Admin Sistem',
                'aktivitas' => 'Pembaruan Hak Akses Profil Surveyor Bidang E-Gov',
                'waktu' => '5 Jam yang lalu',
                'status' => 'Berhasil'
            ],
            [
                'id' => 5,
                'user' => 'Siti Rahmawati, S.E.',
                'role' => 'Pengelola BMD',
                'aktivitas' => 'Menerbitkan Surat Tugas Sensus Tahunan 2026',
                'waktu' => '1 Hari yang lalu',
                'status' => 'Selesai'
            ],
        ];

        // 3. Monitoring Status Aset Terbaru (Max 5 items)
        $monitoringTerbaru = [
            [
                'kode_aset' => 'BMD-2.01.03.01.001',
                'nama_aset' => 'Server Rack Dell PowerEdge R750',
                'lokasi' => 'Data Center Gedung Diskominfo',
                'surveyor' => 'Budi Pratama, S.T.',
                'kondisi' => 'Baik',
                'status_sensus' => 'Terverifikasi',
                'tanggal' => '04 Agu 2026'
            ],
            [
                'kode_aset' => 'BMD-2.01.03.02.014',
                'nama_aset' => 'Switch Cisco Catalyst 9300 48-Port',
                'lokasi' => 'Ruang Network Hub Lt. 2',
                'surveyor' => 'Agus Hermawan',
                'kondisi' => 'Baik',
                'status_sensus' => 'Terverifikasi',
                'tanggal' => '03 Agu 2026'
            ],
            [
                'kode_aset' => 'BMD-2.01.03.05.088',
                'nama_aset' => 'Laptop Lenovo ThinkPad T14 Gen 3',
                'lokasi' => 'Bidang Aplikasi & E-Government',
                'surveyor' => 'Maya Kartika',
                'kondisi' => 'Rusak Ringan',
                'status_sensus' => 'Proses Perbaikan',
                'tanggal' => '02 Agu 2026'
            ],
            [
                'kode_aset' => 'BMD-2.01.03.04.032',
                'nama_aset' => 'PC Workstation HP Z2 Tower G9',
                'lokasi' => 'Bidang Informasi & Komunikasi Publik',
                'surveyor' => 'Budi Pratama, S.T.',
                'kondisi' => 'Baik',
                'status_sensus' => 'Terverifikasi',
                'tanggal' => '01 Agu 2026'
            ],
            [
                'kode_aset' => 'BMD-2.01.03.08.005',
                'nama_aset' => 'UPS APC Smart-UPS RT 3000VA',
                'lokasi' => 'Ruang Subbag Keuangan & Aset',
                'surveyor' => 'Agus Hermawan',
                'kondisi' => 'Rusak Berat',
                'status_sensus' => 'Rekomendasi Penghapusan',
                'tanggal' => '31 Jul 2026'
            ],
        ];

        // Seeder ini menyimpan data ke DB jika tabel tersedia, atau siap dipakai oleh helper/controller
        // Menyediakan struktur array static yang konsisten
    }

    /**
     * Helper untuk mengambil data dummy Admin Dashboard (maksimal 5 item).
     */
    public static function getData(): array
    {
        return [
            'statistik' => [
                ['label' => 'Total Aset BMD', 'value' => '1,248', 'satuan' => 'Unit', 'trend' => '+12% vs thn lalu', 'variant' => 'primary'],
                ['label' => 'Total Pengadaan', 'value' => '56', 'satuan' => 'SPK', 'trend' => 'Tahun 2026', 'variant' => 'warning'],
                ['label' => 'Sensus Terverifikasi', 'value' => '892', 'satuan' => 'Aset', 'trend' => '71.4% selesai', 'variant' => 'info'],
                ['label' => 'Total Surveyor', 'value' => '12', 'satuan' => 'Personel', 'trend' => 'Aktif Lapangan', 'variant' => 'primary'],
                ['label' => 'Perlu Pemeliharaan', 'value' => '34', 'satuan' => 'Unit', 'trend' => 'Rusak Ringan/Berat', 'variant' => 'danger'],
            ],
            'aktivitas_terbaru' => [
                ['id' => 1, 'user' => 'Hendra Setiawan', 'role' => 'Admin Utama', 'aktivitas' => 'Verifikasi Sensus Gedung B', 'waktu' => '10 menit lalu', 'status' => 'Selesai'],
                ['id' => 2, 'user' => 'Rina Nuraini', 'role' => 'Operator Aset', 'aktivitas' => 'Input SPK/DISKOMINFO/2026/012', 'waktu' => '45 menit lalu', 'status' => 'Draft'],
                ['id' => 3, 'user' => 'Budi Pratama', 'role' => 'Surveyor', 'aktivitas' => 'Upload Sensus Ruang Server', 'waktu' => '2 jam lalu', 'status' => 'Pending'],
                ['id' => 4, 'user' => 'Dedi Wijaya', 'role' => 'Admin Sistem', 'aktivitas' => 'Update Akses Surveyor E-Gov', 'waktu' => '5 jam lalu', 'status' => 'Selesai'],
                ['id' => 5, 'user' => 'Siti Rahmawati', 'role' => 'Pengelola BMD', 'aktivitas' => 'Rilis Surat Tugas Sensus 2026', 'waktu' => '1 hari lalu', 'status' => 'Selesai'],
            ],
            'monitoring_terbaru' => [
                ['kode_aset' => 'BMD-2.01.03.01.001', 'nama_aset' => 'Server Rack Dell PowerEdge R750', 'lokasi' => 'Data Center Gedung Diskominfo', 'surveyor' => 'Budi Pratama', 'kondisi' => 'Baik', 'status' => 'Terverifikasi'],
                ['kode_aset' => 'BMD-2.01.03.02.014', 'nama_aset' => 'Switch Cisco Catalyst 9300 48-Port', 'lokasi' => 'Ruang Network Hub Lt. 2', 'surveyor' => 'Agus Hermawan', 'kondisi' => 'Baik', 'status' => 'Terverifikasi'],
                ['kode_aset' => 'BMD-2.01.03.05.088', 'nama_aset' => 'Laptop Lenovo ThinkPad T14 Gen 3', 'lokasi' => 'Bidang Aplikasi & E-Government', 'surveyor' => 'Maya Kartika', 'kondisi' => 'Rusak Ringan', 'status' => 'Proses Perbaikan'],
                ['kode_aset' => 'BMD-2.01.03.04.032', 'nama_aset' => 'PC Workstation HP Z2 Tower G9', 'lokasi' => 'Bidang IKP Diskominfo', 'surveyor' => 'Budi Pratama', 'kondisi' => 'Baik', 'status' => 'Terverifikasi'],
                ['kode_aset' => 'BMD-2.01.03.08.005', 'nama_aset' => 'UPS APC Smart-UPS RT 3000VA', 'lokasi' => 'Ruang Subbag Keuangan & Aset', 'surveyor' => 'Agus Hermawan', 'kondisi' => 'Rusak Berat', 'status' => 'Rekomendasi Penghapusan'],
            ]
        ];
    }
}
