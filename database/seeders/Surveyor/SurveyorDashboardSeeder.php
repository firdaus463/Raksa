<?php

namespace Database\Seeders\Surveyor;

use Illuminate\Database\Seeder;

class SurveyorDashboardSeeder extends Seeder
{
    /**
     * Data dummy Dashboard Surveyor RAKSA e-BMD.
     * Maksimal 5 data per section (realistis RAKSA e-BMD Diskominfo Kota Bandung).
     */
    public function run(): void
    {
        // Standar Seeder Laravel
    }

    /**
     * Helper untuk mengakses data dummy dashboard surveyor (maksimal 5 item).
     */
    public static function getData(): array
    {
        return [
            'statistik' => [
                ['label' => 'Tugas Sensus Hari Ini', 'value' => '5', 'satuan' => 'Lokasi', 'trend' => 'Jadwal Aktif', 'variant' => 'primary'],
                ['label' => 'Sensus Selesai', 'value' => '48', 'satuan' => 'Aset', 'trend' => 'Bulan Ini', 'variant' => 'success'],
                ['label' => 'Pending Verifikasi Admin', 'value' => '6', 'satuan' => 'Laporan', 'trend' => 'Menunggu Review', 'variant' => 'warning'],
                ['label' => 'Total Riwayat Sensus', 'value' => '184', 'satuan' => 'Aset', 'trend' => 'Tahun 2026', 'variant' => 'info'],
                ['label' => 'Aset Perlu Re-Sensus', 'value' => '2', 'satuan' => 'Unit', 'trend' => 'Revisi Data', 'variant' => 'danger'],
            ],
            'tugas_harian' => [
                [
                    'id' => 1,
                    'kode_sensus' => 'SNS-2026-081',
                    'kode_aset' => 'BMD-2.01.03.01.005',
                    'nama_aset' => 'Server Storage SAN Dell Unity 380',
                    'lokasi' => 'Ruang Data Center Lt. 3 Diskominfo',
                    'tenggat' => '04 Agu 2026, 14:00 WIB',
                    'status' => 'Belum Dimulai',
                    'status_variant' => 'warning',
                    'prioritas' => 'Tinggi'
                ],
                [
                    'id' => 2,
                    'kode_sensus' => 'SNS-2026-082',
                    'kode_aset' => 'BMD-2.01.03.02.022',
                    'nama_aset' => 'Router Core MikroTik CCR2116-12G-4S+',
                    'lokasi' => 'Ruang Network NOC Gedung A',
                    'tenggat' => '04 Agu 2026, 16:00 WIB',
                    'status' => 'Belum Dimulai',
                    'status_variant' => 'warning',
                    'prioritas' => 'Sedang'
                ],
                [
                    'id' => 3,
                    'kode_sensus' => 'SNS-2026-083',
                    'kode_aset' => 'BMD-2.01.03.04.019',
                    'nama_aset' => 'PC All-in-One Apple iMac 24 M3',
                    'lokasi' => 'Studio Media & Video Command Center',
                    'tenggat' => '05 Agu 2026, 10:00 WIB',
                    'status' => 'Sedang Berlangsung',
                    'status_variant' => 'info',
                    'prioritas' => 'Sedang'
                ],
                [
                    'id' => 4,
                    'kode_sensus' => 'SNS-2026-084',
                    'kode_aset' => 'BMD-2.01.03.05.102',
                    'nama_aset' => 'Laptop ASUS ExpertBook B9400',
                    'lokasi' => 'Ruang Kepala Dinas Diskominfo',
                    'tenggat' => '05 Agu 2026, 13:00 WIB',
                    'status' => 'Belum Dimulai',
                    'status_variant' => 'warning',
                    'prioritas' => 'Biasa'
                ],
                [
                    'id' => 5,
                    'kode_sensus' => 'SNS-2026-085',
                    'kode_aset' => 'BMD-2.01.03.07.011',
                    'nama_aset' => 'Kamera Video Sony FX3 Cinema Line',
                    'lokasi' => 'Bidang IKP (Ruang Peliputan)',
                    'tenggat' => '06 Agu 2026, 11:00 WIB',
                    'status' => 'Belum Dimulai',
                    'status_variant' => 'warning',
                    'prioritas' => 'Biasa'
                ],
            ]
        ];
    }
}
