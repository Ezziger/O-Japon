@extends('layouts.app')

@section('content')

<main class="login-form m-0">
    <div class="container-fluid background backgroundAdmin">
        <div class="row centrage">
            <div class="col d-flex flex-column align-items-center">
                <div class="row mb-5">
                    <div class="col">
                        <h2 class="adminTitle">Tableau de bord administrateur</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col adminBtn">
                <a class="adminBoard pink mx-2 my-2" href="{{ route('regions.index') }}">Administrer une région</a>
                <a class="adminBoard yellow mx-2 my-2" href="{{ route('categories.index') }}">Administrer une categorie</a>
                <a class="adminBoard green mx-2 my-2" href="{{ route('user.index') }}">Afficher la liste des utilisateurs</a>
                <a class="adminBoard blue mx-2 my-2" href="{{ route('admin.lieux') }}">Afficher la liste des lieux</a>
                <a class="adminBoard purple mx-2 my-2" href="{{ route('admin.commentaires') }}">Afficher la liste des commentaires</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection