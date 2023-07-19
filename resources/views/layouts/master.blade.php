<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <style>



    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        @include('layouts.nav')



        <div class=" container">
            <div class="row justify-content-center gx-5">
                <div class="col-12 mt-4">
                    <main class="pb-4 ">
                        @yield('content')
                    </main>
                </div>
                {{-- <div class="col-3 mt-5">
                    @include('layouts.right-sidebar')
                </div> --}}
            </div>
        </div>

    </div>

</body>

</html>
