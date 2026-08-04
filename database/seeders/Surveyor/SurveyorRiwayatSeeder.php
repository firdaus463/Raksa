<?php

namespace Database\Seeders\Surveyor;

use Illuminate\Database\Seeder;

class SurveyorRiwayatSeeder extends Seeder
{
    /**
     * Data dummy Riwayat Sensus Surveyor RAKSA e-BMD.
     * Maksimal 5 data per halaman (realistis RAKSA e-BMD Diskominfo Kota Bandung).
     */
    public function run(): void
    {
        // Standar Seeder Laravel
    }

    /**
     * Helper untuk mengakses data dummy riwayat sensus surveyor (maksimal 5 item).
     */
    public static function getData(): array
    {
        return [
            'riwayat_list' => [
                [
                    'id' => 1,
                    'kode_sensus' => 'SNS-2026-070',
                    'tanggal_sensus' => '2026-08-01',
                    'tanggal_formatted' => '01 Agu 2026',
                    'kode_aset' => 'BMD-2.01.03.01.001',
                    'nama_aset' => 'Server Rack Dell PowerEdge R750',
                    'lokasi' => 'Data Center Gedung Diskominfo',
                    'hasil_kondisi' => 'Baik',
                    'kondisi_variant' => 'success',
                    'status_verifikasi' => 'Disetujui Admin',
                    'status_variant' => 'success'
                ],
                [
                    'id' => 2,
                    'kode_sensus' => 'SNS-2026-071',
                    'tanggal_sensus' => '2026-08-01',
                    'tanggal_formatted' => '01 Agu 2026',
                    'kode_aset' => 'BMD-2.01.03.02.014',
                    'nama_aset' => 'Switch Cisco Catalyst 9300 48-Port',
                    'lokasi' => 'Ruang Network Hub Lt. 2',
                    'hasil_kondisi' => 'Baik',
                    'kondisi_variant' => 'success',
                    'status_verifikasi' => 'Disetujui Admin',
                    'status_variant' => 'success'
                ],
                [
                    'id' => 3,
                    'kode_sensus' => 'SNS-2026-072',
                    'tanggal_sensus' => '2026-08-02',
                    'tanggal_formatted' => '02 Agu 2026',
                    'kode_aset' => 'BMD-2.01.03.05.088',
                    'nama_aset' => 'Laptop Lenovo ThinkPad T14 Gen 3',
                    'lokasi' => 'Bidang Aplikasi & E-Government',
                    'hasil_kondisi' => 'Rusak Ringan',
                    'kondisi_variant' => 'warning',
                    'status_verifikasi' => 'Menunggu Verifikasi',
                    'status_variant' => 'warning'
                ],
                [
                    'id' => 4,
                    'kode_sensus' => 'SNS-2026-073',
                    'tanggal_sensus' => '2026-08-03',
                    'tanggal_formatted' => '03 Agu 2026',
                    'kode_aset' => 'BMD-2.01.03.04.032',
                    'nama_aset' => 'PC Workstation HP Z2 Tower G9',
                    'lokasi' => 'Bidang IKP Diskominfo',
                    'hasil_kondisi' => 'Baik',
                    'kondisi_variant' => 'success',
                    'status_verifikasi' => 'Disetujui Admin',
                    'status_variant' => 'success'
                ],
                [
                    'id' => 5,
                    'kode_sensus' => 'SNS-2026-074',
                    'tanggal_sensus' => '2026-08-03',
                    'tanggal_formatted' => '03 Agu 2026',
                    'kode_aset' => 'BMD-2.01.03.08.005',
                    'nama_aset' => 'UPS APC Smart-UPS RT 3000VA',
                    'lokasi' => 'Ruang Subbag Keuangan & Aset',
                    'hasil_kondisi' => 'Rusak Berat',
                    'kondisi_variant' => 'danger',
                    'status_verifikasi' => 'Perlu Klarifikasi',
                    'status_variant' => 'danger'
                ],
            ]
        ];
    }
}
