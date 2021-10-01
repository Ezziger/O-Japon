@extends('dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h3>Ajouter une catégorie</h3>
        </div>
    </div>
    <div class="row">
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
        <div class="col mb-3">
          <label for="type" class="form-label">Nom de la catégorie</label>
          <input type="text" class="form-control" id="type" name="type">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>

@endsection
