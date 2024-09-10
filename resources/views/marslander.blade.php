<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        @vite('resources/css/app.css')

        @if(config('services.fathom.site_id'))
        <script src="https://cdn.usefathom.com/script.js" data-site="{{ config('services.fathom.site_id') }}" defer></script>
        @endif
    </head>
    <body class="bg-pink-100">
        <div class="flex justify-center flex-col">
            <h1 class="p-4 mt-4 text-2xl text-pink-700">
                Marslander #{{ $marslander->id }}
            </h1>
            <div class="p-4 mt-2">
                <img
                    src="{{ $marslander->image_url }}"
                    width="500"
                    height="500"
                    class="rounded-lg"
                    alt="Marslander #{{ $marslander->id }}"
                >
            </div>
        </div>
    </body>
</html>
