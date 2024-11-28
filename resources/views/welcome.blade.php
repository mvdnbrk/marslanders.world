<x-layout.main>
    <div class="flex justify-center flex-col">
        <div class="flex flex-col mb-12 items-center justify-center bg-marslanders-blue p-4 rounded-md">
            <img
                class="w-64 object-cover"
                src="{{ asset('images/marslanders_logo.png') }}"
            >
            <p class="text-sm font-bold tracking-wider text-yellow-400 mb-4">
                The First High-Quality Recursive Revealer on Doginals!
            </p>
        </div>

        <x-search/>

        <x-nav-rarity/>
    </div>
</x-layout.main>
