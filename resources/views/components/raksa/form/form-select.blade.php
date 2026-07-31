@props([
    'label' => null,
    'name',
    'options' => [],
    'selected' => null,
    'required' => false,
    'placeholder' => null,
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

    <select
        id="{{ $name }}"
        name="{{ $name }}"
        {{ $attributes->merge(['class' => '']) }}
        @class([
            'block w-full rounded-xl bg-white py-3 px-4 text-sm text-raksa-text transition duration-200 shadow-2xs',
            'border-rose-400 ring-2 ring-rose-400/20' => $errors->has($name),
            'border-slate-200 hover:border-slate-300 focus:border-raksa-primary focus:ring-2 focus:ring-raksa-primary/15' => !$errors->has($name),
        ])
    >
        @if ($placeholder)
            <option value="" disabled {{ old($name, $selected) === null ? 'selected' : '' }}>{{ $placeholder }}</option>
        @endif

        @forelse ($options as $value => $text)
            <option value="{{ $value }}" @selected(old($name, $selected) == $value)>{{ $text }}</option>
        @empty
            {{ $slot }}
        @endforelse
    </select>

    @error($name)
        <p class="text-xs font-medium text-rose-500">{{ $message }}</p>
    @enderror
</div>
