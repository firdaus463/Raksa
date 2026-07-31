<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Masuk - RAKSA</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white font-sans text-raksa-text antialiased">
    @php
    $features = [
    ['title' => 'Data Terenkripsi', 'icon' => 'lock'],
    ['title' => 'Pelaporan Instan', 'icon' => 'chart'],
    ['title' => 'Sinkronisasi Otomatis', 'icon' => 'sync'],
    ];
    @endphp

    <main class="min-h-screen overflow-x-hidden bg-white">
        <div class="grid min-h-screen grid-cols-1 md:grid-cols-12">
            <!-- Left Panel: Information & Branding -->
            <section class="relative hidden overflow-hidden bg-gradient-to-b from-raksa-primary to-raksa-secondary px-6 py-10 text-white md:col-span-5 md:flex md:flex-col md:justify-between lg:col-span-6 laptop:px-12 laptop:py-12 desktop:px-16 desktop:py-14" aria-label="Informasi RAKSA">
                <div class="absolute inset-x-0 bottom-0 h-56 bg-white/5"></div>
                <svg class="absolute right-0 top-0 h-72 w-72 translate-x-20 -translate-y-16 text-white/20" viewBox="0 0 280 280" fill="none" aria-hidden="true">
                    <circle cx="140" cy="140" r="92" stroke="currentColor" stroke-width="2" />
                    <circle cx="140" cy="140" r="126" stroke="currentColor" stroke-width="1.5" stroke-dasharray="8 10" />
                    <path d="M74 152c38-54 88-66 150-38" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
                <svg class="absolute bottom-20 right-14 h-40 w-40 text-raksa-accent/80" viewBox="0 0 180 180" fill="none" aria-hidden="true">
                    <path d="M24 112c22-48 62-78 122-90" stroke="currentColor" stroke-width="10" stroke-linecap="round" />
                    <path d="M36 138c26-36 62-56 108-62" stroke="white" stroke-opacity=".8" stroke-width="6" stroke-linecap="round" />
                    <circle cx="132" cy="34" r="8" fill="currentColor" />
                    <circle cx="44" cy="142" r="5" fill="white" fill-opacity=".85" />
                </svg>
                <div class="relative">
                    <div class="max-w-3xl">
                        <p class="inline-flex items-center gap-3 rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm font-semibold text-blue-50">
                            <span class="h-2.5 w-2.5 rounded-full bg-raksa-accent"></span>
                            SISTEM RESMI DISKOMINFO KOTA BANDUNG
                        </p>

                        <h1 class="mt-8 max-w-3xl text-3xl font-bold leading-tight tracking-normal sm:text-4xl laptop:text-5xl desktop:text-5xl">
                            Kelola Pengadaan Aset dengan Cerdas dan Akurat
                        </h1>

                        <p class="mt-6 max-w-2xl text-base leading-8 text-blue-50">
                            Sistem informasi manajemen barang milik daerah yang terintegrasi untuk transparansi dan akuntabilitas tata kelola aset Diskominfo Kota Bandung.
                        </p>
                    </div>
                </div>

                <div class="relative mt-10 grid max-w-3xl gap-4 grid-cols-1 laptop:grid-cols-3 desktop:grid-cols-3">
                    @foreach ($features as $feature)
                    <article class="rounded-xl border border-white/20 bg-white/10 p-5 shadow-sm backdrop-blur">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-raksa-accent text-white shadow-sm">
                            @if ($feature['icon'] === 'lock')
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M7 10V8a5 5 0 0 1 10 0v2" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                <path d="M6 10h12v9H6z" stroke="currentColor" stroke-width="2" stroke-linejoin="round" />
                            </svg>
                            @elseif ($feature['icon'] === 'chart')
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M5 19V5" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                <path d="M5 19h14" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                <path d="M9 16v-5M13 16V8M17 16v-3" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            </svg>
                            @else
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M17 2v5h-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7 22v-5h5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M20 11a8 8 0 0 0-13.5-5.8L4 7.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                <path d="M4 13a8 8 0 0 0 13.5 5.8L20 16.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            </svg>
                            @endif
                        </div>
                        <h2 class="mt-5 text-sm font-bold leading-6 text-white">{{ $feature['title'] }}</h2>
                    </article>
                    @endforeach
                </div>
            </section>

            <!-- Right Panel: Login Content & Footer -->
            <section class="relative flex min-h-screen flex-col justify-between bg-raksa-surface/60 md:col-span-7 lg:col-span-6" aria-label="Form masuk RAKSA">
                <div class="flex flex-1 flex-col justify-center px-4 py-8 sm:px-6 sm:py-10 laptop:px-8 desktop:px-12">
                    <div class="mx-auto w-full max-w-xl rounded-2xl sm:rounded-3xl border border-raksa-border/40 bg-white p-6 sm:p-8 laptop:p-10 shadow-[0_16px_40px_rgba(0,48,174,0.08)]">
                        <div class="text-center">
                            <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-2xl bg-raksa-primary-light/40 p-2 shadow-sm">
                                <img src="{{ asset('assets/Lambang_Kota_Bandung.png') }}" alt="Lambang Kota Bandung" class="h-12 w-auto object-contain" />
                            </div>

                            <h1 class="text-3xl font-bold tracking-normal text-raksa-text sm:text-4xl">
                                Selamat Datang
                            </h1>
                            <p class="mx-auto mt-3 max-w-md text-sm leading-7 text-raksa-neutral sm:text-base">
                                Silakan masuk menggunakan akun Anda untuk mengelola data aset secara aman dan efisien.
                            </p>
                        </div>

                        <x-breeze.auth-session-status class="mt-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-semibold text-green-700" :status="session('status')" />

                        <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-5">
                            @csrf

                            <div>
                                <label for="email" class="block text-sm font-bold text-raksa-text">Username</label>
                                <div class="mt-2 flex items-center rounded-xl border border-raksa-border/50 bg-white px-4 py-3 shadow-sm transition focus-within:border-raksa-primary focus-within:ring-2 focus-within:ring-raksa-primary/10">
                                    <svg class="h-5 w-5 shrink-0 text-raksa-neutral" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M4 6h16v12H4z" stroke="currentColor" stroke-width="2" stroke-linejoin="round" />
                                        <path d="m4 7 8 6 8-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <input
                                        id="email"
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                        autofocus
                                        autocomplete="username"
                                        placeholder="admin@ebmd.ac.id"
                                        class="ml-3 block w-full border-0 bg-transparent p-0 text-base text-raksa-text placeholder:text-raksa-neutral/70 focus:ring-0">
                                </div>
                                <x-breeze.input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div>
                                <div class="flex items-center justify-between gap-4">
                                    <label for="password" class="block text-sm font-bold text-raksa-text">Password</label>
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-xs font-bold text-raksa-info transition hover:text-raksa-primary">
                                        Lupa Password?
                                    </a>
                                    @endif
                                </div>

                                <div class="mt-2 flex items-center rounded-xl border border-raksa-border/50 bg-white px-4 py-3 shadow-sm transition focus-within:border-raksa-primary focus-within:ring-2 focus-within:ring-raksa-primary/10">
                                    <svg class="h-5 w-5 shrink-0 text-raksa-neutral" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M7 10V8a5 5 0 0 1 10 0v2" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                        <path d="M6 10h12v9H6z" stroke="currentColor" stroke-width="2" stroke-linejoin="round" />
                                    </svg>
                                    <input
                                        id="password"
                                        type="password"
                                        name="password"
                                        required
                                        autocomplete="current-password"
                                        placeholder="Masukkan password"
                                        class="ml-3 block w-full border-0 bg-transparent p-0 text-base text-raksa-text placeholder:text-raksa-neutral/70 focus:ring-0">
                                </div>
                                <x-breeze.input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-3">
                                <input
                                    id="remember_me"
                                    type="checkbox"
                                    name="remember"
                                    class="h-5 w-5 rounded-md border-raksa-border bg-raksa-surface-alt text-raksa-primary shadow-sm focus:ring-raksa-primary">
                                <label for="remember_me" class="text-sm text-raksa-neutral">Ingat Saya</label>
                            </div>

                            <button type="submit" class="flex w-full items-center justify-center rounded-lg bg-raksa-primary px-6 py-4 text-base font-bold text-white shadow-[0_8px_18px_rgba(0,72,174,0.22)] transition hover:bg-raksa-primary-hover focus:outline-none focus:ring-2 focus:ring-raksa-primary focus:ring-offset-2">
                                Masuk
                            </button>
                        </form>

                        <aside class="mt-6 rounded-xl border border-raksa-info/10 bg-raksa-info/5 p-5">
                            <div class="flex items-start gap-4">
                                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-raksa-primary-light text-raksa-primary">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M12 18h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                        <path d="M9.5 9a2.5 2.5 0 1 1 4.3 1.7c-.9.8-1.8 1.4-1.8 2.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                        <path d="M12 22a10 10 0 1 0 0-20 10 10 0 0 0 0 20Z" stroke="currentColor" stroke-width="2" />
                                    </svg>
                                </span>
                                <p class="text-sm leading-6 text-raksa-neutral">
                                    Butuh Bantuan? Hubungi tim IT atau administrator sistem di unit layanan Anda.
                                </p>
                            </div>
                        </aside>

                        <div class="mt-6 text-center">
                            <a href="mailto:support.raksa@bandung.go.id" class="inline-flex items-center gap-2 text-sm font-bold text-raksa-info transition hover:text-raksa-primary">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M4 6h16v12H4z" stroke="currentColor" stroke-width="2" stroke-linejoin="round" />
                                    <path d="m4 7 8 6 8-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Hubungi administrator sistem
                            </a>
                        </div>
                    </div>
                </div>

                <footer class="shrink-0 border-t border-raksa-border/40 bg-raksa-surface px-4 py-4 text-center text-xs text-raksa-neutral sm:text-sm">
                    &copy; 2026 Dinas Komunikasi dan Informatika Kota Bandung. Semua hak dilindungi.
                </footer>
            </section>
        </div>
    </main>
</body>

</html>