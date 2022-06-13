<!doctype html>
<html lang="en">
<head>
    <title>GestionRV</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ url ('menuTemp/css/style.css')}}">

</head>
<body>
<div class="wrap">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col">
                <p class="mb-0 phone"><span class="fa fa-phone"></span> <a href="#">+00 1234 567</a></p>
            </div>
        </div>
    </div>
</div>


<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="nav-link dropdown-toggle" href="#" id="logoutd" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle"></i> {{ Auth::user()->name }}</a>
        <div class="dropdown-menu" aria-labelledby="logoutd">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();"> {{ __('Logout') }}
            </a>
        </div>

        <form action="#" class="searchform order-sm-start order-lg-last">
            <div class="form-group d-flex">
                <input type="text" class="form-control pl-3" placeholder="Search">
                <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
            </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav m-auto">
                <li class="nav-item active"><a href="{{ route('listproduit') }}" class="nav-link">Produit</a></li>
                <li class="nav-item"><a href="{{ route('listcategorie') }}" class="nav-link">Catégorie</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Entrée</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="{{ route('listentree') }}">Liste des entrées</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sortie</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="{{ route('listsortie') }}">Liste des sorties</a>
                    </div>
                </li>
                <li class="nav-item"><a href="{{ route('listutilisateur') }}" class="nav-link"></i>Utilisateur</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="py-4">
    @yield('content')
</main>

<script src="{{url('menuTemp/js/jquery.min.js')}}"></script>
<script src="{{url('menuTemp/js/popper.js')}}"></script>
<script src="{{url('menuTemp/js/bootstrap.min.js')}}"></script>
<script src="{{url('menuTemp/js/main.js')}}"></script>

</body>
</html>















<!--doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>


    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <ul class="navbar-nav ms-auto">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html-->
