<!DOCTYPE html>
<html data-theme="lightstux" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="mobile-web-app-capable" content="yes">

        <title inertia>{{ config('app.name', 'Stuxnet') }}</title>

        <meta property="og:site_name" content="{{ config('app.name', 'Stuxnet') }}">
        <meta property="og:title" content="{{ config('app.name', 'Stuxnet') }}">
        <meta property="og:type" content="article">
        <meta property="og:url" content="{{request()->url()}}">
        <meta head-key="description" name="description" content="A personal information website about @stux." />
        
        @laravelPWA
        @routes
        @vite('resources/js/app.js')
        @inertiaHead
    </head>
    <body class="bg-base-100 dark:bg-gray-800">
        @inertia
    </body>
</html>
