<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('page.title')</title>
        @vite('resources/js/app.js')
    </head>
    <body>
        @include('partials.header')
        <main>
            @yield('page.main')
        </main>
        @include('partials.footer')
    </body>
</html>