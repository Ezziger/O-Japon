@extends('dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h3>Modifier un lieu</h3>
        </div>
    </div>
    <div class="row">
        <form action="{{ route('lieux.update', $lieux->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="col mb-3">
                <label for="image" class="form-label">Image du lieu</label>
                <input type="file" class="form-control" id="image" name="image" value="{{$lieux->image}}" required>
            </div>
            <div class="col mb-3">
                <label for="alt_image" class="form-label">Courte description de votre image</label>
                <input type="text" class="form-control" id="alt_image" name="alt_image" value="{{$lieux->alt_image}}" required>
            </div>
            <div class="col mb-3">
                <label for="nom" class="form-label">Nom du lieu</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{$lieux->nom}}" required>
            </div>
            <div class="col mb-3">
                <label for="description" class="form-label">Description du lieu</label>
                <input type="text" class="form-control" id="description" name="description" value="{{$lieux->description}}" required>
            </div>
            <div class="col mb-3">
                <label for="region_id" class="form-label">Region du Japon dans laquelle se trouve le lieu</label>
                <select class="form-control" name="region_id" id="region_id" required>
                    <option value="{{ $lieux->region->id }}">{{ $lieux->region->nom }}</option>
                </select>
            </div>
            <div class="col mb-3">
                <label for="categorie_id" class="form-label">Quelle est la catégorie de votre lieu</label>
                <select class="form-control" name="categorie_id" id="categorie_id" required>
                    <option value="{{ $lieux->categorie->id }}">{{ $lieux->categorie->nom }}</option>
                </select>
            </div>
            <div class="col mb-3">
                <label for="prix" class="form-label">Prix moyen(d'entrée d'un monument, d'un repas, etc )</label>
                <input type="text" class="form-control" id="prix" name="prix" value="{{$lieux->prix}}" required>
            </div>
            <div class="col mb-3">
                <label for="map" class="form-label">Google Map</label>
                <input type="text" class="form-control" id="map" name="map" value="{{$lieux->map}}">
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </form>
    </div>
</div>

@endsection