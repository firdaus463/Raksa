<div {{ $attributes->merge() }} @class([
    // Bentuk & Warna
    'overflow-hidden rounded-lg border border-slate-200 bg-white',

    // Bayangan
    'shadow-sm',
])>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200">
            {{ $slot }}
        </table>
    </div>
</div>
