@props([
    'label' => null,
    'name',
    'type' => 'text',
    'value' => null,
    'required' => false,
    'prefix' => null,
    'hint' => null,
])

<div class="space-y-1.5">
    @if ($label)
        <label for="{{ $name }}" class="block text-xs font-semibold text-raksa-neutral">
            {{ $label }}
            @if ($required)
                <span class="text-rose-500">*</span>
            @endif
        </label>
    @endif

    <div @class([
        'flex items-center w-full rounded-xl border bg-white transition duration-200 shadow-2xs',
        'border-rose-400 ring-2 ring-rose-400/20' => $errors->has($name),
        'border-slate-200 hover:border-slate-300 focus-within:border-raksa-primary focus-within:ring-2 focus-within:ring-raksa-primary/15' => !$errors->has($name),
    ])>
        @if ($prefix)
            <span class="shrink-0 pl-4 text-sm font-bold text-raksa-neutral select-none">{{ $prefix }}</span>
        @endif

        <input
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            value="{{ old($name, $value) }}"
            {{ $attributes->merge(['class' => 'block w-full border-0 bg-transparent py-3 px-4 text-sm text-raksa-text placeholder:text-slate-400 focus:ring-0 rounded-xl']) }}
        >
    </div>

    @if ($hint && !$errors->has($name))
        <p class="text-xs text-slate-400 leading-relaxed">{{ $hint }}</p>
    @endif

    @error($name)
        <p class="text-xs font-medium text-rose-500">{{ $message }}</p>
    @enderror
</div>
