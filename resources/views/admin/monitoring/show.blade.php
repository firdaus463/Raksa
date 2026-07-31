<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Detail Monitoring - RAKSA</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

@php
    $assetDetails = [
        ['label' => 'Nama Barang', 'value' => 'Laptop Lenovo ThinkPad T14'],
        ['label' => 'Kategori', 'value' => 'Laptop'],
        ['label' => 'Merk', 'value' => 'Lenovo'],
        ['label' => 'Tipe', 'value' => 'ThinkPad T14 Gen 4'],
        ['label' => 'Serial Number', 'value' => 'SN-T14-2026-0001'],
        ['label' => 'Tanggal Beli', 'value' => '21 Januari 2026'],
    ];
@endphp

<body class="bg-raksa-background font-sans text-raksa-text antialiased" x-data="{ collapsed: false, mobileSidebarOpen: false }">
    <div class="flex min-h-screen">
        <x-raksa.layout.sidebar />

        <div class="flex min-w-0 flex-1 flex-col">
            <x-raksa.layout.navbar title="Detail Monitoring" />

            <main class="flex-1 space-y-6 p-4 sm:p-6 laptop:p-8">
                <x-raksa.navigation.page-header
                    title="Verifikasi Monitoring"
                    description="Verifikasi hasil monitoring aset yang dikirim oleh surveyor."
                >
                    <x-slot:breadcrumb>
                        <x-raksa.navigation.breadcrumb :items="[
                            ['label' => 'Dashboard', 'url' => route('dashboard')],
                            ['label' => 'Monitoring Sensus', 'url' => route('monitoring.index')],
                            ['label' => 'Detail Monitoring'],
                        ]" />
                    </x-slot:breadcrumb>

                    <x-slot:actions>
                        <x-raksa.action.button variant="secondary" href="{{ route('monitoring.index') }}">
                            <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span>Kembali</span>
                        </x-raksa.action.button>

                        <x-raksa.action.button variant="danger" type="button">
                            <span>Reject Monitoring</span>
                        </x-raksa.action.button>

                        <x-raksa.action.button variant="primary" type="button">
                            <span>Approve Monitoring</span>
                        </x-raksa.action.button>
                    </x-slot:actions>
                </x-raksa.navigation.page-header>

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-12 lg:items-start">
                    <div class="space-y-6 lg:col-span-5">
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm sm:p-6">
                            <header class="mb-5 flex items-center gap-3 border-b border-slate-100 pb-4">
                                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-raksa-primary/10 text-raksa-primary" aria-hidden="true">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                        <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <div>
                                    <h2 class="text-lg font-bold text-raksa-text">Informasi Barang</h2>
                                    <p class="text-xs text-raksa-neutral">Identitas aset yang sedang diverifikasi</p>
                                </div>
                            </header>

                            <dl class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                                <div class="sm:col-span-2">
                                    <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">QR ID</dt>
                                    <dd class="mt-1 inline-flex rounded-lg bg-raksa-primary-light/40 px-3 py-1 font-mono text-sm font-bold text-raksa-primary">QR-2026-00125</dd>
                                </div>

                                @foreach ($assetDetails as $detail)
                                    <div>
                                        <dt class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">{{ $detail['label'] }}</dt>
                                        <dd class="mt-1 text-sm font-semibold leading-6 text-raksa-text">{{ $detail['value'] }}</dd>
                                    </div>
                                @endforeach
                            </dl>
                        </article>

                        <article class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm sm:p-6">
                            <header class="mb-5 flex items-center gap-3 border-b border-slate-100 pb-4">
                                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-raksa-accent/10 text-raksa-accent-dark" aria-hidden="true">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <div>
                                    <h2 class="text-lg font-bold text-raksa-text">Pemegang Barang</h2>
                                    <p class="text-xs text-raksa-neutral">Pegawai dan unit kerja pengguna aset</p>
                                </div>
                            </header>

                            <div class="flex items-center gap-4">
                                <span class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-raksa-surface-alt text-sm font-bold text-raksa-text">BY</span>
                                <div class="min-w-0">
                                    <p class="font-bold text-raksa-text">Bu Yully</p>
                                    <p class="mt-1 text-sm text-raksa-neutral">NIP: 19860512 201001 2 001</p>
                                    <x-raksa.feedback.badge variant="default" class="mt-2">SEKRETARIAT</x-raksa.feedback.badge>
                                </div>
                            </div>
                        </article>

                        <article class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm sm:p-6">
                            <header class="mb-5 flex items-center gap-3 border-b border-slate-100 pb-4">
                                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-sky-100 text-sky-700" aria-hidden="true">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                        <path d="M9 11l3 3L22 4M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <div>
                                    <h2 class="text-lg font-bold text-raksa-text">Monitoring Surveyor</h2>
                                    <p class="text-xs text-raksa-neutral">Waktu dan petugas pelaporan lapangan</p>
                                </div>
                            </header>

                            <div class="space-y-3">
                                <div class="rounded-xl bg-raksa-surface p-4">
                                    <p class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">Surveyor</p>
                                    <p class="mt-1 font-bold text-raksa-text">Rian Hidayat, S.T.</p>
                                </div>
                                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                                    <div class="rounded-xl bg-raksa-surface p-4">
                                        <p class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">Tanggal</p>
                                        <p class="mt-1 font-bold text-raksa-text">25 Juli 2026</p>
                                    </div>
                                    <div class="rounded-xl bg-raksa-surface p-4">
                                        <p class="text-xs font-semibold uppercase tracking-wider text-raksa-neutral">Waktu</p>
                                        <p class="mt-1 font-bold text-raksa-text">09.15 WIB</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="space-y-6 lg:col-span-7">
                        <article class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm sm:p-6">
                            <header class="mb-5 flex items-center gap-3 border-b border-slate-100 pb-4">
                                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-raksa-primary/10 text-raksa-primary" aria-hidden="true">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                        <path d="M7 7h10M7 17h10M9 5l-4 7 4 7M15 5l4 7-4 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <div>
                                    <h2 class="text-lg font-bold text-raksa-text">Perbandingan Kondisi Barang</h2>
                                    <p class="text-xs text-raksa-neutral">Kondisi data aset saat ini dan usulan surveyor</p>
                                </div>
                            </header>

                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-[1fr_auto_1fr] sm:items-center">
                                <div class="rounded-2xl border border-emerald-200 bg-emerald-50 p-5 text-center">
                                    <p class="text-xs font-semibold uppercase tracking-wider text-emerald-800">Kondisi Saat Ini</p>
                                    <p class="mt-3 text-xl font-bold text-emerald-700">Baik</p>
                                </div>
                                <div class="hidden text-slate-300 sm:block" aria-hidden="true">
                                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none">
                                        <path d="M5 12h14m-6-6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="rounded-2xl border border-amber-200 bg-amber-50 p-5 text-center">
                                    <p class="text-xs font-semibold uppercase tracking-wider text-amber-900">Diusulkan Surveyor</p>
                                    <p class="mt-3 text-xl font-bold text-amber-800">Rusak Ringan</p>
                                </div>
                            </div>

                            <div class="mt-5 rounded-xl border border-raksa-primary-light bg-raksa-primary-light/30 p-4 text-sm leading-6 text-raksa-primary">
                                Apabila monitoring disetujui, kondisi barang pada Data Aset akan diperbarui secara otomatis.
                            </div>
                        </article>

                        <article class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm sm:p-6">
                            <header class="mb-5 flex items-center gap-3 border-b border-slate-100 pb-4">
                                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-raksa-neutral" aria-hidden="true">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                        <path d="M7 8h10M7 12h7m-7 4h5M5 3h14a2 2 0 012 2v14l-4-3H5a2 2 0 01-2-2V5a2 2 0 012-2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <div>
                                    <h2 class="text-lg font-bold text-raksa-text">Catatan Surveyor</h2>
                                    <p class="text-xs text-raksa-neutral">Keterangan kondisi aset dari lapangan</p>
                                </div>
                            </header>

                            <blockquote class="rounded-xl bg-raksa-surface p-4 text-sm italic leading-6 text-raksa-neutral">
                                "Layar mengalami retak pada bagian kanan akibat terjatuh. Laptop masih dapat digunakan namun disarankan dilakukan penggantian LCD."
                            </blockquote>
                        </article>

                        <article class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm sm:p-6">
                            <header class="mb-5 flex items-center gap-3 border-b border-slate-100 pb-4">
                                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700" aria-hidden="true">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                        <path d="M4 16l4-4a2 2 0 012.8 0l1.2 1.2 2.2-2.2a2 2 0 012.8 0L20 14M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2zM8 8h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <div>
                                    <h2 class="text-lg font-bold text-raksa-text">Foto</h2>
                                    <p class="text-xs text-raksa-neutral">Dokumentasi kondisi barang dari surveyor</p>
                                </div>
                            </header>

                            <div class="grid grid-cols-2 gap-3 sm:grid-cols-4">
                                @for ($photo = 1; $photo <= 4; $photo++)
                                    <button type="button" class="group aspect-square overflow-hidden rounded-xl border border-slate-200 bg-raksa-surface transition hover:border-raksa-primary focus:outline-none focus:ring-2 focus:ring-raksa-primary/15" aria-label="Lihat foto kondisi barang {{ $photo }}">
                                        <span class="flex h-full w-full flex-col items-center justify-center gap-2 text-slate-400 transition group-hover:bg-raksa-primary/5 group-hover:text-raksa-primary">
                                            <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                <path d="M4 16l4-4a2 2 0 012.8 0l1.2 1.2 2.2-2.2a2 2 0 012.8 0L20 14M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2zM8 8h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <span class="text-xs font-semibold">Foto {{ $photo }}</span>
                                        </span>
                                    </button>
                                @endfor
                            </div>
                        </article>

                        <article class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm sm:p-6">
                            <header class="mb-5 flex items-center gap-3 border-b border-slate-100 pb-4">
                                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-raksa-primary/10 text-raksa-primary" aria-hidden="true">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 20h9M16.5 3.5a2.1 2.1 0 013 3L7 19l-4 1 1-4L16.5 3.5z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <div>
                                    <h2 class="text-lg font-bold text-raksa-text">Verifikasi Admin</h2>
                                    <p class="text-xs text-raksa-neutral">Catatan dan keputusan verifikasi monitoring</p>
                                </div>
                            </header>

                            <x-raksa.form.textarea
                                label="Catatan Admin"
                                name="admin_note"
                                rows="5"
                                placeholder="Tuliskan catatan verifikasi di sini..."
                            />

                            <div class="mt-5 flex flex-col gap-3 sm:flex-row sm:justify-end">
                                <x-raksa.action.button variant="danger" type="button" class="sm:order-1">
                                    <span>Reject Monitoring</span>
                                </x-raksa.action.button>
                                <x-raksa.action.button variant="primary" type="button" class="sm:order-2">
                                    <span>Approve Monitoring</span>
                                </x-raksa.action.button>
                            </div>
                        </article>
                    </div>
                </div>
            </main>

            <footer class="mt-auto border-t border-raksa-border/40 bg-raksa-primary px-6 py-4 text-white">
                <div class="flex flex-col items-center justify-between gap-2 text-xs font-medium text-blue-100 sm:flex-row">
                    <p>COPYRIGHT &copy; 2026 Dinas Komunikasi dan Informatika Kota Bandung</p>
                    <p class="font-semibold text-white">RAKSA v1.0.0</p>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
