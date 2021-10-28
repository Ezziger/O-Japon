@extends('layouts.app')

@section('content')
<main class="login-form m-0">
    <div class="container-fluid background backgroundLogin">
        <div class="row centrage">
        <div class="col-md-6 col-xl-4 p-4 signInWrapper gif mb-5">
                <div class="card-body">
                    <h2 class="text-center">Connexion</h2>
                    <form method="POST" action="{{ route('login.client') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Email" id="email" class="form-control" name="email" required>
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" placeholder="Mot de passe" id="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-light btn-sm mt-4">Se connecter</button>
                        </div>
                    </form>
                    <span>Vous n'avez pas de compte? <a href="{{ route('register-user') }}">Inscription</a></span>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection