{{-- File Upload Dropzone --}}
@props([
    'name' => 'documents',
    'label' => 'Upload dokumen pendukung',
    'accept' => '.pdf,.docx,.doc,.jpg,.jpeg,.png',
    'maxSize' => '10MB',
    'multiple' => true,
])

<div x-data="{
    files: [],
    isDragging: false,
    handleDrop(e) {
        this.isDragging = false;
        this.addFiles(e.dataTransfer.files);
    },
    addFiles(fileList) {
        for (const f of fileList) {
            this.files.push({ name: f.name, size: (f.size / 1024 / 1024).toFixed(2) + ' MB' });
        }
    },
    removeFile(index) {
        this.files.splice(index, 1);
    }
}">
    {{-- Drop Zone --}}
    <div
        @dragover.prevent="isDragging = true"
        @dragleave.prevent="isDragging = false"
        @drop.prevent="handleDrop($event)"
        :class="isDragging ? 'border-raksa-primary bg-raksa-primary/5' : 'border-raksa-border bg-raksa-surface/30'"
        class="relative flex flex-col items-center justify-center rounded-xl border-2 border-dashed py-10 px-6 transition duration-200 cursor-pointer"
        @click="$refs.fileInput.click()"
    >
        {{-- Upload Icon --}}
        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-raksa-primary/10 mb-3">
            <svg class="h-5 w-5 text-raksa-primary" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <polyline points="17 8 12 3 7 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <line x1="12" y1="3" x2="12" y2="15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>

        <p class="text-sm font-bold text-raksa-text">Klik atau drag file ke sini</p>
        <p class="mt-1 text-xs text-slate-400">PDF, DOCX, atau Gambar (Max. {{ $maxSize }})</p>
        <p class="mt-2 text-xs font-bold text-raksa-primary underline">Pilih File</p>

        <input
            type="file"
            name="{{ $name }}{{ $multiple ? '[]' : '' }}"
            accept="{{ $accept }}"
            {{ $multiple ? 'multiple' : '' }}
            x-ref="fileInput"
            @change="addFiles($event.target.files)"
            class="hidden"
        >
    </div>

    {{-- Uploaded File List --}}
    <template x-for="(file, index) in files" :key="index">
        <div class="flex items-center gap-4 mt-3 rounded-xl border border-raksa-border/60 bg-white p-4">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-raksa-surface-alt">
                <svg class="h-5 w-5 text-slate-500" viewBox="0 0 24 24" fill="none"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z" stroke="currentColor" stroke-width="2"/><polyline points="14 2 14 8 20 8" stroke="currentColor" stroke-width="2"/></svg>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-bold text-raksa-text truncate" x-text="file.name"></p>
                <p class="text-xs text-slate-400" x-text="file.size"></p>
            </div>
            <button type="button" @click="removeFile(index)" class="shrink-0 flex h-8 w-8 items-center justify-center rounded-full bg-raksa-surface hover:bg-red-50 text-slate-400 hover:text-red-500 transition">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"><path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
            </button>
        </div>
    </template>
</div>
