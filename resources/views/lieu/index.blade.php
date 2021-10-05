@extends('dashboard')
@section('title', 'Les lieux à visiter au Japon')
@section('content')

<div class="banniere"></div>
<div class="conteneur">
    <div>
        <p class="presentation">Bienvenue sur O Japon. Le but de ce site avant tout communautaire est de référencer les endroits interessants, insolites et méconnus situés sur l'archipel
            japonais par le biais des utilisateurs du site dans des domaines divers et variés comme les monuments, les bars et restaurants, les activités de divertissements,
            etc...<br /><br />
            De ce fait, une fois votre inscription terminée, vous aurez la possibilité de partager un ou plusieurs lieux et ainsi donner la possibilité à d'autres
            personnes de découvrir les joyaux du Japon !<br />
            Dans chaque page détail d'un lieu, vous aurez la possibilité de commenter le lieu en question mais aussi d'interagir avec l'auteur ou d'autres utilisateurs afin
            d'obtenir des renseignements<br /><br />
            Je vous souhaite une bonne visite de mon site et un bon futur voyage au Japon !</p>
    </div>
    <div>
        <h2>Les dernières destinations postées</h2>
    </div>
    @guest
    @foreach($lieux as $lieu)
    <article class="postcard light">
        <img class="postcard_img" src="{{ $lieu->image }}" alt="{{ $lieu->nom }}">
        <div class="postcard_details">
            <div>
                <h1 class="">{{ $lieu->nom }}</h1>
                <div class="postcard_creation small">
                    <i class="fas fa-calendar-alt"></i>
                    <span> Posté par {{ $lieu->nom }}, le <time>{{ $lieu->created_at->format('Y-m-d') }}</time></span>
                </div>
                <div class="postcard_bar"></div>
            </div>
            <div>
                <p>{{$lieu->description}}</p>
            </div>
            <ul class="informations">
                <li><i class="fas fa-map"></i>{{ $lieu->region->nom_region }}</li>
                @if ($lieu->categorie->type == 'Monuments')
                <li><i class="fas fa-monument"></i>{{ $lieu->categorie->type }}</li>
                @elseif ($lieu->categorie->type == 'Restaurants')
                <li><i class="fas fa-utensils"></i>{{ $lieu->categorie->type }}</li>
                @elseif ($lieu->categorie->type == 'Divertissements')
                <li><i class="fas fa-theater-masks"></i>{{ $lieu->categorie->type }}</li>
                @endif
                <li>Prix : {{ $lieu->prix }}<i class="fas fa-yen-sign"></i></li>
                <li><i class="fas fa-comment"></i>{{ $lieu->commentaires_reponses_count }}</li>
            </ul>
        </div>
    </article>
    @endforeach
    @else
    @foreach($lieux as $lieu)
    <article class="postcard light">
        <img class="postcard_img" src="{{ $lieu->image }}" alt="{{ $lieu->nom }}">
        <div class="postcard_details">
            <div>
                <h1>{{ $lieu->nom }}</h1>
                <div class="postcard_creation small">
                    <i class="fas fa-calendar-alt"></i>
                    <span> Posté par <a href="{{ route('user.show', $lieu->user->id) }}">{{ $lieu->user->prenom }}</a>, le <time>{{ $lieu->created_at->format('Y-m-d') }}</time></span>
                </div>
                <div class="postcard_bar"></div>
            </div>
            <div class="postcard_body">
                <p>{{$lieu->description}}</p>
            </div>
            <div class="postcard_bot_body">
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
            </div>
        </div>
    </article>
    @endforeach
    @endguest
    <div class="bottomNav">
        {{ $lieux->links() }}
    </div>
</div>
@endsection