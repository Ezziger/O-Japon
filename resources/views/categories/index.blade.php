@extends('dashboard')

@section('content')
<div class="container">
    <div class="row">
        @foreach($categories as $categorie)
            <div class="card-body">
                <h5 class="card-title">{{ $categorie->nom }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.edit', $categorie->id) }}" method="GET">
                    <button class="btn btn-primary btn-sm" type="submit">Editer</button>
                </form>
                <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-primary btn-sm" type="submit">Supprimer</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection