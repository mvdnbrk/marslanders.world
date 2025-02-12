<footer class="bg-white dark:bg-stone-950 opacity-90 mt-12 mb-2 py-8 border-t border-amber-100 dark:border-stone-600 drop-shadow-md">
    <div class="flex mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 gap-x-16">
        <p class="grow text-sm leading-5 text-amber-800 dark:text-stone-400">
            &copy; 2024 {{ config('app.name') }}. All rights reserved.
        </p>
        @if(Cache::has('doge_price'))
        <p class="text-sm leading-5 text-amber-800 dark:text-stone-400">
            DOGE PRICE: ${{ Number::format(Cache::get('doge_price'), maxPrecision: 4) }}
        <p>
        @endif
        <x-twitter-link class="-mt-4 shrink-0 pr-2"/>
    </div>
</footer>
