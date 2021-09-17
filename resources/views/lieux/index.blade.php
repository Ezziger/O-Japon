@extends('dashboard')

@section('content')

@guest
<div class="container">
    <div class="row">
        @foreach($lieux as $lieu)

        <div class="card col-md-11 m-2">
            <div class="row">
                <div class="card col-md-4">
                    <img src="{{ $lieu->image }}" class="card-img-top" alt="{{ $lieu->nom }}">
                </div>
                <div class="card col-md-7">
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
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
<div class="container">
    <div class="row">
        @foreach($lieux as $lieu)

        <div class="card col-md-12 m-2">
            <div class="row">
                <div class="card col-md-4">
                    <img src="{{ $lieu->image }}" class="card-img-top" alt="{{ $lieu->nom }}">
                </div>
                <div class="card col-md-7">
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
                    <div class="card-body d-flex">
                        <a href="{{ route('lieux.show', $lieu->id) }}" class="btn btn-primary">View Post</a>
                        <div>
                            @can('update', $lieu)
                            <a href="{{route('lieux.edit', $lieu->id)}}" class="btn btn-primary">Editer</a>
                            @endcan
                            @can('delete', $lieu)
                            <form action="{{ route('lieux.destroy', $lieu->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-primary btn-sm" type="submit">Supprimer</button>
                            </form>
                            @endcan
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endguest
        @endsection