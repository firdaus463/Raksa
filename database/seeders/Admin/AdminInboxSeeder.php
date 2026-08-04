<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Seeder;

class AdminInboxSeeder extends Seeder
{
    /**
     * Data dummy Inbox / Notifikasi Admin RAKSA e-BMD.
     * Maksimal 5 data per halaman (realistis RAKSA e-BMD Diskominfo Kota Bandung).
     */
    public function run(): void
    {
        // Standar Seeder Laravel
    }

    /**
     * Helper untuk mengakses data dummy inbox admin (maksimal 5 item).
     */
    public static function getData(): array
    {
        return [
            'inbox_list' => [
                [
                    'id' => 1,
                    'pengirim' => 'Budi Pratama (Surveyor)',
                    'subjek' => 'Pengajuan Verifikasi Sensus Ruang Server Gedung B',
                    'kategori' => 'Verifikasi Sensus',
                    'pesan' => 'Mohon verifikasi laporan sensus fisik untuk 10 unit Server Dell PowerEdge yang telah diselesaikan hari ini.',
                    'waktu' => '10 Menit lalu',
                    'waktu_formatted' => '04 Agu 2026, 08:30 WIB',
                    'is_read' => false,
                    'priority' => 'Tinggi',
                    'priority_variant' => 'danger'
                ],
                [
                    'id' => 2,
                    'pengirim' => 'Rina Nuraini (Operator Aset)',
                    'subjek' => 'Pembaruan Data SPK/DISKOMINFO/2026/012',
                    'kategori' => 'Pengadaan',
                    'pesan' => 'Dokumen BAST pengadaan Switch Cisco telah diunggah dan siap diverifikasi oleh Admin BMD.',
                    'waktu' => '1 Jam lalu',
                    'waktu_formatted' => '04 Agu 2026, 07:30 WIB',
                    'is_read' => false,
                    'priority' => 'Sedang',
                    'priority_variant' => 'warning'
                ],
                [
                    'id' => 3,
                    'pengirim' => 'Sistem RAKSA e-BMD',
                    'subjek' => 'Peringatan Pemeliharaan Aset Berkala Q3 2026',
                    'kategori' => 'Sistem Automatic',
                    'pesan' => 'Terdapat 34 unit aset kategori IT yang memasuki masa garansi & pemeliharaan rutin.',
                    'waktu' => '3 Jam lalu',
                    'waktu_formatted' => '04 Agu 2026, 05:15 WIB',
                    'is_read' => true,
                    'priority' => 'Sedang',
                    'priority_variant' => 'info'
                ],
                [
                    'id' => 4,
                    'pengirim' => 'Maya Kartika (Surveyor)',
                    'subjek' => 'Laporan Aset Rusak Ringan di Bidang E-Gov',
                    'kategori' => 'Laporan Lapangan',
                    'pesan' => 'Ditemukan 1 unit Laptop Lenovo ThinkPad T14 dengan kendala pada layar LCD.',
                    'waktu' => '1 Hari lalu',
                    'waktu_formatted' => '03 Agu 2026, 14:20 WIB',
                    'is_read' => true,
                    'priority' => 'Rendah',
                    'priority_variant' => 'default'
                ],
                [
                    'id' => 5,
                    'pengirim' => 'Siti Rahmawati (Pengelola BMD)',
                    'subjek' => 'Jadwal Rapat Rekonsiliasi Aset Diskominfo',
                    'kategori' => 'Pengumuman',
                    'pesan' => 'Rapat rekonsiliasi aset semester I akan dilaksanakan pada hari Jumat di Ruang Rapat Utomo.',
                    'waktu' => '2 Hari lalu',
                    'waktu_formatted' => '02 Agu 2026, 09:00 WIB',
                    'is_read' => true,
                    'priority' => 'Biasa',
                    'priority_variant' => 'default'
                ],
            ]
        ];
    }
}
