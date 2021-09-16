<!DOCTYPE html>
<html>
<head>
    <title>O Japon</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo asset('style.css')?>" type="text/css">
<script type="text/javascript" src="{{ URL::asset('script.js') }}"></script>
</head>

<body>

    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
                <a class="navbar-brand mr-auto" href="{{route('lieux.index')}}">O Japon</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
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
