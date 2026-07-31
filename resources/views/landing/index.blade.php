<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RAKSA - Sistem Informasi Manajemen Barang Milik Daerah</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="overflow-x-hidden bg-white font-sans text-raksa-text antialiased">
@php
    $loginUrl = Route::has('login') ? route('login') : '#';

    $navItems = [
        ['label' => 'Beranda', 'href' => '#beranda'],
        ['label' => 'Fitur', 'href' => '#fitur'],
        ['label' => 'Statistik', 'href' => '#statistik'],
        ['label' => 'Visi & Misi', 'href' => '#visi-misi'],
        ['label' => 'Panduan', 'href' => '#panduan'],
        ['label' => 'Kontak', 'href' => '#kontak'],
    ];

    $adminFeatures = [
        'Pengadaan & Aset',
        'Sensus QR Monitoring',
        'Verifikasi Surveyor',
        'Pakta Integritas',
        'Ekspor Laporan Excel',
        'Sistem Inbox Terpadu',
    ];

    $surveyorFeatures = [
        'Scan QR Asset',
        'Verifikasi Fisik',
        'Form Sensus Digital',
        'Riwayat Penggunaan',
        'Notifikasi Status',
        'Upload Dokumentasi',
    ];

    $metrics = [
        ['label' => 'Total Aset', 'value' => '42.890', 'percent' => 100],
        ['label' => 'Aset Aktif', 'value' => '38.210', 'percent' => 89],
        ['label' => 'Total Pengadaan', 'value' => '1.284', 'percent' => 15],
        ['label' => 'Sensus Pending', 'value' => '324', 'percent' => 9, 'accent' => 'orange'],
        ['label' => 'Surveyor Aktif', 'value' => '156', 'percent' => 6],
    ];

    $missions = [
        'Digitalisasi menyeluruh seluruh aset daerah untuk kemudahan akses dan akurasi data.',
        'Meningkatkan transparansi pengadaan dan distribusi barang operasional dinas.',
        'Menyediakan tools monitoring real-time untuk pemeliharaan aset yang tepat waktu.',
        'Optimasi efisiensi anggaran melalui siklus hidup barang yang terpantau jelas.',
    ];

    $steps = [
        ['title' => 'Login', 'description' => 'Autentikasi user'],
        ['title' => 'Pengadaan', 'description' => 'Kelola aset baru'],
        ['title' => 'QR Code', 'description' => 'Generate label aset'],
        ['title' => 'Sensus', 'description' => 'Verifikasi lapangan'],
        ['title' => 'Verifikasi', 'description' => 'Validasi admin'],
        ['title' => 'Selesai', 'description' => 'Aset terdata'],
    ];

    $contacts = [
        ['label' => 'Alamat Kantor', 'value' => 'Jl. Wastukencana No. 2, Babakan Ciamis, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40117', 'code' => 'A'],
        ['label' => 'Email Dukungan', 'value' => 'support.raksa@bandung.go.id', 'code' => '@'],
        ['label' => 'Telepon', 'value' => '(022) 4235061', 'code' => 'T'],
        ['label' => 'Jam Operasional', 'value' => 'Senin - Jumat: 08:00 - 16:00 WIB', 'code' => 'J'],
    ];
@endphp

