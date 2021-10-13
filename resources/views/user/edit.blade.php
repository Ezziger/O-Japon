@extends('dashboard')

@section('content')

<main>
    <h2>Modifier votre profil</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1 mb-5">
                <h3 class="text-center">Modifier vos informations personnelles</h3>
                <form class="d-flex flex-column" method="POST" action="{{ route('user.update', $user->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{ $user->nom }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prenom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $user->prenom }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                    </div>
                    <button type="submit" class="btn btn-outline-dark btn-sm">Modifier vos informations personnelles</button>
                </form>
            </div>
            <div class="col-lg-5 offset-lg-1 mb-5">
                <h3 class="text-center">Modifier votre mot de passe</h3>
                <form class="d-flex flex-column" action="{{ route('user.updatePassword', $user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="oldPassword" class="form-label">Votre mot de passe actuel</label>
                        <input type="password" class="form-control" id="oldPassword" name="oldPassword">
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Votre nouveau mot de passe</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword">
                    </div>
                    <div class="mb-3">
                        <label for="newPassword_confirmation" class="form-label">Confirmez votre nouveau mot de passe</label>
                        <input type="password" class="form-control" id="newPassword_confirmation" name="newPassword_confirmation">
                    </div>
                    <button type="submit" class="btn btn-outline-dark btn-sm">Modifier votre mot de passe</button>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection