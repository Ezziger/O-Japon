@extends('dashboard')

@section('content')

<main>
@foreach($lieux as $lieu)
    <div class="row postcard light">
        <div class="col-md-6 col-lg-2 p-0">
            <img class="postcard_img" src="{{ $lieu->image }}" alt="{{ $lieu->nom }}">
        </div>
        <div class="col-md-6 col-lg-10 p-0">
            <div class="postcard_details">
                <div>
                    <h1 class="">{{ $lieu->nom }}</h1>
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
                    <ul class="button_location">
                        <li>
                            <a href="{{ route('lieu.show', $lieu) }}" class="btn btn-outline-dark btn-sm">Détails du lieu</a>
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
                    @if (Auth::user()->isInFavorites($lieu))
                        <form action="{{ route('favoris.destroy', $lieu) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="fas fa-heart"></i></button>
                            <input type="hidden" name="lieuId" value="{{ $lieu->id }}">
                        </form>
                    @else
                        <form action="{{ route('favoris.store') }}" method="POST">
                            @csrf
                            <button type="submit"><i class="far fa-heart"></i></button>
                            <input type="hidden" name="lieuId" value="{{ $lieu->id }}">
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</main>

@endsection