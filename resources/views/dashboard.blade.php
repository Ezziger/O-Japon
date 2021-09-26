<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <meta name="description" content=@yield('metadescription')>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ URL::asset('js/script.js') }}" defer></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{route('lieux.index')}}">O Japon</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-end" style="width: 100%;">
                @guest
                    <li class="nav-item show">
                        <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register-user') }}">S'enregistrer</a>
                    </li>
                @else
                    <li class="nav-item">Bonjour {{Auth::user()->prenom}}</li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('lieux.create')}}">Partager une destination</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Se déconnecter</a>
                    </li>
                    @endguest
                </ul>
            </div>
            <form class="d-flex" action="{{ route('lieux.search') }}">
                <div class="form-group">
                    <input class="form-control" name="q" type="search" placeholder="Rechercher">
                </div>
                <button class="btn btn-outline pe-1" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </nav>
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif
    @yield('content')
</body>

</html>