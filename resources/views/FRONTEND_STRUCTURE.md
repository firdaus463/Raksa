# Struktur Frontend RAKSA

Dokumen ini menjelaskan pemisahan file frontend agar slicing Blade tetap rapi dan tidak bercampur dengan komponen bawaan Laravel Breeze.

## Prinsip Utama

- `resources/views/auth`, `resources/views/profile`, `resources/views/layouts/app.blade.php`, `resources/views/layouts/guest.blade.php`, dan komponen Breeze di root `resources/views/components` dipertahankan untuk autentikasi.
- Komponen khusus RAKSA berada di `resources/views/components/raksa`.
- Halaman role dipisahkan berdasarkan slice fitur:
  - `resources/views/admin`
  - `resources/views/surveyor`
  - `resources/views/landing`
- Jangan ubah route, controller, model, middleware, migration, database, atau business logic saat slicing UI.

## Komponen Breeze

Komponen berikut tetap berada di root `resources/views/components` karena masih dipakai oleh Breeze:

- `application-logo`
- `auth-session-status`
- `danger-button`
- `dropdown`
- `dropdown-link`
- `input-error`
- `input-label`
- `modal`
- `nav-link`
- `primary-button`
- `responsive-nav-link`
- `secondary-button`
- `text-input`

Contoh pemakaian:

```blade
<x-guest-layout>
    <x-input-label for="email" value="Email" />
    <x-text-input id="email" name="email" />
</x-guest-layout>
```

## Komponen RAKSA

Komponen RAKSA menggunakan namespace `raksa`.

### Layout

Lokasi: `resources/views/components/raksa/layout`

- `sidebar`
- `navbar`
- `footer`

Contoh:

```blade
<x-raksa.layout.sidebar :items="$sidebarItems" />
<x-raksa.layout.navbar title="Dashboard" />
<x-raksa.layout.footer />
```

### Navigation

Lokasi: `resources/views/components/raksa/navigation`

- `breadcrumb`
- `page-header`

Contoh:

```blade
<x-raksa.navigation.page-header title="Data Aset" />
```

### Card

Lokasi: `resources/views/components/raksa/card`

- `statistic-card`
- `info-card`
- `action-card`
- `qr-card`
- `profile-card`

Contoh:

```blade
<x-raksa.card.statistic-card label="Total Aset" value="120" />
```

### Data

Lokasi: `resources/views/components/raksa/data`

- `table`
- `table-header`
- `pagination`

Contoh:

```blade
<x-raksa.data.table>
    <x-raksa.data.table-header :columns="['Nama Aset', 'Lokasi', 'Kondisi']" />
</x-raksa.data.table>
```

### Form

Lokasi: `resources/views/components/raksa/form`

- `filter`
- `search-bar`
- `form-input`
- `form-select`
- `textarea`
- `upload-image`

Contoh:

```blade
<x-raksa.form.form-input name="nama_barang" label="Nama Barang" />
<x-raksa.form.form-select name="kondisi" label="Kondisi" :options="$kondisiOptions" />
```

### Feedback

Lokasi: `resources/views/components/raksa/feedback`

- `badge`
- `empty-state`
- `loading-state`
- `notification-item`
- `timeline`

Contoh:

```blade
<x-raksa.feedback.badge variant="success">Disetujui</x-raksa.feedback.badge>
<x-raksa.feedback.empty-state title="Belum ada data" />
```

### Action

Lokasi: `resources/views/components/raksa/action`

- `button`

Contoh:

```blade
<x-raksa.action.button type="submit">Simpan</x-raksa.action.button>
```

## Struktur Slice Halaman

```txt
resources/views
├── landing
├── admin
│   ├── dashboard
│   ├── pengadaan
│   ├── aset
│   ├── monitoring
│   ├── user
│   ├── inbox
│   └── pengaturan
└── surveyor
    ├── dashboard
    ├── sensus
    ├── riwayat
    ├── inbox
    └── pengaturan
```

Setiap fitur disimpan di foldernya sendiri agar slicing Figma bisa dikerjakan bertahap tanpa membuat satu file Blade menjadi terlalu besar.
