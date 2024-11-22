<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <meta name="description" content="Mars Landers, The First High-Quality Recursive Revealer on Doginals!">

        <x-head.favicons/>
        <x-head.meta-opengraph/>
        <x-head.meta-twitter/>

        @vite('resources/css/app.css')

        @if(config('services.fathom.site_id'))
        <script src="https://cdn.usefathom.com/script.js" data-site="{{ config('services.fathom.site_id') }}" defer></script>
        @endif
    </head>
    <body class="flex flex-col min-h-screen bg-stone-50 dark:bg-stone-900 bg-light dark:bg-dark bg-cover bg-no-repeat bg-fixed">
        <x-nav-header/>

        <main class="flex-grow">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>

        <x-layout.footer/>
    </body>
</html>
