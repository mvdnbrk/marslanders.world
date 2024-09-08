<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        @vite('resources/css/app.css')
    </head>
    <body class="bg-pink-100">
        <div class="flex justify-center">
            <h1 class="p-8 text-3xl text-pink-700">
                Welcome to the one and only Marslanders!
            </h1>
        </div>
    </body>
</html>
