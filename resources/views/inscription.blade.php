<x-layout.main>
    <div class="flex justify-center flex-col">
        <h1 class="text-2xl text-orange-700">
            {{ $inscription->name }}
        </h1>

        <div class="mt-8">
            <img
                src="{{ $inscription->image_url }}"
                width="500"
                height="500"
                class="rounded-md"
                alt="={{ $inscription->name }}"
            >
        </div>

        <div class="mt-12">
            <div class="px-4 sm:px-0">
                <h3 class="text-base font-semibold leading-7 text-orange-700">
                    Traits
                </h3>
            </div>
            <div class="mt-4 border-t border-orange-400">
                <dl class="divide-y divide-orange-400">
                    @foreach($inscription->traits as $trait)
                    <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-orange-700">{{ $trait->type }}</dt>
                        <dd class="mt-1 text-sm leading-6 text-orange-600 sm:col-span-2 sm:mt-0">{{ $trait->value }}</dd>
                    </div>
                    @endforeach
                </dl>
            </div>
        </div>
    </div>
</x-layout.main>
