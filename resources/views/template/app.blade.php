<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Rezeptsammlung | @yield('title')</title>
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!--    Icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--    Fonts-->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Montserrat:wght@600;700&display=swap" rel="stylesheet"> -->

    <link rel="stylesheet" href="{{url('/css/app.css')}}" text="text/css">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{url('favicons/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{url('favicons/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{url('favicons/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('favicons/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{url('favicons/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{url('favicons/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{url('favicons/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{url('favicons/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{url('favicons/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{url('favicons/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{url('favicons/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('favicons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{url('favicons/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    <!--Navigation-->

    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
        <a class="navbar-brand" href="/">Rezeptsammlung</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item {{Request::path() === 'categories' ? 'active':''}}">
                    <a class="nav-link" href="/categories">Kategorien</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::path() === 'recipes/create' ? 'active':''}}" href="/recipes/create">Neues Rezept erstellen</a>
                </li>
            </ul>
            
            <ul class="navbar-nav ml-auto">

            <form action="/search" method="POST" role="search" class="form-inline my-2 my-lg-0">
                @csrf
            <input name="search" class="form-control mr-sm-2" type="search" placeholder="Rezept suchen">
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Suchen</button>
            </form>
            <!-- Authentication -->

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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/home">Dashboard</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>

                            </li>
                        @endguest
</ul>
        </div>

        </div>
    </nav>
    <main>
    <div class="container mb-5">

    <div class="mx-auto mb-2 px-3 py-3 pt-md-5 pb-md-4 text-center">
            <h2 class="display-4">@yield('headline')</h2>
        </div>

    @yield('content')

    </div>
    </main>
</div>
</body>