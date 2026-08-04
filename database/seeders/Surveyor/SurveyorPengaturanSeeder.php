<?php

namespace Database\Seeders\Surveyor;

use Illuminate\Database\Seeder;

class SurveyorPengaturanSeeder extends Seeder
{
    /**
     * Data dummy Pengaturan & Profil Surveyor RAKSA e-BMD.
     * Maksimal 5 data per section (realistis RAKSA e-BMD Diskominfo Kota Bandung).
     */
    public function run(): void
    {
        // Standar Seeder Laravel
    }

    /**
     * Helper untuk mengakses data dummy pengaturan surveyor.
     */
    public static function getData(): array
    {
        return [
            'profil_surveyor' => [
                'nama' => 'Budi Pratama, S.T.',
                'nip' => '19900822 201503 1 005',
                'email' => 'budi.pratama@bandung.go.id',
                'role' => 'Surveyor Lapangan',
                'bidang' => 'Bidang Infrastruktur TI',
                'telepon' => '0813-9876-5432',
                'wilayah_tugas' => 'Gedung Diskominfo & Command Center Kota Bandung',
            ],
            'preferensi_aplikasi' => [
                ['key' => 'auto_sync', 'label' => 'Sinkronisasi Otomatis', 'status' => true, 'keterangan' => 'Unggah data sensus otomatis saat terhubung ke Wi-Fi'],
                ['key' => 'gps_tagging', 'label' => 'Geotagging Lokasi Sensus', 'status' => true, 'keterangan' => 'Sertakan koordinat GPS pada foto bukti sensus fisik'],
                ['key' => 'high_res_photo', 'label' => 'Kualitas Foto Tinggi', 'status' => false, 'keterangan' => 'Simpan foto dengan resolusi tinggi (menggunakan penyimpanan lebih besar)'],
                ['key' => 'push_notification', 'label' => 'Notifikasi Tugas Baru', 'status' => true, 'keterangan' => 'Terima notifikasi instan ketika diberi tugas sensus baru'],
                ['key' => 'dark_mode', 'label' => 'Tampilan Mode Gelap', 'status' => false, 'keterangan' => 'Aktifkan mode gelap saat pengisian sensus malam hari'],
            ]
        ];
    }
}
