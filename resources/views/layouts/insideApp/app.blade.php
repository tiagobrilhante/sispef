<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SisPef') }}</title>

    @include('layouts.insideApp.requiredStyles')

    {{--section para css--}}
    @yield('myStyles')



</head>
<body>
<div id="app">
    @include('insideApp.navBar')

    <div class="row">
        <div class="col">

            <div class="alert alert-dark corteste my-0">
                <button type="button" id="sidebarCollapse" class="btn btn-dark btn-sm">
                    <i class="fa fa-align-justify"> </i>
                    <span> Recolher Menu</span>
                </button>

                alertas
            </div>

        </div>
    </div>

    <div class="wrapper">

        {{--sidebar--}}
        @include('insideApp.sidebar')

        {{-- Page Content  --}}
        <div id="content">

            <main>
                @yield('content')
            </main>

        </div>

    </div>

</div>

@include('static.footer')

@include('layouts.insideApp.requiredJs')

@yield('myScripts')

<script>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active__sidebar');
        });
    });
</script>

</body>
</html>
