<x-layout.main>
    <div class="flex justify-center flex-col">
        <h1 class="text-2xl text-orange-700">
            Marslander #{{ $marslander->id }}
        </h1>
        <div class="mt-8">
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
