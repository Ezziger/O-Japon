@extends('layouts.app')

@section('content')

<main>
    <div class="container createForm">
        <div class="row">
            <div class="col">
                <h2>Ajouter une catégorie</h2>
            </div>
        </div>
        <div class="row">
            <form class="d-flex flex-column" action="{{ route('categories.store') }}" method="post">
                @csrf
            <div class="col mb-3">
              <label for="type" class="form-label">Nom de la catégorie</label>
              <input type="text" class="form-control" id="type" name="type">
            </div>
            <button type="submit" class="btn btn-outline-dark btn-sm">Enregistrer</button>
            </form>
        </div>
    </div>
</main>

@endsection
