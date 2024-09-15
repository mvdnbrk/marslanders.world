<x-layout.main>
    <div class="flex justify-center flex-col">
        <h1 class="text-2xl text-orange-700">
            Mars Landers Collection
        </h1>

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
