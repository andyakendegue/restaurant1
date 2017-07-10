<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('summernote/summernote.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="#">Forunisseurs<span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">

                            <li><a href="/home/restaurant/add">Ajouter un fournisseur</a></li>
                            <li><a href="/home/restaurant">Tous les fournisseurs</a></li>
                            <li><a href="/home/menu/add">Ajouter une offre</a></li>
                            <li><a href="/home/menu">Toutes les offres</a></li>
                          </ul>

                        </li>

                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="#">Utilisateurs<span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">


                            <li><a href="/home/utilisateurs">Tous les utilisateurs</a></li>
                            <li><a href="/home/messages">Consulter les messages</a></li>
                          </ul>

                        </li>


                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="#">Commandes<span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">

                            <li><a href="/home/commandes">Consulter toutes les commandes</a></li>
                            <li><a href="/home/paiements">Consulter tous les paiements</a></li>
                          </ul>

                        </li>

                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="#">FAQ<span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">

                            <li><a href="/home/faq/add">Ajouter une question</a></li>
                            <li><a href="/home/faq/">Toutes les questions</a></li>
                          </ul>

                        </li>





                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/mail.js') }}"></script>
    <script src="{{ asset('summernote/summernote.min.js')}}"></script>
</body>
</html>
