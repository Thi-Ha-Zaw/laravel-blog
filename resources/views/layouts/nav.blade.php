<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{-- {{ config('app.name', 'Laravel') }} --}}
            <img src="{{asset("images/two.png")}}" alt="" style="width: 190px">
        </a>
        <button class="btn btn-dark btn-sm   d-block d-md-none me-2 " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class=" ">
                <i class=" bi bi-text-right fs-3 text-white fw-bolder"></i>
            </span>
        </button>

        <div class="collapse navbar-collapse text-center text-lg-start" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto ">
                <!-- Authentication Links -->

                {{-- for authenticated users --}}
                @auth
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('index') }}">Home</a>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('article.index') }}">Dashboard</a>
                </li>

                @endauth

                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
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
                    <li class="nav-item mx-auto mx-md-0">
                        <a style="width: 40px;height:40px;background-color:rgb(49, 49, 49)" class="nav-link d-flex justify-content-center align-items-center  rounded-circle" href="{{ route('chatify') }}">
                            <i class=" bi bi-messenger fs-5 text-white"></i>
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
