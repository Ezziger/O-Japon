@extends('layouts.app')

@section('content')

<main class="login-form m-0">
    <div class="container-fluid background backgroundEditLieu" style="height: initial !important;">
        <div class="row centrage">
        <div class="col-md-6 col-xl-4 p-4 signInWrapper mb-5">
                <div class="card-body">
                    <h2>Modifier un lieu</h2>
                    <form action="{{ route('lieu.update', $lieu->id) }}" method="post" class="d-flex flex-column" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="col mb-2">
                            <label for="image" class="form-label">Image du lieu</label>
                            <input type="file" class="form-control" id="image" name="image" value="{{$lieu->image}}" required>
                        </div>
                        <div class="col mb-2">
                            <label for="alt_image" class="form-label">Courte description de votre image</label>
                            <input type="text" class="form-control" id="alt_image" name="alt_image" value="{{$lieu->alt_image}}" required>
                        </div>
                        <div class="col mb-2">
                            <label for="nom" class="form-label">Nom du lieu</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{$lieu->nom}}" required>
                        </div>
                        <div class="col mb-2">
                            <label for="description" class="form-label">Description du lieu</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{$lieu->description}}" required>
                        </div>
                        <div class="col mb-2">
                            <label for="region_id" class="form-label">Region du Japon dans laquelle se trouve le lieu</label>
                            <select class="form-control" name="region_id" id="region_id" required>
                                @foreach ($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->nom_region }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col mb-2">
                            <label for="categorie_id" class="form-label">Quelle est la cat??gorie de votre lieu</label>
                            <select class="form-control" name="categorie_id" id="categorie_id" required>
                                @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col mb-2">
                            <label for="prix" class="form-label">Prix moyen(d'entr??e d'un monument, d'un repas, etc )</label>
                            <input type="text" class="form-control" id="prix" name="prix" value="{{$lieu->prix}}" required>
                        </div>
                        <div class="col mb-2">
                            <label for="map" class="form-label">Google Map</label>
                            <input type="text" class="form-control" id="map" name="map" value="{{$lieu->map}}">
                        </div>
                        <button type="submit" class="btn btn-outline-light btn-sm mt-4">Enregistrer les modifications</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection