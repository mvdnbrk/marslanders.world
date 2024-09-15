<div {{ $attributes->merge(['class' => 'divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow']) }}>
    <div class="px-4 py-5 sm:p-6">
        <a
            href="{{ route('inscription', ['inscription' => $inscription]) }}"
        >
            <img
                class="w-60 rounded-md hover:scale-105 ease-out duration-300"
                src="{{ $inscription->image_url }}"
                alt="{{ $inscription->name }}"
                width="500"
                height="500"
            >
        </a>
    </div>
    <div class="px-4 py-4 sm:px-6">
        <a
            class="hover:underline underline-offset-2"
            href="{{ route('inscription', ['inscription' => $inscription]) }}"
        >
            {{ $inscription->name }}
        </a>
    </div>
</div>
