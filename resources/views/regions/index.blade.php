@extends('layouts.app')

@section('content')

<main>
    <h2>Liste des regions</h2>
    <div class="container d-flex flex-column align-items-center">
        <div class="row d-flex justify-content-center">
            @foreach($regions as $region)
            <div class="col-md-4 col-lg-3 card cardHeigth" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $region->nom_region }}</h5>
                    <div class="d-flex justify-content-center">
                        <form action="{{ route('regions.edit', $region) }}" method="GET">
                            <button class="btn btn-outline-dark btn-sm m-1" type="submit">Editer</button>
                        </form>
                        <form action="{{ route('regions.destroy', $region) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-dark btn-sm m-1" type="submit">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>    
        <div class="row">
            <div class="col">
                <form action="{{ route('regions.create') }}" method="GET">
                    <button class="btn btn-outline-dark btn-sm m-3 px-5" type="submit">Ajouter une catégorie</button>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection