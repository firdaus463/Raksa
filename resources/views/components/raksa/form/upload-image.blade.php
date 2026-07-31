@props(['label' => 'Unggah gambar', 'name' => 'image', 'previewId' => null])

<label {{ $attributes->merge() }} @class([
    // Bentuk & Warna
    'block rounded-lg border border-dashed border-slate-300 bg-white',

    // Jarak & Teks
    'p-4 text-center',
])>
    <span class="block text-sm font-medium text-slate-700">{{ $label }}</span>

    <input
        type="file"
        name="{{ $name }}"
        accept="image/*"
        data-preview-target="{{ $previewId }}"
        @class([
            // Ukuran & Jarak
            'mt-3 block w-full',

            // Tipografi
            'text-sm text-slate-600',

            // Styling File Button
            'file:mr-4 file:rounded-md file:border-0',
            'file:bg-slate-900 file:px-4 file:py-2',
            'file:text-sm file:font-semibold file:text-white',
            'hover:file:bg-slate-800',
        ])
    >
    {{ $slot }}
</label>
