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

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/dashboard.js'])
</head>

<body>
    <div id="loader">
        <div class=" d-flex min-vh-100 justify-content-center align-items-center fixed-top "
            style="background-color:#111;">
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

        {{-- @include("layouts.nav") --}}

        <section>
            <div class="container-fluid px-0">
                <div class="row g-0">
                    <div class="col-12">
                        <nav class="navbar navbar-expand-md  bg-white sticky-top shadow" id="myNavBar">
                            <div class="container-fluid px-0">
                                <div class=" d-flex align-items-center">
                                    <a class=" ps-2 d-inline-block d-lg-none" id="SlideBtn">
                                        <i class=" bi bi-list"></i>
                                    </a>
                                    <a href="{{route('index')}}">
                                        <div class=" ps-lg-3 ps-0">
                                            <img src="{{ asset('images/two.png') }}" alt="" height="30px">
                                        </div>
                                    </a>
                                </div>
                                <button class="btn btn-dark btn-sm py-0 d-block d-md-none  me-3" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="">
                                        <i class=" bi bi-text-right text-white fs-4"></i>
                                    </span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-5 align-items-center">

                                        @auth
                                            <li class=" nav-item">
                                                <a href="{{ route('index') }}" class=" nav-link">Home</a>
                                            </li>
                                            <li class=" nav-item">
                                                <a href="{{ route('home') }}" class=" nav-link">Welcome</a>
                                            </li>
                                            <li class="nav-item dropdown ps-3">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" v-pre>
                                                    <span style="font-weight: bolder; font-size:15px">
                                                        {{ Auth::user()->name }}

                                                    </span>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>
                                            <li class="nav-item ms-0">
                                                <a style="width: 40px;height:40px;background-color:rgb(49, 49, 49)"
                                                    class="nav-link d-flex justify-content-center align-items-center  rounded-circle"
                                                    href="{{ route('chatify') }}">
                                                    <i class=" bi bi-messenger fs-5 text-white"></i>
                                                </a>
                                            </li>
                                        @endauth

                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="col-lg-2">
                        @include('layouts.dashboard-sidebar')
                    </div>
                    <div class="col-lg-10">
                        <div
                            class="row mx-0 justify-content-center align-content-start vh-100 overflow-scroll bg-success">

                            <div class=" col-12">

                                @yield('content')

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>
</body>

@stack('script')

</html>
