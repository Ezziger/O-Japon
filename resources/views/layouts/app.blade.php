<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <meta name="description" content="@yield('metadescription')">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ URL::asset('js/script.js') }}" defer></script>
</head>

<body>
    <nav id="topNav " class="navbar navbar-expand-lg navbar-light fixation">
        <div class="container-fluid">
            <div>
                <form class="d-flex" action="{{ route('lieu.search') }}">
                    <div class="form-group d-flex me-2 mb-0">
                        <input id="search" class="form-control" name="q" type="search" placeholder="Rechercher">
                    </div>
                    <button class="btn btn-outline px-2 pt-0 pb-0 ms-1" type="submit"><i class="fas fa-search p-0"></i></button>
                </form>
            </div>
            @auth
            <div class="welcome">
                <p>Bienvenue</p>
                @endauth
                <a class="navbar-brand" href="{{route('home')}}" ><img src="/images/Logo_O_Japon_1.png"
                   alt="Logo du site O Japon" @guest style="margin: 0 150px;" @endguest></a>
                @auth
                <p class="nav-user-name">{{Auth::user()->pseudo}}</p>
            </div>
            @endauth
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @guest
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-end" style="width: 100%;">
                    <li class="nav-item show">
                        <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register-user') }}">S'enregistrer</a>
                    </li>
                </ul>
                @else
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex align-items-center" style="width: 100%;">
                    <div class="d-flex justify-content-end w-100">
                        @if (Auth::user()->role_id == 2)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.index')}}">Administration</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('lieu.create')}}">Partager une destination</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.show', auth()->user()->id) }}">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('favoris.index') }}">Favoris</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('signout') }}">Se déconnecter</a>
                        </li>
                    </div>
                </ul>
                @endguest
            </div>
        </div>
    </nav>
    @yield('content')
    <footer>
        <div class="footer">
            <p>Copyright © 2021 | Geay Steven | Tous droits réservés</p>
        </div>
    </footer>
</body>

</html>