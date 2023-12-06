<!doctype html>
<html class="antialiased" lang="ru">

@props(['headtitle', 'categories'])
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @vite('resources/js/app.js')
    <x-styles.base />

    <title>{{ config('app.name') }} - {{ $headtitle ?? 'Главная странца' }}</title>

</head>

<body class="bg-white text-gray-600 font-sans leading-normal text-base tracking-normal flex min-h-screen flex-col">

    <div class="wrapper flex flex-1 flex-col">

        @isset($header)
            {{ $header }}
        @else
            <x-panels.header.header />
        @endisset

        @isset($breadcrumbs)
            {{ $breadcrumbs }}
        @endisset

        @isset($main)
            {{ $main }}
        @endisset

        @isset($footer)
            {{ $footer }}
        @else
            <x-panels.footer.footer />
        @endisset

    </div>

</body>

</html>
