<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <div class="d-flex flex-column h-100">
            <nav class="navbar navbar-expand-md navbar-light shadow-sm bg-orange">
                <div class="container bg-orange">
                    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                        <div class="logo_laravel d-flex">
                            <img src="./logo.png" alt="logo" style="max-height: 40px;">
                            <h3 className=" mb-0 align-items-end">Shop</h3>
                        </div>
                        {{-- config('app.name', 'Laravel') --}}
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a>
                        </li> --}}
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('dashboard') }}">{{ __('Dashboard') }}</a>
                                        <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
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
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="flex-grow-1 main">
                @yield('content')
            </main>
            <footer>
                <div class="container-footer mt-5">
                    <div class="container-fluid">
                        <div class="footer-row row">
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 footer-item-list">
                                <div class="footer-title d-flex">
                                    <img src="./logo.png" alt="logo" style="max-height: 40px;">
                                    <h3 class="align-self-end ms-2">Shop</h3>
                                </div>
                                <div class="footer-list ">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Veniam repudiandae, consectetur illum commodi sit ratione
                                        nobis corporis.
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 footer-item-list">
                                <div class="footer-title">
                                    <h4>Links</h4>
                                </div>
                                <div class="footer-list">
                                    <ul>
                                        <li>
                                            <a href="/">Home</a>
                                        </li>
                                        <li>
                                            <a href="/">Women Wear</a>
                                        </li>
                                        <li>
                                            <a href="/">Man Wear</a>
                                        </li>
                                        <li>
                                            <a href="/">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 footer-item-list">
                                <div class="footer-title">
                                    <h4>Important Links</h4>
                                </div>
                                <div class="footer-list">
                                    <ul>
                                        <li>
                                            <a href="/">Home</a>
                                        </li>
                                        <li>
                                            <a href="/">Women Wear</a>
                                        </li>
                                        <li>
                                            <a href="/">Man Wear</a>
                                        </li>
                                        <li>
                                            <a href="/">Contact</a>
                                        </li>
                                        <li>
                                            <a href="/">About</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 footer-item-list">
                                <div class="footer-title">
                                    <h4>
                                        <i class="fa-brands fa-instagram mx-1"></i>
                                        <i class="fa-brands fa-facebook mx-3"></i>
                                        <i class="fa-brands fa-linkedin mx-1"></i>
                                    </h4>
                                </div>
                                <div class="footer-list">
                                    <ul>
                                        <li>
                                            <a href="/">
                                                <i class="fa-solid fa-location-arrow me-2"></i>
                                                Italia Verona VR
                                            </a>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-mobile-screen me-2"></i>
                                            <a href="/">+39 123456789</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    @yield('script')

</body>

</html>
