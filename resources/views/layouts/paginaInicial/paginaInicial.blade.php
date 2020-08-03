<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SisPef') }}</title>

    @include('layouts.paginaInicial.requiredStyles')

    {{--section para css--}}
    @yield('myStyles')


</head>
<body>

    @include('paginaInicial.navBar')

<div id="app">
    <main class="py-4">
        @yield('content')
    </main>
</div>

@include('static.footer')

@include('layouts.paginaInicial.requiredJs')

@yield('myScripts')

</body>
</html>
