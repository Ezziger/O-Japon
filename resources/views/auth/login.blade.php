@extends('dashboard')

@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 p-4 signInWrapper">
                <div class="card-body">
                    <h3 class="text-center">Connexion</h3>
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
                            <button type="submit" class="btn">Se connecter</button>
                        </div>
                    </form>
                    <span>Vous n'avez pas de compte? <a href="{{ route('register-user') }}">Inscription</a></span>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection