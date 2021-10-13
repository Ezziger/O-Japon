@extends('dashboard')

@section('content')

<main>
    <div class="container editForm">
        <div class="row">
            <div class="col">
                <h2>Modifier une région</h2>
            </div>
        </div>
        <div class="row">
            <form class="d-flex flex-column" action="{{ route('regions.update', $region->id) }}" method="post">
                @csrf
                @method('PATCH')
            <div class="col mb-3">
              <label for="nom_region" class="form-label">Nom de la région</label>
              <input type="text" class="form-control" id="nom_region" name="nom_region" value="{{ $region->nom_region }}">
            </div>
            <button type="submit" class="btn btn-outline-dark btn-sm">Modifier</button>
            </form>
        </div>
    </div>
</main>

@endsection