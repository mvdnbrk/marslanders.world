<x-layout.main>
    <div class="flex justify-center flex-col">
       <div class="flex flex-col mb-12 items-center justify-center bg-marslanders-blue p-4 rounded-md">
            <img
                class="w-64 object-cover"
                src="{{ asset('images/marslanders_logo.png') }}"
            >
            <p class="text-sm -mt-6 w-32 flex justify-between mt-6 text-slate-100">
                SUPPLY <span class="font-bold">10K</span>
            </p>
            <p class="text-sm w-32 flex justify-between mb-2 text-slate-100">
                BURNED <span class="font-bold">{{ $burn_count }}</span>
            </p>
            <p class="pt-2 mt-4 text-sm font-black tracking-wider text-yellow-400 mb-4">
                The First High-Quality Recursive Revealer on Doginals!
            </p>
        </div>

        <x-search/>

        <x-nav-rarity/>
    </div>
</x-layout.main>
