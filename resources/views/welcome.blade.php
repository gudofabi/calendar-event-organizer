<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="/css/app.css" rel="stylesheet">
    </head>
    <body class="min-h-screen bg-gray-200">
        <div id="app">
            <div class="min-h-screen md:flex">
                <div class="flex-1 min-h-screen text-gray-800">
                    <main class="container mx-auto md:container md:mx-auto sm:container sm:mx-auto">
                        <router-view></router-view>
                    </main>
                </div>
            </div>
        </div>

        <script src="{{ mix('js/manifest.js') }}"></script>
        <script src="{{ mix('js/vendor.js') }}"></script>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
