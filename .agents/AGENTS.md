# Project Rules - RAKSA e-BMD

## Aturan Data Dummy
1. **Tidak Meletakkan Data Dummy di Blade/View**: Jangan meletakkan data dummy secara langsung di file Blade/View.
2. **Pemisahan via Seeder / Factory / Controller**: Seluruh data dummy dipisahkan menggunakan Seeder, Factory, atau dikirimkan via Controller (misal Collection dummy jika backend belum sepenuhnya terhubung) sesuai struktur project Laravel.
3. **View Hanya Menampilkan Data**: File View hanya menerima dan menampilkan data yang dikirim dari Controller.
4. **Maksimal 5 Data Dummy**: Jumlah data dummy maksimal 5 data untuk setiap halaman (tabel, notifikasi, monitoring, pengadaan, surveyor, dll.) agar project tetap ringan dan mudah dibaca.
5. **Realistis & Konsisten**: Gunakan data dummy yang realistis, konsisten dengan konteks aplikasi RAKSA e-BMD (Barang Milik Daerah / Diskominfo Kota Bandung), dan mudah diganti dengan data database nantinya.
6. **Hindari Hardcode di Blade**: Hindari hardcode string, array, maupun object di dalam file Blade kecuali placeholder sederhana.
