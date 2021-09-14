@extends('dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h3>Ajouter un lieu</h3>
        </div>
    </div>
    <div class="row">
        <form action="{{ route('lieux.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="col mb-3">
                <label for="image" class="form-label">Image du lieu</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <div class="col mb-3">
                <label for="nom" class="form-label">Nom du lieu</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="col mb-3">
                <label for="region_id" class="form-label">Region du Japon dans laquelle se trouve le lieu</label>
                <select class="form-control" name="region_id" id="region_id" required>
                    @foreach($regions as $region)
                    <option value="{{ $region->id }}">{{ $region->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col mb-3">
                <label for="categorie_id" class="form-label">Quelle est la catégorie de votre lieu</label>
                <select class="form-control" name="categorie_id" id="categorie_id" required>
                    @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col mb-3">
                <label for="prix" class="form-label">Prix moyen(d'entrée d'un monument, d'un repas, etc )</label>
                <input type="text" class="form-control" id="prix" name="prix" required>
            </div>
            <div class="col mb-3">
                <label for="map" class="form-label">Google Map</label>
                <input type="text" class="form-control" id="map" name="map">
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>

@endsection