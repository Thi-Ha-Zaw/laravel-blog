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
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
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
                    <div class="col-lg-2">
                        <div class=" d-flex flex-column vh-100 overflow-scroll bg-secondary p-3" id="sideBar">
                            <div class="mx-auto mb-3">
                                {{-- <img src="https://coderthemes.com/hyper/saas/assets/images/logo.png" alt="" height="22px"> --}}
                            </div>
                            <div class="">
                                <ul class="">
                                    <li class="text-white-50 mt-4" style="font-size: 12px;">
                                        <a href="#" class="text-decoration-none text-white-50">NAVIGATION</a>
                                    </li>
                                    <li class=" ps-3">
                                        <ul>
                                            <li class="sidebar-item text-white-50  pt-4">
                                                <div>
                                                    <i class=" bi bi-house pe-3"></i>
                                                    <a href="{{ route('index') }}"
                                                        class="text-decoration-none text-white-50 sidebar-link">Home
                                                        Page</a>
                                                </div>

                                            </li>
                                        </ul>
                                    </li>
                                    <li class="text-white-50 mt-4" style="font-size: 12px;">
                                        <a href="#" class="text-decoration-none text-white-50">APPS</a>
                                    </li>
                                    <li class=" ps-3">
                                        <ul>
                                            @auth
                                                <li class="sidebar-item text-white-50 pt-4">
                                                    <a href="{{ route('article.create') }}"
                                                    class=" text-white-50 text-decoration-none sidebar-link">
                                                    <div class="">
                                                        <div class="">
                                                            <i class="bi bi-pen pe-3"></i>
                                                            <span>
                                                               Create
                                                                    Article
                                                            </span>
                                                        </div>
                                                    </div>
                                                </a>
                                                </li>
                                                <li class="sidebar-item text-white-50 pt-4">
                                                    <a href="{{ route('article.index') }}"
                                                        class=" text-white-50 text-decoration-none sidebar-link">
                                                        <div class="">
                                                            <div class="">
                                                                <i class="bi bi-text-right pe-3"></i>
                                                                <span>
                                                                    Article List
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                @can('viewAny', App\Models\Category::class)
                                                    <li class="sidebar-item text-white-50 pt-4">
                                                        <a href="{{ route('category.create') }}"
                                                        class=" text-white-50 text-decoration-none sidebar-link">
                                                        <div class="">
                                                                <i class="bi bi-pencil pe-3"></i>
                                                                <span>
                                                                   Create
                                                                        Category
                                                                </span>
                                                        </div>
                                                    </a>
                                                    </li>
                                                    <li class="sidebar-item text-white-50 pt-4">
                                                        <a href="{{ route('category.index') }}"
                                                                        class=" text-white-50 text-decoration-none sidebar-link">
                                                        <div class="">
                                                            <div class="">
                                                                <i class="bi bi-grid-fill pe-3"></i>
                                                                <span>
                                                                     Category
                                                                        List
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    </li>
                                                @endcan
                                                @can('admin-only')
                                                    <li class="sidebar-item text-white-50 pt-4">
                                                        <a href="{{ route('users') }}"
                                                                        class=" text-white-50 text-decoration-none sidebar-link">
                                                        <div class="">
                                                            <div class="">
                                                                <i class="bi bi-person pe-3"></i>

                                                                <span>
                                                                    User
                                                                </span>

                                                            </div>
                                                        </div>
                                                    </a>
                                                    </li>
                                                @endcan

                                            @endauth
                                        </ul>
                                    </li>
                                    {{-- <li class="text-white-50 mt-4" style="font-size: 12px;">
                                    <a href="#" class="text-decoration-none text-white-50">APPS</a>
                                </li>
                                <li class=" ps-3">
                                    <ul>
                                        <li class="sidebar-item text-white-50 pt-4">
                                            <div class="">
                                                <div class="accordion-flush" id="Eg-one">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed w-100" type="button" data-bs-toggle="collapse" data-bs-target="#One" aria-expanded="false" aria-controls="One">
                                                            <div class=" d-flex justify-content-between w-100" id="HII">
                                                                <div class="">
                                                                    <i class="bi bi-cart-plus pe-3"></i>
                                                                    <span>Ecommerce</span>
                                                                </div>
                                                                <i class="bi bi-chevron-right accordion-icon"></i>
                                                            </div>
                                                        </button>
                                                        </h2>
                                                        <div id="One" class="accordion-collapse collapse" data-bs-parent="#Eg-one">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li class="accordion-body-item">User</li>
                                                                <li class="accordion-body-item">Profile</li>
                                                                <li class="accordion-body-item">Inovice</li>
                                                                <li class="accordion-body-item">FAQ</li>
                                                                <li class="accordion-body-item">Maintainence</li>
                                                            </ul>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="sidebar-item text-white-50 pt-4">
                                            <div class="">
                                                <div class="accordion-flush" id="Eg-two">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed w-100" type="button" data-bs-toggle="collapse" data-bs-target="#Two" aria-expanded="false" aria-controls="Two">
                                                            <div class=" d-flex justify-content-between w-100">
                                                                <div class="">
                                                                    <i class="bi bi-mailbox2 pe-3"></i>
                                                                    <span>Email</span>
                                                                </div>
                                                                <i class="bi bi-chevron-right accordion-icon"></i>
                                                            </div>
                                                        </button>
                                                        </h2>
                                                        <div id="Two" class="accordion-collapse collapse" data-bs-parent="#Eg-two">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li class="accordion-body-item">User</li>
                                                                <li class="accordion-body-item">Profile</li>
                                                                <li class="accordion-body-item">Inovice</li>
                                                                <li class="accordion-body-item">FAQ</li>
                                                                <li class="accordion-body-item">Maintainence</li>
                                                            </ul>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="sidebar-item text-white-50 pt-4">
                                            <div class="">
                                                <div class="accordion-flush" id="Eg-three">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed w-100" type="button" data-bs-toggle="collapse" data-bs-target="#Three" aria-expanded="false" aria-controls="Three">
                                                            <div class=" d-flex justify-content-between w-100">
                                                                <div class="">
                                                                    <i class="bi bi-box pe-3"></i>
                                                                    <span>Projects</span>
                                                                </div>
                                                                <i class="bi bi-chevron-right accordion-icon"></i>
                                                            </div>
                                                        </button>
                                                        </h2>
                                                        <div id="Three" class="accordion-collapse collapse" data-bs-parent="#Eg-three">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li class="accordion-body-item">User</li>
                                                                <li class="accordion-body-item">Profile</li>
                                                                <li class="accordion-body-item">Inovice</li>
                                                                <li class="accordion-body-item">FAQ</li>
                                                                <li class="accordion-body-item">Maintainence</li>
                                                            </ul>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="sidebar-item text-white-50 pt-4">
                                            <div class="">
                                                <div class="accordion-flush" id="Eg-four">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed w-100" type="button" data-bs-toggle="collapse" data-bs-target="#Four" aria-expanded="false" aria-controls="Four">
                                                            <div class=" d-flex justify-content-between w-100">
                                                                <div class="">
                                                                    <i class="bi bi-file-check pe-3"></i>
                                                                    <span>Tasks</span>
                                                                </div>
                                                                <i class="bi bi-chevron-right accordion-icon"></i>
                                                            </div>
                                                        </button>
                                                        </h2>
                                                        <div id="Four" class="accordion-collapse collapse" data-bs-parent="#Eg-four">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li class="accordion-body-item">User</li>
                                                                <li class="accordion-body-item">Profile</li>
                                                                <li class="accordion-body-item">Inovice</li>
                                                                <li class="accordion-body-item">FAQ</li>
                                                                <li class="accordion-body-item">Maintainence</li>
                                                            </ul>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="sidebar-item text-white-50 pt-4">
                                            <div class="">
                                                <div class="accordion-flush" id="Eg-five">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed w-100" type="button" data-bs-toggle="collapse" data-bs-target="#Five" aria-expanded="false" aria-controls="Five">
                                                            <div class=" d-flex justify-content-between w-100">
                                                                <div class="">
                                                                    <i class="bi bi-layers pe-3"></i>
                                                                    <span>Pages</span>
                                                                </div>
                                                                <i class="bi bi-chevron-right accordion-icon"></i>
                                                            </div>
                                                        </button>
                                                        </h2>
                                                        <div id="Five" class="accordion-collapse collapse" data-bs-parent="#Eg-five">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li class="accordion-body-item">User</li>
                                                                <li class="accordion-body-item">Profile</li>
                                                                <li class="accordion-body-item">Inovice</li>
                                                                <li class="accordion-body-item">FAQ</li>
                                                                <li class="accordion-body-item">Maintainence</li>
                                                            </ul>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="text-white-50 mt-4" style="font-size: 12px;">
                                    <a href="#" class="text-decoration-none text-white-50">CUSTOM</a>
                                </li>
                                <li class=" ps-3">
                                    <ul>
                                        <li class="sidebar-item text-white-50 pt-4">
                                            <div>
                                                <i class=" bi bi-calendar2-check pe-2"></i>
                                                <a href="#" class="text-decoration-none text-white-50 sidebar-link">Calendar</a>
                                            </div>
                                        </li>
                                        <li class="sidebar-item text-white-50 pt-4">
                                            <div>
                                                <i class=" bi bi-chat pe-2"></i>
                                                <a href="#" class="text-decoration-none text-white-50 sidebar-link">Chat</a>
                                            </div>
                                        </li>
                                        <li class="sidebar-item text-white-50 pt-4">
                                            <div>
                                                <i class=" bi bi-calendar2-check pe-2"></i>
                                                <a href="#" class="text-decoration-none text-white-50 sidebar-link">Calendar</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="row mx-0 justify-content-center align-content-start vh-100 overflow-scroll bg-success">
                            <nav class="navbar navbar-expand-lg shadow-sm bg-white sticky-top ">
                                <div class="container-fluid px-0">
                                    <a class="navbar-brand ps-2" href="#" id="SlideBtn">
                                        <i class=" bi bi-list"></i>
                                    </a>
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <div>
                                            <img src="{{ asset('images/two.png') }}" alt="" height="30px">
                                        </div>
                                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-5 align-items-center">

                                            @auth
                                            <li class=" nav-item">
                                                <a href="{{route('index')}}" class=" nav-link">Home</a>
                                            </li>
                                            <li class=" nav-item">
                                                <a href="{{route('home')}}" class=" nav-link">Welcome</a>
                                            </li>
                                            <li class="nav-item dropdown ps-3">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    <span style="font-weight: bolder; font-size:15px">
                                                        {{ Auth::user()->name }}

                                                    </span>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>
                                            <li class="nav-item ms-0">
                                                <a style="width: 40px;height:40px;background-color:rgb(49, 49, 49)" class="nav-link d-flex justify-content-center align-items-center  rounded-circle" href="{{ route('chatify') }}">
                                                    <i class=" bi bi-messenger fs-5 text-white"></i>
                                                </a>
                                            </li>
                                            @endauth

                                        </ul>
                                    </div>
                                </div>
                            </nav>
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
