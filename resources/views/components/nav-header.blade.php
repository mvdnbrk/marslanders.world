<nav class="py-4 mb-12 bg-slate-800 border-b border-b-slate-400 shadow-md">
    <div class="flex mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <span class="grow">
            <a
                class="text-orange-100 hover:text-orange-400"
                href="{{ route('home') }}"
            >
                home
            </a>
            <a
                class="ml-4 text-orange-100 hover:text-orange-400"
                href="{{ route('collection') }}"
            >
                collection
            </a>
            <a
                class="ml-4 text-orange-100 hover:text-orange-400"
                href="{{ route('statistics') }}"
            >
                statistics
            </a>
        </span>
        <span class="ml-4 shrink-0">
            <a
                type="button"
                href="https://doggy.market/nfts/marslanders"
                target="_blank"
                class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-inset ring-gray-300 hover:bg-gray-100"
            >
                BUY NOW
            </a>
        </span>
    </div>
</nav>
