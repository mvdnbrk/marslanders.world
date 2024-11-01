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
    <body class="bg-slate-200 bg-cover bg-no-repeat bg-fixed" style="background-image: url('https://cdn.marslanders.world/images/bg-light.webp')">
        <x-nav-header/>

        <main>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>

        <x-layout.footer/>
    </body>
</html>
