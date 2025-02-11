<x-layout.main>
    <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-4 text-gray-800">
            Search Marslanders
        </h1>
        <form action="/search" method="GET">
            @foreach($typesAndValues as $type => $values)
            <fieldset class="mt-8">
                <legend class="text-lg font-semibold text-gray-900">
                    {{ $type }}
                </legend>
                <div class="mt-2 divide-y divide-gray-200 border-t border-b border-gray-200">
                @foreach($values as $value)
                    <div class="relative flex gap-3 py-2">
                        <div class="min-w-0 flex-1 text-sm/6">
                            <label
                                for="{{ Str::of($type)->append('-')->append($value)->lower() }}"
                                class="font-medium text-gray-700 select-none"
                            >
                                {{ $value }}
                            </label>
                        </div>
                        <div class="flex h-6 shrink-0 items-center">
                            <div class="group grid size-4 grid-cols-1">
                                <input
                                    id="{{ Str::of($type)->append('-')->append($value)->lower() }}"
                                    name="{{ Str::of($type)->append('-')->append($value)->lower() }}"
                                    type="checkbox"
                                    class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-blue-600 checked:bg-blue-600 indeterminate:border-blue-600 indeterminate:bg-blue-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto"
                                >
                                <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                                    <path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </fieldset>
            @endforeach

            <button
                type="submit"
                class="mt-10 w-full bg-marslanders-blue text-white p-2 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 cursor-pointer"
            >
                Search
            </button>
        </form>
    </div>
</x-layout.main>

<!--
<select
    name="types[{{ $type }}][]"
    id="{{ $type }}"
    multiple
    class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
>
    @foreach($values as $value)
        <option value="{{ $value }}">{{ $value }}</option>
    @endforeach
</select>
-->
