<x-layout.main>
    <div class="flex justify-center flex-col">
        <div class="flex mb-12 items-center justify-center bg-marslanders-blue p-4 rounded-md">
            <img
                class="w-64 object-cover"
                src="{{ asset('images/marslanders_logo.png') }}"
            >
        </div>

        <x-search/>

        <x-nav-rarity/>
    </div>
</x-layout.main>
