<x-layout.main>
    <div class="flex justify-center flex-col">
        <div class="flex min-h-12 sm:min-h-24 items-center bg-stone-50 dark:bg-slate-800 opacity-90 px-4 rounded-md">
            <h1 class="grow text-xl md:text-3xl font-extrabold text-amber-950 dark:text-stone-100">
                Mars Landers Statistics
            </h1>
        </div>
        <div>
            <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-4">
                <div class="overflow-hidden rounded-lg bg-stone-50 dark:bg-slate-800 opacity-90 px-4 py-5 sm:p-6">
                    <dt class="truncate text-sm font-medium text-stone-500 dark:text-stone-200">SUPPLY</dt>
                    <dd class="mt-1 text-3xl font-semibold tracking-tight text-amber-950 dark:text-stone-100">10K</dd>
                </div>
                <div class="overflow-hidden rounded-lg bg-stone-50 dark:bg-slate-800 opacity-90 px-4 py-5 sm:p-6">
                    <dt class="truncate text-sm font-medium text-stone-500 dark:text-stone-200">BURNED</dt>
                    <dd class="mt-1 text-3xl font-semibold tracking-tight text-amber-950 dark:text-stone-100">{{ $burn_count }}</dd>
                </div>
                <div class="overflow-hidden rounded-lg bg-stone-50 dark:bg-slate-800 opacity-90 px-4 py-5 sm:p-6">
                    <dt class="truncate text-sm font-medium text-stone-500 dark:text-stone-200">ALIVE</dt>
                    <dd class="mt-1 text-3xl font-semibold tracking-tight text-amber-950 dark:text-stone-100">{{ 10000 - $burn_count }}</dd>
                </div>
                @if(Cache::has('doge_price'))
                <div class="overflow-hidden rounded-lg bg-stone-50 dark:bg-slate-800 opacity-90 px-4 py-5 sm:p-6">
                    <dt class="truncate text-sm font-medium text-stone-500 dark:text-stone-200">DOGE PRICE</dt>
                    <dd class="mt-1 text-3xl font-semibold tracking-tight text-amber-950 dark:text-stone-100">$ {{ $doge_price }}</dd>
                </div>
                @endif
            </dl>
        </div>
    </div>

    <div class="mt-5 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden ring-1 shadow-sm ring-black/5 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pr-3 pl-4 text-left text-sm font-semibold text-stone-900 sm:pl-6">Trait</th>
                                <th scope="col"></th>
                                <th scope="col" class="px-3 py-3.5 text-sm text-right font-semibold text-gray-900">Total</th>
                                <th scope="col" class="px-3 py-3.5 text-sm text-right font-semibold text-gray-900">Burned</th>
                                <th scope="col" class="px-3 py-3.5 text-sm text-right font-semibold text-gray-900">Alive</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @php
                                $lastType = null;
                                $row = 0;
                            @endphp
                            @foreach($statistics as $item)
                            <tr class="{{ $item->type !== $lastType && $row > 0 ? 'border-t-4' : '' }}">
                                <td class="py-4 pr-3 pl-4 text-sm font-medium whitespace-nowrap text-gray-900 sm:pl-6">
                                    {{ $item->type !== $lastType ? $item->type : '' }}
                                </td>
                                <td class="px-3 py-4 text-sm whitespace-nowrap text-gray-500">{{ $item->value }}</td>
                                <td class="px-3 py-4 text-sm text-right whitespace-nowrap text-gray-500">{{ $item->total_count }}</td>
                                <td class="px-3 py-4 text-sm text-right whitespace-nowrap text-gray-500">{{ $item->burned_count }}</td>
                                <td class="px-3 py-4 text-sm text-right whitespace-nowrap text-gray-500">{{ $item->total_count - $item->burned_count }}</td>
                            </tr>
                            @php
                                $lastType = $item->type;
                                $row++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout.main>
