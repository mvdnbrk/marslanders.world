<div
{{ $attributes->merge([
    'class' => 'divide-y divide-stone-200 dark:divide-slate-600 overflow-hidden rounded-lg bg-stone-50 dark:bg-slate-800 shadow'
])
}}>
    <div class="p-4">
        <a
            @class([
                'relative',
                'sepia' => $inscription->burned,
                'saturate-200' => $inscription->burned,
                'hover:sepia-0 ease-out duration-300' => $inscription->burned,
            ])
            href="{{ route('inscription', ['inscription' => $inscription]) }}"
        >
            <img
                @class([
                    'rounded-t-md',
                    'hover:scale-105',
                    'ease-out',
                    'duration-300',
                ])
                src="{{ $inscription->image_url }}"
                alt="{{ $inscription->name }}"
                width="500"
                height="500"
            >
            @if ($inscription->burned)
            <div class="flex items-end justify-end absolute inset-0 opacity-90 pl-px">
                <div class="w-full flex items-center justify-between">
                    <p class="bg-white opacity-100 text-xl px-2 rounded-r-lg tracking-wide font-semibold text-red-600">
                        BURNED
                    </p>
                    <x-icon-flame class="w-16 h-16 text-red-600 pr-2 pb-2"/>
                </div>
            </div>
            @endif
        </a>
    </div>
    <div class="px-4 py-4">
        <a
            class="text-orange-700 dark:text-slate-400 hover:underline underline-offset-2"
            href="{{ route('inscription', ['inscription' => $inscription]) }}"
        >
            {{ $inscription->name }}
        </a>
    </div>
</div>
