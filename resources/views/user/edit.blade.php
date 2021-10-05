@extends('dashboard')

@section('content')

<form method="POST" action="{{ route('user.update', $user->id) }}">
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
    <button type="submit" class="btn btn-primary">Modifier vos informations personnelles</button>
</form>

<form action="{{ route('user.updatePassword', $user->id) }}" method="POST">
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
    <button type="submit" class="btn btn-primary">Modifier votre mot de passe</button>
</form>
<form action="{{ route('user.destroy', $user->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">Supprimer votre profil</button>
</form>

@endsection