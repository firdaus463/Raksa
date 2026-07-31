@props(['columns' => []])

<thead {{ $attributes->merge(['class' => 'bg-slate-50']) }}>
    <tr>
        @forelse ($columns as $column)
            <th
                scope="col"
                @class([
                    // Jarak
                    'px-4 py-3',

                    // Tipografi
                    'text-left text-xs font-semibold',
                    'uppercase tracking-normal',

                    // Warna
                    'text-slate-500',
                ])
            >
                {{ $column }}
            </th>
        @empty
            {{ $slot }}
        @endforelse
    </tr>
</thead>
