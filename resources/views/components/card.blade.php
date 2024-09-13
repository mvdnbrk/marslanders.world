<div {{ $attributes->merge(['class' => 'divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow']) }}>
    <div class="px-4 py-5 sm:p-6">
        <a
            href="{{ route('inscription', ['marslander' => $marslander]) }}"
        >
            <img
                class="w-60 rounded-md z-10"
                src="{{ $marslander->image_url }}"
                alt="{{ $marslander->name }}"
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
            {{ $marslander->name }}
        </a>
    </div>
</div>
