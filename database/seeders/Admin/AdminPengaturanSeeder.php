<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Seeder;

class AdminPengaturanSeeder extends Seeder
{
    /**
     * Data dummy Pengaturan & Profil Admin RAKSA e-BMD.
     * Maksimal 5 data item per kriteria (realistis RAKSA e-BMD Diskominfo Kota Bandung).
     */
    public function run(): void
    {
        // Standar Seeder Laravel
    }

    /**
     * Helper untuk mengakses data dummy pengaturan admin.
     */
    public static function getData(): array
    {
        return [
            'profil_admin' => [
                'nama' => 'Hendra Setiawan, S.Kom',
                'nip' => '19850315 201001 1 002',
                'email' => 'hendra.setiawan@bandung.go.id',
                'jabatan' => 'Kepala Subbagian Umum & Kepegawaian',
                'instansi' => 'Dinas Komunikasi dan Informatika Kota Bandung',
                'telepon' => '0812-2345-6789',
                'alamat_kantor' => 'Jl. Wastukencana No. 2, Babakan Ciamis, Sumur Bandung, Kota Bandung',
            ],
            'parameter_instansi' => [
                ['key' => 'nama_instansi', 'label' => 'Nama Instansi', 'value' => 'Diskominfo Kota Bandung'],
                ['key' => 'kode_skpd', 'label' => 'Kode SKPD BMD', 'value' => '2.01.03.001'],
                ['key' => 'tahun_anggaran', 'label' => 'Tahun Anggaran Berjalan', 'value' => '2026'],
                ['key' => 'email_official', 'label' => 'Email Dinas Official', 'value' => 'diskominfo@bandung.go.id'],
                ['key' => 'periode_sensus', 'label' => 'Periode Sensus Aktif', 'value' => 'Semester I - 2026'],
            ],
            'preferensi_notifikasi' => [
                ['id' => 1, 'nama' => 'Notifikasi Pengadaan Baru', 'status' => true, 'keterangan' => 'Kirim email saat SPK baru diinput'],
                ['id' => 2, 'nama' => 'Notifikasi Laporan Sensus', 'status' => true, 'keterangan' => 'Kirim notifikasi real-time saat surveyor selesai sensus'],
                ['id' => 3, 'nama' => 'Peringatan Pemeliharaan Aset', 'status' => true, 'keterangan' => 'Notifikasi otomatis untuk aset yang mendekati batas pemeliharaan'],
                ['id' => 4, 'nama' => 'Ringkasan Laporan Mingguan', 'status' => false, 'keterangan' => 'Kirim rekap mingguan status BMD ke email'],
                ['id' => 5, 'nama' => 'Log Aktivitas Keamanan', 'status' => true, 'keterangan' => 'Log notifikasi untuk percobaan login berulang'],
            ]
        ];
    }
}
