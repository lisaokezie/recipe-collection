<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rezeptsammlung | @yield('title')</title>
    <link rel="stylesheet" href="{{url('/css/app.css')}}" text="text/css">
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!--    Icons-->
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    <!--    Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Montserrat:wght@600;700&display=swap" rel="stylesheet">

</head>

<body>
    <!--Navigation-->

    <nav class="navbar navbar-expand-lg navbar-light bg-light container-md">
        <a class="navbar-brand" href="/">Rezeptsammlung</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item {{Request::path() === 'recipes' ? 'active':''}}">
                    <a class="nav-link" href="/recipes">Rezepte<span class="sr-only"></span></a>
                </li>
                <li class="nav-item {{Request::path() === 'categories' ? 'active':''}}">
                    <a class="nav-link" href="/categories">Kategorien</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::path() === 'recipes/create' ? 'active':''}}" href="/recipes/create">Neues Rezept erstellen</a>
                </li>
            </ul>
            <form action="/search" method="POST" role="search" class="form-inline my-2 my-lg-0">
                @csrf
            <input name="search" class="form-control mr-sm-2" type="search" placeholder="Rezept suchen">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Suchen</button>
            </form>
        </div>
    </nav>

    <main>
    <div class="container">

    <div class="mx-auto mb-2 px-3 py-3 pt-md-5 pb-md-4 text-center">
            <h2 class="display-4">@yield('headline')</h2>
        </div>

    @yield('content')


    </div>
    </main>
</div>
</body>