<div class="min-h-screen bg-white">
    <x-raksa.landing.navbar :items="$navItems" :login-url="$loginUrl" />

    <main>
        <section id="beranda" class="relative scroll-mt-16 overflow-hidden bg-gradient-to-b from-raksa-primary to-raksa-secondary tablet-l:scroll-mt-[4.5rem] laptop:scroll-mt-20 desktop:scroll-mt-20">
            <div class="mx-auto grid max-w-[90rem] items-center gap-8 px-4 pb-10 pt-8 sm:px-6 sm:pb-12 sm:pt-10 tablet-p:grid-cols-[minmax(0,1fr)_minmax(300px,0.86fr)] tablet-p:gap-7 tablet-p:px-8 tablet-p:py-12 tablet-l:grid-cols-[minmax(0,1fr)_minmax(360px,0.96fr)] tablet-l:gap-8 tablet-l:px-6 tablet-l:py-12 laptop:grid-cols-[minmax(0,0.92fr)_minmax(500px,1.08fr)] laptop:gap-10 laptop:px-6 laptop:py-16 desktop:grid-cols-[minmax(0,0.9fr)_minmax(580px,1.1fr)] desktop:gap-12 desktop:px-6 desktop:py-16">
                <div class="flex flex-col justify-center">
                    <div class="mb-6 inline-flex w-fit items-center gap-3 rounded-full border border-raksa-primary/20 bg-white px-4 py-2 shadow-sm laptop:mb-7">
                        <span class="h-3 w-3 rounded-full bg-raksa-accent"></span>
                        <span class="text-xs font-bold text-raksa-primary sm:text-sm">SISTEM RESMI DISKOMINFO KOTA BANDUNG</span>
                    </div>

                    <h1 class="max-w-2xl text-3xl font-bold leading-tight tracking-normal text-white sm:text-4xl tablet-l:text-4xl laptop:text-5xl desktop:text-5xl">
                        Kelola Barang Milik Daerah Secara Digital, Aman, dan Terintegrasi
                    </h1>

                    <p class="mt-5 max-w-2xl text-sm leading-7 text-blue-50 sm:text-base sm:leading-8 laptop:mt-6">
                        RAKSA menghadirkan transformasi digital dalam pengelolaan aset daerah Kota Bandung. Mulai dari pengadaan, inventarisasi, sensus berbasis QR Code, hingga pelaporan otomatis dalam satu ekosistem cerdas.
                    </p>

                    <div class="mt-7 flex flex-col gap-4 sm:flex-row laptop:mt-8">
                        <a href="{{ $loginUrl }}" class="inline-flex items-center justify-center rounded-xl bg-raksa-primary px-8 py-4 text-base font-bold text-white shadow-[0_8px_18px_rgba(0,0,0,0.18)] transition hover:bg-raksa-primary-hover">
                            Masuk ke Sistem
                        </a>
                        <a href="#fitur" class="inline-flex items-center justify-center rounded-xl border border-raksa-border bg-raksa-surface px-8 py-4 text-base font-semibold text-raksa-text transition hover:bg-white">
                            Pelajari Fitur
                        </a>
                    </div>

                    <div class="mt-8 flex flex-wrap gap-3 laptop:mt-10 laptop:gap-4">
                        @foreach (['Data Aman', 'Real-time', 'Sensus QR'] as $trustItem)
                            <span class="inline-flex items-center gap-3 rounded-2xl border border-white/30 bg-white/85 px-4 py-2 text-sm font-semibold text-raksa-text shadow-sm laptop:px-5">
                                <span class="h-2.5 w-2.5 rounded-full bg-raksa-primary"></span>
                                {{ $trustItem }}
                            </span>
                        @endforeach
                    </div>
                </div>

                <div class="relative ml-auto w-full max-w-[580px] overflow-hidden rounded-3xl border border-white/20 bg-white/10 p-3 shadow-2xl backdrop-blur sm:p-4 tablet-p:max-w-[390px] tablet-l:max-w-[500px] laptop:max-w-[760px] desktop:max-w-[850px]">
                    <div class="overflow-hidden rounded-[1.25rem] bg-white shadow-xl">
                        <img
                            src="{{ asset('assets/poto_landing.png') }}"
                            alt="Gedung Diskominfo Kota Bandung sebagai ilustrasi Landing Page RAKSA"
                            class="aspect-[16/10] h-auto w-full object-contain"
                            loading="eager"
                        >
                    </div>
                </div>
            </div>

            <div class="mx-auto flex max-w-[90rem] justify-center px-4 pb-6 sm:px-6 tablet-p:pb-8 laptop:px-6 desktop:px-6">
                <div class="h-2 w-48 rounded-full bg-white/70"></div>
            </div>
        </section>

        <section id="fitur" class="scroll-mt-16 bg-raksa-background/50 px-4 py-16 sm:px-6 tablet-p:px-8 tablet-p:py-20 tablet-l:scroll-mt-[4.5rem] tablet-l:py-20 laptop:scroll-mt-20 laptop:px-8 laptop:py-24 desktop:scroll-mt-20 desktop:px-8 desktop:py-24">
            <x-raksa.landing.section-heading
                eyebrow="Fitur Unggulan"
                description="Seluruh proses pengelolaan Barang Milik Daerah dilakukan dalam satu sistem yang terintegrasi, transparan, dan akuntabel sesuai standar pemerintah."
            />

            <div class="mx-auto mt-12 grid max-w-[90rem] gap-6 tablet-l:grid-cols-2 laptop:mt-20 laptop:grid-cols-2 laptop:gap-8 desktop:mt-20 desktop:grid-cols-2 desktop:gap-8">
                <x-raksa.landing.feature-card
                    title="Admin EBMD"
                    description="Panel kontrol pusat untuk manajemen siklus aset secara menyeluruh di lingkungan Diskominfo."
                    :features="$adminFeatures"
                    accent="blue"
                    code="AD"
                />

                <x-raksa.landing.feature-card
                    title="Surveyor Lapangan"
                    description="Aplikasi pendukung mobilitas tinggi untuk verifikasi fisik aset secara langsung di lokasi."
                    :features="$surveyorFeatures"
                    accent="orange"
                    code="SV"
                />
            </div>
        </section>

        <section id="statistik" class="scroll-mt-16 px-4 py-16 sm:px-6 tablet-p:px-8 tablet-p:py-20 tablet-l:scroll-mt-[4.5rem] tablet-l:py-20 laptop:scroll-mt-20 laptop:px-8 laptop:py-24 desktop:scroll-mt-20 desktop:px-8 desktop:py-24">
            <x-raksa.landing.section-heading
                eyebrow="Statistik Sistem"
                description="UPDATE TERAKHIR: HARI INI, 10:00 WIB"
                class="[&_p:last-child]:font-bold [&_p:last-child]:text-raksa-primary"
            />

            <div class="mx-auto mt-10 max-w-5xl rounded-2xl border border-raksa-border/40 bg-white p-5 shadow-sm sm:p-6 laptop:mt-12 laptop:p-8 desktop:p-8">
                <div class="mb-8 flex flex-col gap-3 border-b border-raksa-border/40 pb-4 sm:flex-row sm:items-center sm:justify-between">
                    <h3 class="text-base font-bold text-raksa-text">Visualisasi Metrik Sistem</h3>
                    <div class="flex items-center gap-2">
                        <span class="h-3 w-3 rounded-full bg-raksa-primary"></span>
                        <span class="text-base text-raksa-neutral">Jumlah Data</span>
                    </div>
                </div>

                <div class="space-y-6">
                    @foreach ($metrics as $metric)
                        <x-raksa.landing.metric-bar
                            :label="$metric['label']"
                            :value="$metric['value']"
                            :percent="$metric['percent']"
                            :accent="$metric['accent'] ?? 'blue'"
                        />
                    @endforeach
                </div>

                <p class="mt-8 border-t border-raksa-border/40 pt-4 text-center text-base text-raksa-neutral">
                    * Skala grafik disesuaikan untuk perbandingan visual antar kategori aset.
                </p>
            </div>
        </section>

        <section id="visi-misi" class="scroll-mt-16 bg-gradient-to-b from-raksa-primary to-raksa-secondary px-4 py-16 sm:px-6 tablet-p:px-8 tablet-p:py-20 tablet-l:scroll-mt-[4.5rem] tablet-l:py-20 laptop:scroll-mt-20 laptop:px-8 laptop:py-24 desktop:scroll-mt-20 desktop:px-8 desktop:py-24">
            <div class="mx-auto grid max-w-7xl gap-8 lg:grid-cols-2">
                <article class="rounded-3xl border border-white/20 bg-white/10 p-5 sm:p-6 laptop:rounded-[2rem] laptop:p-8">
                    <div class="mb-6 flex items-center gap-4">
                        <span class="flex h-12 w-12 items-center justify-center rounded-full bg-raksa-accent text-sm font-bold text-white">V</span>
                        <h2 class="text-xl font-bold text-white">Visi Kami</h2>
                    </div>
                    <p class="text-base font-bold leading-8 text-white sm:text-lg laptop:text-xl laptop:leading-9">
                        "Menjadi sistem manajemen aset pemerintah daerah yang paling modern, transparan, dan akuntabel di Indonesia, guna mendukung optimalisasi pelayanan publik yang efisien dan digital-first."
                    </p>
                </article>

                <article class="rounded-3xl border border-white/10 bg-white/5 p-5 sm:p-6 laptop:rounded-[2rem] laptop:p-8">
                    <div class="mb-6 flex items-center gap-4">
                        <span class="flex h-12 w-12 items-center justify-center rounded-full bg-raksa-primary text-sm font-bold text-white">M</span>
                        <h2 class="text-xl font-bold text-white">Misi RAKSA</h2>
                    </div>
                    <ol class="space-y-4">
                        @foreach ($missions as $mission)
                            <x-raksa.landing.mission-item :number="str_pad($loop->iteration, 2, '0', STR_PAD_LEFT)" :text="$mission" />
                        @endforeach
                    </ol>
                </article>
            </div>
        </section>

        <section id="panduan" class="scroll-mt-16 px-4 py-16 sm:px-6 tablet-p:px-8 tablet-p:py-20 tablet-l:scroll-mt-[4.5rem] tablet-l:py-20 laptop:scroll-mt-20 laptop:px-8 laptop:py-24 desktop:scroll-mt-20 desktop:px-8 desktop:py-24">
            <x-raksa.landing.section-heading
                eyebrow="Alur Penggunaan Sistem"
                description="RAKSA didesain dengan antarmuka yang intuitif. Berikut adalah langkah-langkah standar dalam pengelolaan aset di dalam sistem."
            />

            <ol class="relative mx-auto mt-12 grid max-w-6xl gap-8 sm:grid-cols-2 tablet-p:grid-cols-3 tablet-l:grid-cols-3 laptop:mt-20 laptop:grid-cols-6 desktop:mt-20 desktop:grid-cols-6">
                @foreach ($steps as $step)
                    <x-raksa.landing.process-step
                        :number="$loop->iteration"
                        :title="$step['title']"
                        :description="$step['description']"
                    />
                @endforeach
            </ol>

            <div class="mt-12 flex justify-center laptop:mt-20 desktop:mt-20">
                <a href="#" class="inline-flex items-center justify-center rounded-xl border border-raksa-border bg-raksa-surface-alt px-8 py-4 text-base font-semibold text-raksa-text transition hover:bg-white">
                    Download Panduan Lengkap PDF
                </a>
            </div>
        </section>

        <section id="kontak" class="grid scroll-mt-16 gap-10 bg-white px-4 py-16 sm:px-6 tablet-p:px-8 tablet-p:py-20 tablet-l:scroll-mt-[4.5rem] tablet-l:px-8 tablet-l:py-20 laptop:scroll-mt-20 laptop:grid-cols-[1fr_0.9fr] laptop:px-8 laptop:py-24 desktop:scroll-mt-20 desktop:grid-cols-[1fr_0.9fr] desktop:px-24 desktop:py-24">
            <div>
                <h2 class="text-2xl font-bold text-raksa-text sm:text-3xl">Hubungi Kami</h2>
                <p class="mt-5 max-w-2xl text-sm leading-7 text-raksa-neutral sm:text-base sm:leading-8 laptop:mt-6">
                    Tim teknis kami siap membantu Anda dalam operasional Sistem RAKSA. Silakan hubungi melalui saluran komunikasi resmi berikut.
                </p>

                <div class="mt-8 space-y-6">
                    @foreach ($contacts as $contact)
                        <x-raksa.landing.contact-item
                            :label="$contact['label']"
                            :value="$contact['value']"
                            :code="$contact['code']"
                        />
                    @endforeach
                </div>
            </div>

            <div class="rounded-3xl border-8 border-white bg-raksa-neutral-200 p-3 shadow-2xl sm:p-4">
                <div class="relative min-h-[300px] overflow-hidden rounded-2xl bg-raksa-neutral-300 sm:min-h-[360px] laptop:min-h-[420px]">
                    <a href="#" class="absolute left-4 top-4 rounded bg-white px-4 py-2 text-sm font-semibold text-raksa-info shadow">
                        Buka di Maps
                    </a>
                    <div class="absolute inset-x-8 top-24 h-4 rounded-full bg-white/60"></div>
                    <div class="absolute bottom-20 left-10 h-4 w-3/5 rotate-[-16deg] rounded-full bg-white/60"></div>
                    <div class="absolute bottom-32 right-8 h-4 w-2/5 rotate-[24deg] rounded-full bg-white/60"></div>
                    <div class="absolute left-1/2 top-1/2 flex h-16 w-16 -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full bg-raksa-primary text-sm font-bold text-white shadow-lg">
                        R
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-gradient-to-b from-raksa-primary to-raksa-secondary text-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 py-10 sm:px-6 lg:grid-cols-[1.2fr_1fr_1fr] lg:px-8">
            <div>
                <h2 class="text-xl font-bold">RAKSA</h2>
                <p class="mt-4 max-w-md text-base leading-7 text-blue-100">
                    Sistem Informasi Manajemen Barang Milik Daerah terpadu milik Pemerintah Kota Bandung, dikelola oleh Dinas Komunikasi dan Informatika.
                </p>
            </div>

            <div>
                <h3 class="text-base font-bold">Tautan Cepat</h3>
                <div class="mt-6 grid gap-4 text-base text-blue-100">
                    <a href="#" class="hover:text-white">Portal Data Bandung</a>
                    <a href="#" class="hover:text-white">E-Gov Bandung</a>
                    <a href="#" class="hover:text-white">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-white">Syarat & Ketentuan</a>
                </div>
            </div>

            <div>
                <h3 class="text-base font-bold">Media Sosial</h3>
                <div class="mt-6 flex gap-4">
                    <a href="#" class="flex h-10 w-10 items-center justify-center rounded-full bg-white/10 text-sm font-bold hover:bg-white/20">IG</a>
                    <a href="#" class="flex h-10 w-10 items-center justify-center rounded-full bg-white/10 text-sm font-bold hover:bg-white/20">X</a>
                </div>
            </div>
        </div>

        <div class="border-t border-white/20 bg-raksa-primary px-4 py-5 sm:px-6 lg:px-8">
            <div class="mx-auto flex max-w-7xl flex-col gap-3 text-sm text-white sm:flex-row sm:items-center sm:justify-between">
                <p>Copyright &copy; 2026 Dinas Komunikasi dan Informatika Kota Bandung</p>
                <p>RAKSA v1.0.0</p>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
