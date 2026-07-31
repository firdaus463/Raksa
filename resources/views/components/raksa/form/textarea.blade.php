@props([
    'label' => null,
    'name',
    'value' => null,
    'rows' => 4,
    'required' => false,
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

    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        {{ $attributes->merge(['class' => '']) }}
        @class([
            'block w-full rounded-xl bg-white py-3 px-4 text-sm text-raksa-text placeholder:text-slate-400 transition duration-200 resize-y shadow-2xs',
            'border-rose-400 ring-2 ring-rose-400/20' => $errors->has($name),
            'border-slate-200 hover:border-slate-300 focus:border-raksa-primary focus:ring-2 focus:ring-raksa-primary/15' => !$errors->has($name),
        ])
    >{{ old($name, $value) }}</textarea>

    @if ($hint && !$errors->has($name))
        <p class="text-xs text-slate-400 leading-relaxed">{{ $hint }}</p>
    @endif

    @error($name)
        <p class="text-xs font-medium text-rose-500">{{ $message }}</p>
    @enderror
</div>
