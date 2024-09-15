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
    </div>
</x-layout.main>
