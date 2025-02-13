<x-layout.main>
    <div class="flex justify-center flex-col">
        <div class="flex min-h-12 sm:min-h-24 items-center bg-stone-50 dark:bg-slate-800 opacity-90 px-4 rounded-md">
            @if($inscription->isBurned())
            <x-icon-flame class="w-8 h-8 mr-4 text-red-600"/>
            @endif
            <h1 class="grow text-xl md:text-3xl font-extrabold text-amber-950 dark:text-stone-100">
                {{ $inscription->name }}
            </h1>
            <div class="flex flex-col items-center">
                @if (! $inscription->burned)
                <p class="flex items-end py-1 gap-x-2 border-b border-stone-300 dark:border-slate-500 {{ $inscription->rarity()->styles() }} text-base md:text-xl font-bold">
                    <x-icon-rank class="w-8 h-8 md:w-10 md:h-10"/>
                    {{ $inscription->rarity()->name() }}
                </p>
                <p class="text-amber-950 dark:text-stone-100 text-sm md:text-base">
                    Rank {{ $inscription->rank }}
                </p>
                @endif
            </div>
        </div>

        <div class="mt-8">
            <img
                src="{{ $inscription->image_url }}"
                width="500"
                height="500"
                class="rounded-md shadow-lg"
                alt="={{ $inscription->name }}"
            >
        </div>

        <div class="mt-12 bg-white opacity-75 rounded-sm">
            <div class="px-2 md:px-4 py-2">
                <h3 class="text-base font-semibold leading-7 text-amber-950">
                    Traits
                </h3>
            </div>
            <div class="border-t border-orange-400">
                <dl class="divide-y divide-orange-400">
                    @foreach($inscription->traits as $trait)
                    <div class="px-2 md:px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-amber-950">
                            {{ $trait->type }}
                        </dt>
                        <dd class="flex mt-1 text-sm leading-6 text-amber-800 sm:col-span-2 sm:mt-0">
                            <span class="grow">{{ $trait->value }}</span>
                            @if (! $inscription->burned)
                            <span class="ml-4 shrink-0">{{ $trait->rarity }}%</span>
                            @endif
                        </dd>
                    </div>
                    @endforeach
                </dl>
            </div>
        </div>
    </div>
</x-layout.main>
