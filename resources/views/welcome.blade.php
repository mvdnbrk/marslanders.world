<x-layout.main>
    <div class="flex justify-center flex-col">
        <div class="flex flex-col mb-12 items-center justify-center bg-marslanders-blue p-4 rounded-md">
            <img
                class="w-64 object-cover"
                src="{{ asset('images/marslanders_logo.png') }}"
            >
            <p class="-mt-6 text-sm font-bold tracking-wider text-yellow-400 mb-4">
                The First High-Quality Recursive Revealer on Doginals!
            </p>
            <p class="mt-6 text-slate-100">
                <span class="font-bold">10K</span> MARS LANDERS
            </p>
            <p class="mb-2 text-slate-100">
                <span class="font-bold">{{ $burn_count }}</span> ARE BURNED
            </p>
        </div>

        <x-search/>

        <x-nav-rarity/>
    </div>
</x-layout.main>
