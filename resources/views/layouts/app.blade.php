<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/navbar.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">

    @stack('styles')
    @stack('scripts')

</head>
<body>
    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="/"> Home</a>
        <a href="">Websites</a>
        <a href="">Webshops</a>
        <a href="">Over ons</a>
        <a href="{{ route('contact')}}">Contact</a>
    </div>
    <header id="header" class="{{ Request::is('/')?'header':'header fixed'}}">
    <div class="">
    <section id="section">
      <div class="top">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

        <!-- <p>MENU</p> -->
            <!-- <button class="search"><i class="fa fa-search" aria-hidden="true"></i></button> -->
      </div>
                <div class="title">
                    <h1>
                        Geckowebdevelopment
                    </h1>
                </div>

        
      <div>
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
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <a class="dropdown-item" href="/dashboard">
                        {{ __('Dashboard') }}
                    </a>                      

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
      </div>
    </section>

    <nav id="menu-items">
      <ul>
        <li>
        <a href=""> Websites <br></a>
        </li>
        <li>
        <a href=""> Webshops</a>
        </li>
        <li>
        <a href=""> Over ons</a>
        </li>
        <br>
        <li>
        <a href="{{ route('contact')}}"> Contact </a>
        </li>
      </ul>      
    </nav>
    </div>
</header>



    <div id="app">


        <main class="py-4">

            @yield('content')
            @extends('footer')
        </main>
    </div>
</body>
</html>
