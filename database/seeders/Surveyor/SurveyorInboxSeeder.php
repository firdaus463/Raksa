<?php

namespace Database\Seeders\Surveyor;

use Illuminate\Database\Seeder;

class SurveyorInboxSeeder extends Seeder
{
    /**
     * Data dummy Inbox / Notifikasi Surveyor RAKSA e-BMD.
     * Maksimal 5 data per halaman (realistis RAKSA e-BMD Diskominfo Kota Bandung).
     */
    public function run(): void
    {
        // Standar Seeder Laravel
    }

    /**
     * Helper untuk mengakses data dummy inbox surveyor (maksimal 5 item).
     */
    public static function getData(): array
    {
        return [
            'inbox_list' => [
                [
                    'id' => 1,
                    'pengirim' => 'Hendra Setiawan (Admin Utama)',
                    'subjek' => 'Penugasan Sensus Baru Ruang Data Center Lt. 3',
                    'kategori' => 'Tugas Baru',
                    'pesan' => 'Anda mendapatkan tugas sensus fisik 5 unit perangkat server & storage di Data Center Diskominfo.',
                    'waktu' => '15 Menit lalu',
                    'waktu_formatted' => '04 Agu 2026, 08:25 WIB',
                    'is_read' => false,
                    'priority' => 'Tinggi',
                    'priority_variant' => 'danger'
                ],
                [
                    'id' => 2,
                    'pengirim' => 'Sistem RAKSA e-BMD',
                    'subjek' => 'Sensus SNS-2026-070 Telah Disetujui',
                    'kategori' => 'Verifikasi',
                    'pesan' => 'Laporan sensus fisik Server Dell PowerEdge telah terverifikasi dan disetujui oleh pengelola BMD.',
                    'waktu' => '2 Jam lalu',
                    'waktu_formatted' => '04 Agu 2026, 06:30 WIB',
                    'is_read' => false,
                    'priority' => 'Biasa',
                    'priority_variant' => 'info'
                ],
                [
                    'id' => 3,
                    'pengirim' => 'Rina Nuraini (Operator Aset)',
                    'subjek' => 'Revisi Foto Label QR-Code Sensus SNS-2026-074',
                    'kategori' => 'Revisi Sensus',
                    'pesan' => 'Foto stiker label QR-Code pada UPS APC kurang jelas, mohon unggah ulang foto jarak dekat.',
                    'waktu' => '1 Hari lalu',
                    'waktu_formatted' => '03 Agu 2026, 15:40 WIB',
                    'is_read' => true,
                    'priority' => 'Sedang',
                    'priority_variant' => 'warning'
                ],
                [
                    'id' => 4,
                    'pengirim' => 'Hendra Setiawan (Admin Utama)',
                    'subjek' => 'Pengingat Batas Akhir Sensus Semester I',
                    'kategori' => 'Pengumuman',
                    'pesan' => 'Harap selesaikan seluruh sisa tugas sensus lapangan sebelum tanggal 15 Agustus 2026.',
                    'waktu' => '2 Hari lalu',
                    'waktu_formatted' => '02 Agu 2026, 10:00 WIB',
                    'is_read' => true,
                    'priority' => 'Biasa',
                    'priority_variant' => 'default'
                ],
                [
                    'id' => 5,
                    'pengirim' => 'Sistem RAKSA e-BMD',
                    'subjek' => 'Pembaruan Aplikasi Sensus Mobile v2.1',
                    'kategori' => 'Sistem',
                    'pesan' => 'Fitur pemindaian QR-Code telah diperbarui untuk mendukung pemindaian offline.',
                    'waktu' => '3 Hari lalu',
                    'waktu_formatted' => '01 Agu 2026, 09:15 WIB',
                    'is_read' => true,
                    'priority' => 'Rendah',
                    'priority_variant' => 'default'
                ],
            ]
        ];
    }
}
