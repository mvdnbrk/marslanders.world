<x-layout.main>
    <div class="flex justify-center flex-col">
        <div class="flex min-h-12 sm:min-h-24 items-center bg-stone-50 dark:bg-slate-800 opacity-90 px-4 py-2 rounded-md">
            @if(Route::currentRouteNamed('collection.burned'))
            <x-icon-flame class="w-8 h-8 mr-4 text-red-600"/>
            @endif
            <h1 class="text-xl md:text-3xl font-extrabold text-amber-950 dark:text-stone-100">
                @if ($rarity)
                {{ $rarity->name() }} Mars Landers
                @elseif (Route::currentRouteNamed('collection.burned'))
                Burned Mars Landers
                @else
                Mars Landers Collection
                @endif
            </h1>
        </div>

        <x-nav-rarity/>

        <div class="flex flex-col mt-14">
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach($inscriptions as $inscription)
                    <x-card :inscription="$inscription"/>
                @endforeach
            </div>
        </div>

        <div class="mt-12">
            {{ $inscriptions->links() }}
        </div>
    </div>
</x-layout.main>
