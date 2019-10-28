<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv='X-UA-Compatible' content='IE=11'>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ url(mix('css/app.css')) }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            @if(\Illuminate\Support\Facades\Auth::check())
                @include('layouts.menu')
            @endif
            @yield('content')
        </div>
        <script src="{{ url(mix('js/app.js')) }}"></script>
    @yield('javascript')
    </body>
</html>
