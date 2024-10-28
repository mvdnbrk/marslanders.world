<x-layout.main>
    <div class="flex justify-center flex-col">
        <div class="bg-white opacity-90 px-4 py-2 rounded-md">
            <h1 class="text-2xl text-amber-950">
                {{ $inscription->name }}
            </h1>
            <h2 class="text-amber-900">
                Rank {{ $inscription->rank }}
            </h2>
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

        <div class="mt-12 bg-white opacity-75 rounded">
            <div class="px-0 md:px-4 py-2">
                <h3 class="text-base font-semibold leading-7 text-amber-950">
                    Traits
                </h3>
            </div>
            <div class="border-t border-orange-400">
                <dl class="divide-y divide-orange-400">
                    @foreach($inscription->traits as $trait)
                    <div class="px-0 md:px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-amber-950">
                            {{ $trait->type }}
                        </dt>
                        <dd class="flex mt-1 text-sm leading-6 text-amber-800 sm:col-span-2 sm:mt-0">
                            <span class="flex-grow">{{ $trait->value }}</span>
                            <span class="ml-4 flex-shrink-0">{{ $trait->rarity }}%</span>
                        </dd>
                    </div>
                    @endforeach
                </dl>
            </div>
        </div>
    </div>
</x-layout.main>
