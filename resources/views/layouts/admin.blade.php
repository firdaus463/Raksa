<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'RAKSA') }}</title>

    @vite(['resources/css/app.css', 'resources/css/admin.css', 'resources/css/components.css', 'resources/js/app.js', 'resources/js/sidebar.js', 'resources/js/dropdown.js', 'resources/js/modal.js'])
</head>
<body class="min-h-screen bg-slate-50 text-slate-900 antialiased">
    <div class="min-h-screen lg:flex">
        <x-raksa.layout.sidebar :items="$sidebarItems ?? []" />

        <div class="flex min-h-screen flex-1 flex-col">
            <x-raksa.layout.navbar :title="$title ?? 'Admin RAKSA'" />

            <main class="flex-1 px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </main>

            <x-raksa.layout.footer />
        </div>
    </div>

    @stack('scripts')
</body>
</html>
