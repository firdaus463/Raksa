@props(['title' => null])

<header {{ $attributes->merge(['class' => 'sticky top-0 z-30 border-b border-raksa-border/40 bg-white/95 backdrop-blur supports-[backdrop-filter]:bg-white/90']) }}>
    <div class="flex h-20 items-center justify-between gap-4 px-4 sm:px-6 laptop:px-8">
        {{-- Left: Mobile Hamburger Toggle + Search Bar --}}
        <div class="flex flex-1 items-center gap-3 max-w-xl">
            {{-- Mobile Offcanvas Menu Toggle --}}
            <button
                type="button"
                @click="mobileSidebarOpen = !mobileSidebarOpen"
                class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-slate-50 text-raksa-neutral hover:text-raksa-primary md:hidden shrink-0"
                aria-label="Toggle Mobile Menu"
            >
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </button>

            {{-- Search Bar Component --}}
            <x-raksa.form.search-bar />
        </div>

        {{-- Right: User Dropdown Component --}}
        <div class="flex items-center gap-4 shrink-0">
            @if($slot->isNotEmpty())
                {{ $slot }}
            @else
                <x-raksa.navigation.user-dropdown />
            @endif
        </div>
    </div>
</header>


