@extends('dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h3>Modifier une catégorie</h3>
        </div>
    </div>
    <div class="row">
        <form action="{{ route('categories.update', $categorie->id) }}" method="post">
            @csrf
            @method('PATCH')
        <div class="col mb-3">
          <label for="type" class="form-label">Nom de la catégorie</label>
          <input type="text" class="form-control" id="type" name="type" value="{{ $categorie->type }}">
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</div>

@endsection