<x-layout.main>
    <div class="flex justify-center flex-col">
        <div class="flex items-center min-h-24 bg-white opacity-90 px-4 py-2 rounded-md">
            <h1 class="text-3xl font-extrabold text-amber-950">
                Mars Landers Collection
            </h1>
        </div>

        <div class="flex flex-col mt-14 text-orange-700">
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach($inscriptions as $inscription)
                    <x-card :inscription="$inscription"/>
                @endforeach
            </div>
        </div>

        <div class="mt-12">
            {{ $inscriptions->links() }}
        </div>
    </div>
</x-layout.main>
