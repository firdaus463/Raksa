<?php

namespace Database\Seeders\Surveyor;

use Illuminate\Database\Seeder;

class SurveyorSensusSeeder extends Seeder
{
    /**
     * Data dummy Sensus Lapangan Surveyor RAKSA e-BMD.
     * Maksimal 5 data per halaman (realistis RAKSA e-BMD Diskominfo Kota Bandung).
     */
    public function run(): void
    {
        // Standar Seeder Laravel
    }

    /**
     * Helper untuk mengakses data dummy sensus lapangan surveyor (maksimal 5 item).
     */
    public static function getData(): array
    {
        return [
            'sensus_list' => [
                [
                    'id' => 1,
                    'kode_sensus' => 'SNS-2026-081',
                    'kode_aset' => 'BMD-2.01.03.01.005',
                    'nama_aset' => 'Server Storage SAN Dell Unity 380',
                    'nup' => '0001',
                    'lokasi' => 'Ruang Data Center Lt. 3 Diskominfo',
                    'kondisi_saat_ini' => 'Baik',
                    'catatan_fisik' => 'Fisik utuh, suhu ruangan server terjaga 19C, stiker QR-Code BMD terpasang jelas.',
                    'foto_placeholder' => 'https://via.placeholder.com/300x200?text=Server+Dell+Unity+380',
                    'status_sensus' => 'Siap Disensus',
                    'status_variant' => 'info'
                ],
                [
                    'id' => 2,
                    'kode_sensus' => 'SNS-2026-082',
                    'kode_aset' => 'BMD-2.01.03.02.022',
                    'nama_aset' => 'Router Core MikroTik CCR2116-12G-4S+',
                    'nup' => '0003',
                    'lokasi' => 'Ruang Network NOC Gedung A',
                    'kondisi_saat_ini' => 'Baik',
                    'catatan_fisik' => 'Fungsi port 10G aktif normal, catu daya beroperasi tanpa kendala.',
                    'foto_placeholder' => 'https://via.placeholder.com/300x200?text=MikroTik+Router+Core',
                    'status_sensus' => 'Siap Disensus',
                    'status_variant' => 'info'
                ],
                [
                    'id' => 3,
                    'kode_sensus' => 'SNS-2026-083',
                    'kode_aset' => 'BMD-2.01.03.04.019',
                    'nama_aset' => 'PC All-in-One Apple iMac 24 M3',
                    'nup' => '0002',
                    'lokasi' => 'Studio Media & Video Command Center',
                    'kondisi_saat_ini' => 'Baik',
                    'catatan_fisik' => 'Digunakan harian untuk editing video humas, tidak ada kendala fisik.',
                    'foto_placeholder' => 'https://via.placeholder.com/300x200?text=Apple+iMac+24+M3',
                    'status_sensus' => 'Dalam Pengisian',
                    'status_variant' => 'warning'
                ],
                [
                    'id' => 4,
                    'kode_sensus' => 'SNS-2026-084',
                    'kode_aset' => 'BMD-2.01.03.05.102',
                    'nama_aset' => 'Laptop ASUS ExpertBook B9400',
                    'nup' => '0001',
                    'lokasi' => 'Ruang Kepala Dinas Diskominfo',
                    'kondisi_saat_ini' => 'Rusak Ringan',
                    'catatan_fisik' => 'Baterai mengalami penurunan daya cepat, fisik unit mulus.',
                    'foto_placeholder' => 'https://via.placeholder.com/300x200?text=Laptop+ASUS+ExpertBook',
                    'status_sensus' => 'Draft Simpan',
                    'status_variant' => 'default'
                ],
                [
                    'id' => 5,
                    'kode_sensus' => 'SNS-2026-085',
                    'kode_aset' => 'BMD-2.01.03.07.011',
                    'nama_aset' => 'Kamera Video Sony FX3 Cinema Line',
                    'nup' => '0004',
                    'lokasi' => 'Bidang IKP (Ruang Peliputan)',
                    'kondisi_saat_ini' => 'Baik',
                    'catatan_fisik' => 'Lensa 24-70mm GM mulus, perlengkapan audio rig lengkap.',
                    'foto_placeholder' => 'https://via.placeholder.com/300x200?text=Kamera+Sony+FX3',
                    'status_sensus' => 'Siap Disensus',
                    'status_variant' => 'info'
                ],
            ]
        ];
    }
}
