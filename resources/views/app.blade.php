<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="mobile-web-app-capable" content="yes">

        <title inertia>{{ config('app.name', 'Stuxnet') }}</title>

        <meta property="og:site_name" content="{{ config('app.name', 'LifeDash') }}">
        <meta property="og:title" content="{{ config('app.name', 'LifeDash') }}">
        <meta property="og:type" content="article">
        <meta property="og:url" content="{{request()->url()}}">

        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Open+Sans:wght@400;600;700&display=swap">

        @laravelPWA
        @routes
        @vite('resources/js/app.js')
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
