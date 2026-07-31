<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kelola User - RAKSA</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

@php
    $summaryCards = [
        [
            'label' => 'TOTAL SURVEYOR',
            'value' => '10',
            'description' => 'Terdaftar di seluruh OPD',
            'change' => '+12%',
            'trend' => 'up',
            'variant' => 'primary',
            'icon' => 'users',
        ],
        [
            'label' => 'SURVEYOR AKTIF',
            'value' => '8',
            'description' => 'Status aktif mengakses sistem',
            'change' => '+5%',
            'trend' => 'up',
            'variant' => 'success',
            'icon' => 'active',
        ],
        [
            'label' => 'SURVEYOR NONAKTIF',
            'value' => '2',
            'description' => 'Akses telah dibekukan',
            'change' => '-2%',
            'trend' => 'down',
            'variant' => 'danger',
            'icon' => 'inactive',
        ],
    ];

    $users = [
        [
            'name' => 'Riyan Hidayat, S.T.',
            'nip' => '19920815 201801 1 004',
            'username' => 'rian_h_surveyor',
            'department' => 'Sekretariat - Umum',
            'status' => 'Aktif',
            'initials' => 'RH',
            'enabled' => true,
        ],
        [
            'name' => 'Siti Aminah, M.T.',
            'nip' => '19900512 201503 2 002',
            'username' => 'sitiaminah_90',
            'department' => 'Sekretariat - Umum',
            'status' => 'Aktif',
            'initials' => 'SA',
            'enabled' => true,
        ],
        [
            'name' => 'Andi Wijaya',
            'nip' => '19780824 200501 1 004',
            'username' => 'andiwijaya_78',
            'department' => 'Bidang Persandian',
            'status' => 'Nonaktif',
            'initials' => 'AW',
            'enabled' => false,
        ],
        [
            'name' => 'Rina Kartika, S.T.',
            'nip' => '19951130 201901 2 005',
            'username' => 'rina_kartika',
            'department' => 'Bidang TIK - Aplikasi',
            'status' => 'Aktif',
            'initials' => 'RK',
            'enabled' => true,
        ],
        [
            'name' => 'Eko Prasetyo',
            'nip' => '19820415 200802 1 003',
            'username' => 'ekopra_82',
            'department' => 'Bidang Statistik',
            'status' => 'Aktif',
            'initials' => 'EP',
            'enabled' => true,
        ],
    ];
@endphp

<body class="bg-raksa-background font-sans text-raksa-text antialiased" x-data="{ collapsed: false, mobileSidebarOpen: false }">
    <div class="flex min-h-screen">
        <x-raksa.layout.sidebar />

        <div class="flex min-w-0 flex-1 flex-col">
            <x-raksa.layout.navbar title="Kelola User" />

            <main class="flex-1 space-y-6 p-4 sm:p-6 laptop:p-8">
                <x-raksa.navigation.page-header
                    title="Kelola User"
                    description="Kelola akun surveyor yang memiliki akses ke sistem RAKSA."
                >
                    <x-slot:breadcrumb>
                        <x-raksa.navigation.breadcrumb :items="[
                            ['label' => 'Dashboard', 'url' => route('dashboard')],
                            ['label' => 'Kelola User'],
                        ]" />
                    </x-slot:breadcrumb>

                    <x-slot:actions>
                        <x-raksa.action.button variant="primary" href="{{ route('user.create') }}">
                            <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M16 21v-2a4 4 0 00-4-4H7a4 4 0 00-4 4v2M20 8v6M23 11h-6M9.5 11a4 4 0 100-8 4 4 0 000 8z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span>Tambah Surveyor</span>
                        </x-raksa.action.button>
                    </x-slot:actions>
                </x-raksa.navigation.page-header>

                <section class="grid grid-cols-1 gap-4 md:grid-cols-3 sm:gap-5" aria-label="Ringkasan user">
                    @foreach ($summaryCards as $card)
                        <x-raksa.card.statistic-card
                            :label="$card['label']"
                            :value="$card['value']"
                            :change="$card['change']"
                            :trend="$card['trend']"
                            :variant="$card['variant']"
                        >
                            <x-slot:icon>
                                @if ($card['icon'] === 'users')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M16 21v-2a4 4 0 00-4-4H7a4 4 0 00-4 4v2M17 11a4 4 0 100-8M23 21v-2a4 4 0 00-3-3.87M9.5 11a4 4 0 100-8 4 4 0 000 8z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                @elseif ($card['icon'] === 'active')
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M9 12l2 2 4-4M12 22a10 10 0 100-20 10 10 0 000 20z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                @else
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M15 9l-6 6m0-6l6 6M12 22a10 10 0 100-20 10 10 0 000 20z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                @endif
                            </x-slot:icon>
                        </x-raksa.card.statistic-card>
                    @endforeach
                </section>

                <section class="rounded-2xl border border-slate-200/80 bg-white p-4 shadow-sm sm:p-5" aria-label="Filter direktori pengguna">
                    <form class="grid grid-cols-1 gap-4 lg:grid-cols-12 lg:items-end" action="#" method="GET">
                        <div class="lg:col-span-5">
                            <x-raksa.form.search-bar
                                name="search"
                                placeholder="Cari nama, NIP, atau username..."
                                class="max-w-none"
                            />
                        </div>

                        <div class="lg:col-span-3">
                            <x-raksa.form.form-select
                                label="Filter Status"
                                name="status"
                                :options="[
                                    '' => 'Semua Status',
                                    'aktif' => 'Aktif',
                                    'nonaktif' => 'Nonaktif',
                                ]"
                                class="!py-2.5"
                            />
                        </div>

                        <div class="lg:col-span-3">
                            <x-raksa.form.form-select
                                label="Bidang"
                                name="department"
                                :options="[
                                    '' => 'Semua Bidang',
                                    'sekretariat' => 'Sekretariat - Umum',
                                    'persandian' => 'Bidang Persandian',
                                    'tik' => 'Bidang TIK - Aplikasi',
                                    'statistik' => 'Bidang Statistik',
                                ]"
                                class="!py-2.5"
                            />
                        </div>

                        <button type="button" class="inline-flex h-11 items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 text-sm font-semibold text-raksa-primary transition hover:bg-raksa-surface focus:outline-none focus:ring-2 focus:ring-raksa-primary/15 lg:col-span-1" title="Export direktori">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M12 3v12m0 0l-4-4m4 4l4-4M5 21h14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span class="sr-only">Export</span>
                        </button>
                    </form>
                </section>

                <section class="overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-sm" aria-label="Direktori surveyor">
                    <div class="border-b border-slate-200/80 px-5 py-4">
                        <h2 class="text-base font-bold text-raksa-text sm:text-lg">Direktori Surveyor</h2>
                        <p class="mt-1 text-xs text-raksa-neutral">Daftar pengguna lapangan yang dapat mengakses modul sensus aset.</p>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[1040px] divide-y divide-slate-200 text-left text-sm">
                            <thead class="bg-raksa-surface-alt text-xs font-bold uppercase tracking-wider text-raksa-neutral">
                                <tr>
                                    <th scope="col" class="px-5 py-4">Foto</th>
                                    <th scope="col" class="px-5 py-4">Nama Lengkap</th>
                                    <th scope="col" class="px-5 py-4">NIP</th>
                                    <th scope="col" class="px-5 py-4">Username</th>
                                    <th scope="col" class="px-5 py-4">Bidang / Unit Kerja</th>
                                    <th scope="col" class="px-5 py-4">Status</th>
                                    <th scope="col" class="px-5 py-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 bg-white">
                                @foreach ($users as $user)
                                    <tr class="transition hover:bg-raksa-surface/70" x-data="{ enabled: @js($user['enabled']) }">
                                        <td class="px-5 py-4">
                                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 bg-raksa-surface-alt text-xs font-bold text-raksa-text">
                                                {{ $user['initials'] }}
                                            </span>
                                        </td>
                                        <td class="px-5 py-4 font-semibold text-raksa-text">{{ $user['name'] }}</td>
                                        <td class="px-5 py-4 font-mono text-xs text-raksa-neutral">{{ $user['nip'] }}</td>
                                        <td class="px-5 py-4 text-raksa-neutral">{{ $user['username'] }}</td>
                                        <td class="px-5 py-4 text-raksa-neutral">{{ $user['department'] }}</td>
                                        <td class="px-5 py-4">
                                            @if ($user['status'] === 'Aktif')
                                                <x-raksa.feedback.badge variant="success">
                                                    <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                                    Aktif
                                                </x-raksa.feedback.badge>
                                            @else
                                                <x-raksa.feedback.badge variant="default">
                                                    <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-slate-400"></span>
                                                    Nonaktif
                                                </x-raksa.feedback.badge>
                                            @endif
                                        </td>
                                        <td class="px-5 py-4">
                                            <div class="flex items-center justify-center gap-1.5">
                                                <a href="{{ route('user.show') }}" class="inline-flex h-9 w-9 items-center justify-center rounded-xl text-slate-400 transition hover:bg-raksa-primary/10 hover:text-raksa-primary focus:outline-none focus:ring-2 focus:ring-raksa-primary/15" title="Lihat pengguna" aria-label="Lihat pengguna {{ $user['name'] }}">
                                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                        <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke="currentColor" stroke-width="2" />
                                                        <path d="M2.5 12C3.7 7.9 7.5 5 12 5s8.3 2.9 9.5 7c-1.2 4.1-5 7-9.5 7s-8.3-2.9-9.5-7z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </a>
                                                <a href="{{ route('user.edit') }}" class="inline-flex h-9 w-9 items-center justify-center rounded-xl text-slate-400 transition hover:bg-amber-50 hover:text-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500/20" title="Edit pengguna" aria-label="Edit pengguna {{ $user['name'] }}">
                                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                        <path d="M12 20h9M16.5 3.5a2.1 2.1 0 013 3L7 19l-4 1 1-4L16.5 3.5z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </a>
                                                <button type="button" class="inline-flex h-9 w-9 items-center justify-center rounded-xl text-slate-400 transition hover:bg-rose-50 hover:text-rose-700 focus:outline-none focus:ring-2 focus:ring-rose-500/20" title="Hapus pengguna" aria-label="Hapus pengguna {{ $user['name'] }}">
                                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                        <path d="M19 7l-.9 12.1A2 2 0 0116.1 21H7.9a2 2 0 01-2-1.9L5 7m5 4v6m4-6v6M4 7h16m-5 0V4H9v3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </button>
                                                <button type="button" role="switch" :aria-checked="enabled.toString()" @click="enabled = !enabled" class="relative ml-1 inline-flex h-7 w-12 shrink-0 rounded-full transition focus:outline-none focus:ring-2 focus:ring-raksa-primary/20 focus:ring-offset-2" :class="enabled ? 'bg-raksa-primary' : 'bg-slate-400'" aria-label="Ubah status akses {{ $user['name'] }}">
                                                    <span class="inline-block h-6 w-6 translate-y-0.5 rounded-full bg-white shadow transition" :class="enabled ? 'translate-x-5' : 'translate-x-0.5'"></span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="flex flex-col items-center justify-between gap-4 border-t border-slate-200/80 bg-raksa-surface-alt/40 px-5 py-4 text-xs text-raksa-neutral sm:flex-row">
                        <p>Menampilkan <strong class="font-semibold text-raksa-text">1 - 5</strong> dari <strong class="font-semibold text-raksa-text">10</strong> surveyor</p>

                        <nav class="inline-flex items-center gap-1" aria-label="Pagination user">
                            <button type="button" disabled class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 text-slate-300">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M15 19l-7-7 7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg>
                            </button>
                            <button type="button" class="h-8 w-8 rounded-lg bg-raksa-primary text-xs font-bold text-white">1</button>
                            <button type="button" class="h-8 w-8 rounded-lg text-xs font-semibold text-raksa-text transition hover:bg-slate-100">2</button>
                            <button type="button" class="h-8 w-8 rounded-lg text-xs font-semibold text-raksa-text transition hover:bg-slate-100">3</button>
                            <span class="px-1 text-slate-400">...</span>
                            <button type="button" class="h-8 w-9 rounded-lg text-xs font-semibold text-raksa-text transition hover:bg-slate-100">250</button>
                            <button type="button" class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 text-raksa-text transition hover:bg-slate-100">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M9 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg>
                            </button>
                        </nav>
                    </div>
                </section>
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
