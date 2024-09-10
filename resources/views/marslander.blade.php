<x-layout.main>
    <div class="flex justify-center flex-col">
        <h1 class="p-4 mt-4 text-2xl text-pink-700">
            Marslander #{{ $marslander->id }}
        </h1>
        <div class="p-4 mt-2">
            <img
                src="{{ $marslander->image_url }}"
                width="500"
                height="500"
                class="rounded-lg"
                alt="Marslander #{{ $marslander->id }}"
            >
        </div>
    </div>
</x-layout.main>
