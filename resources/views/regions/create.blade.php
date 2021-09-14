@extends('dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h3>Ajouter une région</h3>
        </div>
    </div>
    <div class="row">
        <form action="{{ route('regions.store') }}" method="post">
            @csrf
        <div class="col mb-3">
          <label for="nom" class="form-label">Nom de la région</label>
          <input type="text" class="form-control" id="nom" name="nom">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>

@endsection