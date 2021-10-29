@extends('layouts.app')

@section('content')
<main class="signup-form m-0">
    <div class="container-fluid background backgroundRegistration">
        <div class="row centrage">
        <div class="col-md-6 col-xl-4 p-4 signInWrapper gif mb-5">
                <div class="card-body">
                    <h2 class="text-center">Enregistrement de l'utilisateur</h2>
                    <form action="{{ route('register.client') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Pseudonyme" id="pseudo" class="form-control" name="pseudo" required>
                            @if ($errors->has('pseudo'))
                            <span class="text-danger">{{ $errors->first('pseudo') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Email" id="email" class="form-control" name="email" required>
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" placeholder="Mot de passe" id="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ 'Votre mot de passe doit contenir 8 lettres minimum , 15 lettres maximum, une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial !'}}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" placeholder="Confirmation du mot de passe" id="password_confirmation" class="form-control" name="password_confirmation" required>
                            @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ 'Vos mots de passe ne sont pas identiques !'}}</span>
                            @endif
                        </div>
                        <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-light btn-sm mt-4">S'enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
@endsection