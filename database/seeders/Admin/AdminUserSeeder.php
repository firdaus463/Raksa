<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Data dummy Pengguna / Surveyor (Admin Manajemen User).
     * Maksimal 5 data per halaman (realistis RAKSA e-BMD Diskominfo Kota Bandung).
     */
    public function run(): void
    {
        // Standar Seeder Laravel
    }

    /**
     * Helper untuk mengakses data dummy pengguna admin (maksimal 5 item).
     */
    public static function getData(): array
    {
        return [
            'statistik' => [
                'total_user' => '24',
                'admin_sistem' => '3',
                'pengelola_bmd' => '5',
                'surveyor_aktif' => '12',
                'user_nonaktif' => '4',
            ],
            'user_list' => [
                [
                    'id' => 1,
                    'nama' => 'Hendra Setiawan, S.Kom',
                    'nip' => '19850315 201001 1 002',
                    'email' => 'hendra.setiawan@bandung.go.id',
                    'role' => 'Admin Sistem',
                    'role_variant' => 'primary',
                    'bidang' => 'Subbagian Umum & Kepegawaian',
                    'telepon' => '0812-2345-6789',
                    'status' => 'Aktif',
                    'status_variant' => 'success'
                ],
                [
                    'id' => 2,
                    'nama' => 'Budi Pratama, S.T.',
                    'nip' => '19900822 201503 1 005',
                    'email' => 'budi.pratama@bandung.go.id',
                    'role' => 'Surveyor',
                    'role_variant' => 'info',
                    'bidang' => 'Bidang Infrastruktur TI',
                    'telepon' => '0813-9876-5432',
                    'status' => 'Aktif',
                    'status_variant' => 'success'
                ],
                [
                    'id' => 3,
                    'nama' => 'Rina Nuraini, A.Md',
                    'nip' => '19931104 201902 2 008',
                    'email' => 'rina.nuraini@bandung.go.id',
                    'role' => 'Operator Aset',
                    'role_variant' => 'warning',
                    'bidang' => 'Subbagian Keuangan & Aset',
                    'telepon' => '0857-1122-3344',
                    'status' => 'Aktif',
                    'status_variant' => 'success'
                ],
                [
                    'id' => 4,
                    'nama' => 'Maya Kartika, S.T.',
                    'nip' => '19910517 201604 2 003',
                    'email' => 'maya.kartika@bandung.go.id',
                    'role' => 'Surveyor',
                    'role_variant' => 'info',
                    'bidang' => 'Bidang E-Government',
                    'telepon' => '0821-4455-6677',
                    'status' => 'Aktif',
                    'status_variant' => 'success'
                ],
                [
                    'id' => 5,
                    'nama' => 'Agus Hermawan, S.Sos',
                    'nip' => '19880211 201212 1 004',
                    'email' => 'agus.hermawan@bandung.go.id',
                    'role' => 'Surveyor',
                    'role_variant' => 'info',
                    'bidang' => 'Bidang Informasi & Komunikasi Publik',
                    'telepon' => '0819-7788-9900',
                    'status' => 'Nonaktif',
                    'status_variant' => 'danger'
                ],
            ]
        ];
    }
}
