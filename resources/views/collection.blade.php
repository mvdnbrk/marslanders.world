<x-layout.main>
    <div class="flex justify-center flex-col">
        <h1 class="p-4 mt-4 text-2xl text-pink-700">
            Marslanders Collection
        </h1>

        <div class="flex flex-col p-4 mt-4 text-pink-700">
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach($marslanders as $marslander)
                <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
                    <div class="px-4 py-5 sm:p-6">
                        <a
                            href="{{ route('inscription', ['marslander' => $marslander]) }}"
                        >
                            <img
                                class="w-60 rounded-md z-10"
                                src="{{ $marslander->image_url }}"
                                alt="Marslander #{{ $marslander->id }}"
                                width="500"
                                height="500"
                            >
                        </a>
                    </div>
                    <div class="px-4 py-4 sm:px-6">
                        <a
                            class="hover:underline"
                            href="{{ route('inscription', ['marslander' => $marslander]) }}"
                        >
                            Marslander #{{ $marslander->id }}
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="p-4 mt-6">
            {{ $marslanders->links() }}
        </div>
    </div>
</x-layout.main>
