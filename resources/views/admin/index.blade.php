@extends('dashboard')

@section('content')

<main class="mb-2">
    <div class="row">
        <h2 class="my-4">Tableau de bord administrateur</h2>
    </div>
    <div class="container-fluid backgroundAdmin">
        <div class=" row adminBoardMiddle">
            <a class="adminBoard pink mx-2 my-2" href="{{ route('regions.index') }}">Administrer une région</a>
            <a class="adminBoard yellow mx-2 my-2" href="{{ route('categories.index') }}">Administrer une categorie</a>
            <a class="adminBoard green mx-2 my-2" href="{{ route('user.index') }}">Afficher la liste des utilisateurs</a>
            <a class="adminBoard blue mx-2 my-2" href="{{ route('admin.lieux') }}">Afficher la liste des lieux</a>
            <a class="adminBoard purple mx-2 my-2" href="{{ route('admin.commentaires') }}">Afficher la liste des commentaires</a>
        </div>
    </div>
</main>

@endsection