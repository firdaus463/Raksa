<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Edit Surveyor - RAKSA</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-raksa-background font-sans text-raksa-text antialiased" x-data="{ collapsed: false, mobileSidebarOpen: false }">
    <div class="flex min-h-screen">
        <x-raksa.layout.sidebar />

        <div class="flex min-w-0 flex-1 flex-col">
            <x-raksa.layout.navbar title="Edit Surveyor" />

            <main class="flex-1 space-y-6 p-4 sm:p-6 laptop:p-8">
                <x-raksa.navigation.page-header
                    title="Edit Surveyor"
                    description="Perbarui informasi akun dan status akses surveyor."
                >
                    <x-slot:breadcrumb>
                        <x-raksa.navigation.breadcrumb :items="[
                            ['label' => 'Dashboard', 'url' => route('dashboard')],
                            ['label' => 'Kelola User', 'url' => route('user.index')],
                            ['label' => 'Edit Surveyor'],
                        ]" />
                    </x-slot:breadcrumb>
                </x-raksa.navigation.page-header>

                <form action="#" method="POST" class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm sm:p-6">
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <x-raksa.form.form-input label="Nama Lengkap" name="name" value="Riyan Hidayat, S.T." />
                        <x-raksa.form.form-input label="NIP" name="nip" value="19920815 201801 1 004" />
                        <x-raksa.form.form-input label="Username" name="username" value="rian_h_surveyor" />
                        <x-raksa.form.form-select
                            label="Bidang / Unit Kerja"
                            name="department"
                            selected="sekretariat"
                            :options="[
                                'sekretariat' => 'Sekretariat - Umum',
                                'persandian' => 'Bidang Persandian',
                                'tik' => 'Bidang TIK - Aplikasi',
                                'statistik' => 'Bidang Statistik',
                            ]"
                        />
                        <x-raksa.form.form-input label="Email" name="email" type="email" value="riyan.hidayat@bandung.go.id" />
                        <x-raksa.form.form-select
                            label="Status"
                            name="status"
                            selected="aktif"
                            :options="[
                                'aktif' => 'Aktif',
                                'nonaktif' => 'Nonaktif',
                            ]"
                        />
                    </div>

                    <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:justify-end">
                        <x-raksa.action.button variant="outline" href="{{ route('user.index') }}">
                            <span>Batal</span>
                        </x-raksa.action.button>
                        <x-raksa.action.button variant="primary" type="submit">
                            <span>Simpan Perubahan</span>
                        </x-raksa.action.button>
                    </div>
                </form>
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
