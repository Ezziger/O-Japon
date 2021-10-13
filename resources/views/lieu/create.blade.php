@extends('dashboard')

@section('content')

<main>
    <div class="container createForm">
        <div class="row">
            <div class="col">
                <h2>Ajouter un lieu</h2>
            </div>
        </div>
        <div class="row">
            <form action="{{ route('lieu.store') }}" method="post" class="d-flex flex-column" enctype="multipart/form-data">
                @csrf
    
                <div class="col mb-3">
                    <label for="image" class="form-label">Image du lieu</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>
                <div class="col mb-3">
                    <label for="alt_image" class="form-label">Courte description de votre image</label>
                    <input type="text" class="form-control" id="alt_image" name="alt_image" required>
                </div>
                <div class="col mb-3">
                    <label for="nom" class="form-label">Nom du lieu</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <div class="col mb-3">
                    <label for="description" class="form-label">Description du lieu</label>
                    <input type="text" class="form-control" id="description" name="description" required>
                </div>
    
                <div class="col mb-3">
                    <label for="region_id" class="form-label">Region du Japon dans laquelle se trouve le lieu</label>
                    <select class="form-control" name="region_id" id="region_id" required>
                        @foreach($regions as $region)
                        <option value="{{ $region->id }}">{{ $region->nom_region }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col mb-3">
                    <label for="categorie_id" class="form-label">Quelle est la catégorie de votre lieu</label>
                    <select class="form-control" name="categorie_id" id="categorie_id" required>
                        @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->type }}</option>
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
                <button type="submit" class="btn btn-outline-dark btn-sm">Enregistrer</button>
            </form>
        </div>
    </div>
</main>

@endsection