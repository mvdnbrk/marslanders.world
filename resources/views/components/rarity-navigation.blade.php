<nav class="mt-6">
    <ul class="flex space-x-4">
        @foreach($rarities as $rarity)
        <li>
            <a
                href="{{ route('collection.rarity', ['rarity' => strtolower($rarity->name)]) }}"
                class="px-3 py-2 rounded-md text-sm font-medium {{ $rarity->styles() }} bg-white hover:text-white hover:bg-gray-700"
            >
                {{ $rarity->name() }}
            </a>
        </li>
        @endforeach
    </ul>
</nav>
