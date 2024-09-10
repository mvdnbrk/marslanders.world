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
            <h1 class="p-8 text-3xl text-pink-700">
                Welcome to the one and only Marslanders!
            </h1>

            <h2 class="p-8 text-4xl text-pink-700">
                TO THE MOON!
            </h2>

            @if(config('services.twitter.handle'))
            <a
                href="{{ Str::of('https://x.com/')->append(config('services.twitter.handle')) }}"
                class="p-8 text-pink-700 hover:text-pink-500"
                target="_blank"
            >
                <x-icon-twitter-x class="w-6"/>
            </a>
            @endif
        </div>
    </body>
</html>
