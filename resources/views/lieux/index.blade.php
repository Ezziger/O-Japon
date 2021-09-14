@extends('dashboard')

@section('content')

<div class="container">
    <div class="row">
        @foreach($lieux as $lieu)
        
        <div class="card col-md-3 m-4" style="width: 18rem;">
            <img src="{{ $lieu->image }}" class="card-img-top" alt="{{ $lieu->nom }}">
            <div class="card-body">
                <h5 class="card-title">{{ $lieu->nom }}</h5>
                <p class="card-text">{{ $lieu->reg }}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ $lieu->cat }}</li>
                <li class="list-group-item">{{ $lieu->prix }}</li>
                <li class="list-group-item">Posté par {{ $lieu->name }}</li>        
                <li>

                    {!! $lieu->map !!}
                </li>
            </ul>
            <div class="card-body">
            <a href="{{ route('lieux.show', $lieu->id) }}" class="btn btn-primary">View Post</a>
                <a href="{{ route('lieux.edit', $lieu->id) }}" class="card-link">Editer</a>
                <form action="{{ route('lieux.destroy', $lieu->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-primary btn-sm" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection