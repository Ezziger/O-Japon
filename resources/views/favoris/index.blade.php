@extends('layouts.app')

@section('content')

<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Vos favoris</h2>
            </div>
        </div>
        @foreach($user->favoris as $lieu)
    <div class="row postcard light">
        <div class="col-md-6 col-lg-3 p-0">
            <img class="postcard_img" src="{{ $lieu->image }}" alt="{{ $lieu->nom }}">
        </div>
        <div class="col-md-6 col-lg-9 p-0">
            <div class="postcard_details">
                <div>
                    <div class="d-flex justify-content-between align-center">
                        <h1 class="">{{ $lieu->nom }}</h1>
                        @if (Auth::user())
                        @if (Auth::user()->isInFavorites($lieu))
                        <form class="favorites" action="{{ route('favoris.destroy', $lieu) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" data-toggle="tooltip" data-placement="bottom" title="Retirer de vos favoris">
                                <i class="fas fa-heart"></i>
                            </button>
                            <input type="hidden" name="lieuId" value="{{ $lieu->id }}">
                        </form>
                        @else
                        <form class="favorites" action="{{ route('favoris.store') }}" method="POST">
                            @csrf
                            <button type="submit" data-toggle="tooltip" data-placement="bottom" title="Ajouter à vos favoris">
                                <i class="far fa-heart"></i>
                            </button>
                            <input type="hidden" name="lieuId" value="{{ $lieu->id }}">
                        </form>
                        @endif
                        @endif
                    </div>
                    <div class="postcard_creation small">
                        <i class="fas fa-calendar-alt"></i>
                        <span> Posté par <a href="{{ route('user.show', $lieu->user_id) }}">{{ $lieu->user->prenom }}</a>, le <time>{{ $lieu->created_at->format('Y-m-d') }}</time></span>
                    </div>
                    <div class="postcard_bar"></div>
                </div>
                <div>
                    <p>{{$lieu->description}}</p>
                </div>
                <div class="informationsWrapper">
                    <ul class="informations">
                        <li><i class="fas fa-map"></i>{{ $lieu->region->nom_region }}</li>
                        @if ($lieu->categorie->type == 'Monuments')
                        <li><i class="fas fa-monument"></i>{{ $lieu->categorie->type }}</li>
                        @elseif ($lieu->categorie->type == 'Restaurants')
                        <li><i class="fas fa-utensils"></i>{{ $lieu->categorie->type }}</li>
                        @elseif ($lieu->categorie->type == 'Divertissements')
                        <li><i class="fas fa-theater-masks"></i>{{ $lieu->categorie->type }}</li>
                        @endif
                        <li>Prix : {{ $lieu->prix }} <i class="fas fa-yen-sign"></i></li>
                        <li><i class="fas fa-comment"></i>{{ $lieu->commentaires_reponses_count }}</li>
                    </ul>
                    @auth
                    <ul class="button_location">
                        <li>
                            <a href="{{ route('lieu.show', $lieu) }}" class="btn btn-outline-dark btn-sm">Détails du lieu</a>
                        </li>
                        <li>
                            @can('update', $lieu)
                            <a href="{{route('lieu.edit', $lieu)}}" class="btn btn-outline-dark btn-sm">Editer</a>
                            @endcan
                        </li>
                        <li>@can('delete', $lieu)
                            <form action="{{ route('lieu.destroy', $lieu) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-dark btn-sm" type="submit">Supprimer</button>
                            </form>
                            @endcan
                        </li>
                    </ul>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </div>
</main>

@endsection