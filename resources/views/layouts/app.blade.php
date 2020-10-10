<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PreservSign') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}" ></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2&family=Cookie&display=swap" rel="stylesheet" />


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app-completed-transaction-styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app-payment-styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app-styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app-topnav-styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/crud-address-styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/crud-card-styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/crud-plans-styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/crud-subscription-styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home-about-styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home-contact-styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home-plans-styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home-styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/view-address-styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/view-contact-styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/view-logs-styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/view-plans-styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/view-subscriptions-styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <div class="topnav" id="myTopnav">
    <a class="navbar-logo" href='{{ route('home') }}'>PreservSign</a>
        <a href="{{ route('plans.index') }}">PLANOS</a>
        <a href="{{ route('about') }}">SOBRE</a>
        <a href="{{ route('contact.create') }}">CONTATO</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">

                @guest
                <div class="top-nav-opt">
                    <a class="top-nav-login" href="{{ route('login') }}">LOGIN</a>
                </div>

                <a class="top-nav-opt" href="{{ route('register') }}">
                    <div class="sign-background">
                        <div class="top-nav-sign">
                            ASSINE!
                        </div>
                    </div>
                </a>

                @if (Route::has('register'))
                @endif
                @else
                <div class="top-nav-dropdown top-nav-logged test-class">
                    <button class="top-nav-dropbtn">OLÁ, <?= strtoupper(explode(' ', Auth::user()->name)[0]) . " " . "<i class='fa fa-angle-down'></i>" ?></button>
                    <div class="top-nav-dropdown-content">
                        <a href="{{ route('profile') }}">
                            {{ __('Perfil') }}
                        </a>
                        <a href="{{ route('subscription.index') }}">
                            {{ __('Minhas Assinaturas') }}
                        </a>
                        @if (Auth::user()->groupid == 2)
                            <a href="{{ route('log.index') }}">
                                {{ __('Logs de alterações') }}
                            </a>
                        @endif
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                @endguest

            </li>

        </ul>

    </div>

    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>
    <script src="js/bootstrap.min.js"></script>

    @yield('content')

</html>