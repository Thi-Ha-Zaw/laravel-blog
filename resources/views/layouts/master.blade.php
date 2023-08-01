<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>UCSM News</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <style>



    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/comment.js'])
</head>

<body>
    <div id="loader">
        <div class=" d-flex min-vh-100 justify-content-center align-items-center fixed-top " style="background-color:#111;">
            <div class="circ">
                    <div class="load">Loading . . . </div>
                    <div class="hands"></div>
                    <div class="body"></div>
                    <div class="head">
                    <div class="eye"></div>
                    </div>
            </div>
        </div>
    </div>
    <div id="app">
        @include('layouts.nav')



        <div class=" container">
            <div class="row justify-content-center">
                <div class="col-12 mt-3 mt-lg-4">
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
   @stack('script')
</body>

</html>
