<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Seeder;

class AdminPengadaanSeeder extends Seeder
{
    /**
     * Data dummy Pengadaan Admin (Riwayat Pengadaan, Detail SPK, Data Aset Pengadaan).
     * Maksimal 5 data per halaman (realistis RAKSA e-BMD Diskominfo Kota Bandung).
     */
    public function run(): void
    {
        // Standar Seeder Laravel
    }

    /**
     * Helper untuk mengakses data dummy pengadaan admin (maksimal 5 item).
     */
    public static function getData(): array
    {
        return [
            'statistik' => [
                'total_pengadaan' => '500',
                'total_nilai_kontrak' => 'Rp 42.8 M',
                'pengadaan_tahun_ini' => '156',
                'total_nilai_tahun_ini' => 'Rp 12.4 M',
            ],
            'pengadaan_list' => [
                [
                    'id' => 1,
                    'nomor_spk' => 'SPK/DISKOMINFO/2026/001',
                    'tanggal_spk' => '2026-01-21',
                    'tanggal_spk_formatted' => '21 Jan 2026',
                    'nama_perusahaan' => 'PT. Indonesia Bangun Semesta',
                    'nilai_kontrak' => 1450000000,
                    'nilai_kontrak_formatted' => 'Rp 1.450.000.000',
                    'jumlah_aset' => 42,
                    'status' => 'Selesai',
                    'status_variant' => 'success',
                    'kategori' => 'Pengadaan Komputer & Network'
                ],
                [
                    'id' => 2,
                    'nomor_spk' => 'SPK/DISKOMINFO/2026/012',
                    'tanggal_spk' => '2026-02-02',
                    'tanggal_spk_formatted' => '02 Feb 2026',
                    'nama_perusahaan' => 'CV. Media Informatika Nusantara',
                    'nilai_kontrak' => 842200000,
                    'nilai_kontrak_formatted' => 'Rp 842.200.000',
                    'jumlah_aset' => 15,
                    'status' => 'Aktif',
                    'status_variant' => 'info',
                    'kategori' => 'Perangkat Multimedia & Broadcaster'
                ],
                [
                    'id' => 3,
                    'nomor_spk' => 'SPK/DISKOMINFO/2026/025',
                    'tanggal_spk' => '2026-03-10',
                    'tanggal_spk_formatted' => '10 Mar 2026',
                    'nama_perusahaan' => 'PT. Global Trans Mandiri',
                    'nilai_kontrak' => 2100000000,
                    'nilai_kontrak_formatted' => 'Rp 2.100.000.000',
                    'jumlah_aset' => 120,
                    'status' => 'Draft',
                    'status_variant' => 'default',
                    'kategori' => 'Kabel Fiber Optik & Infrastruktur'
                ],
                [
                    'id' => 4,
                    'nomor_spk' => 'SPK/DISKOMINFO/2026/041',
                    'tanggal_spk' => '2026-03-25',
                    'tanggal_spk_formatted' => '25 Mar 2026',
                    'nama_perusahaan' => 'CV. Jaya Abadi Konstruksi',
                    'nilai_kontrak' => 350500000,
                    'nilai_kontrak_formatted' => 'Rp 350.500.000',
                    'jumlah_aset' => 8,
                    'status' => 'Aktif',
                    'status_variant' => 'info',
                    'kategori' => 'Pengadaan UPS & Power Supply'
                ],
                [
                    'id' => 5,
                    'nomor_spk' => 'SPK/DISKOMINFO/2026/055',
                    'tanggal_spk' => '2026-04-05',
                    'tanggal_spk_formatted' => '05 Apr 2026',
                    'nama_perusahaan' => 'PT. Sentra Solusi Digital',
                    'nilai_kontrak' => 1120000000,
                    'nilai_kontrak_formatted' => 'Rp 1.120.000.000',
                    'jumlah_aset' => 64,
                    'status' => 'Selesai',
                    'status_variant' => 'success',
                    'kategori' => 'Perangkat Server Data Center'
                ],
            ],
            'detail_aset_pengadaan' => [
                [
                    'kode_barang' => 'BMD-2.01.03.01.001',
                    'nama_barang' => 'Server Rack Dell PowerEdge R750',
                    'merek_tipe' => 'Dell / PowerEdge R750',
                    'jumlah' => 10,
                    'harga_satuan' => 'Rp 120.000.000',
                    'kondisi' => 'Baik'
                ],
                [
                    'kode_barang' => 'BMD-2.01.03.02.014',
                    'nama_barang' => 'Switch Cisco Catalyst 9300 48-Port',
                    'merek_tipe' => 'Cisco / Catalyst 9300',
                    'jumlah' => 15,
                    'harga_satuan' => 'Rp 45.000.000',
                    'kondisi' => 'Baik'
                ],
                [
                    'kode_barang' => 'BMD-2.01.03.05.088',
                    'nama_barang' => 'Laptop Lenovo ThinkPad T14 Gen 3',
                    'merek_tipe' => 'Lenovo / ThinkPad T14',
                    'jumlah' => 10,
                    'harga_satuan' => 'Rp 22.000.000',
                    'kondisi' => 'Baik'
                ],
                [
                    'kode_barang' => 'BMD-2.01.03.04.032',
                    'nama_barang' => 'PC Workstation HP Z2 Tower G9',
                    'merek_tipe' => 'HP / Z2 Tower G9',
                    'jumlah' => 5,
                    'harga_satuan' => 'Rp 35.000.000',
                    'kondisi' => 'Baik'
                ],
                [
                    'kode_barang' => 'BMD-2.01.03.08.005',
                    'nama_barang' => 'UPS APC Smart-UPS RT 3000VA',
                    'merek_tipe' => 'APC / Smart-UPS RT 3000VA',
                    'jumlah' => 2,
                    'harga_satuan' => 'Rp 17.500.000',
                    'kondisi' => 'Baik'
                ],
            ]
        ];
    }
}
