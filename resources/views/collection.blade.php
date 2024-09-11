<x-layout.main>
    <div class="flex justify-center flex-col">
        <h1 class="p-4 mt-4 text-2xl text-pink-700">
            Marslanders Collection
        </h1>

        <div class="flex flex-col p-4 mt-4 text-pink-700">
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach($marslanders as $marslander)
                    <x-card :marslander="$marslander"/>
                @endforeach
            </div>
        </div>

        <div class="p-4 mt-6">
            {{ $marslanders->links() }}
        </div>
    </div>
</x-layout.main>
