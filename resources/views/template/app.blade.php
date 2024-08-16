<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>@yield('title')</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <h1 class="text-3xl m-10 font-bold">@yield('title')</h1>

        @yield('content')
    </body>
</html>