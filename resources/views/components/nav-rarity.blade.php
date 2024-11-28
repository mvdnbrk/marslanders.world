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
        <li class="pl-4">
            <a
                href="{{ route('collection.burned') }}"
                class="px-3 py-2 rounded-md text-sm font-medium bg-white hover:text-white hover:bg-gray-700"
            >
                Burned
            </a>
        </li>
    </ul>
</nav>
