@extends('dashboard')

@section('content')

<main>
    <div class="container createForm">
        <div class="row">
            <div class="col">
                <h2>Ajouter une région</h2>
            </div>
        </div>
        <div class="row">
            <form class="d-flex flex-column" action="{{ route('regions.store') }}" method="post">
                @csrf
            <div class="col mb-3">
              <label for="nom_region" class="form-label">Nom de la région</label>
              <input type="text" class="form-control" id="nom_region" name="nom_region">
            </div>
            <button type="submit" class="btn btn-outline-dark btn-sm">Enregistrer</button>
            </form>
        </div>
    </div>
</main>

@endsection