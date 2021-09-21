@extends('dashboard')
@section('title', 'Les lieux à visiter au Japon')
@section('content')

<div class="conteneur">
    @guest
    @foreach($lieux as $lieu)
    <article class="postcard light">
        <img class="postcard_img" src="{{ $lieu->image }}" alt="{{ $lieu->nom }}">
        <div class="postcard_details">
            <div>
            <h1 class="">{{ $lieu->nom }}</h1>
            <div class="postcard_creation small">
                <i class="fas fa-calendar-alt"></i>
                <span> Posté par {{ $lieu->name }}, le <time>{{ $lieu->created_at->format('Y-m-d') }}</time></span>
            </div>
            <div class="postcard_bar"></div>
            </div>
            <div>
                <p>{{$lieu->description}}</p>
            </div>
            <ul class="informations">
                <li><i class="fas fa-map"></i>{{ $lieu->reg }}</li>
                <li><i class="fas fa-monument"></i>{{ $lieu->cat }}</li>
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
                <span> Posté par {{ $lieu->name }}, le <time>{{ $lieu->created_at->format('Y-m-d') }}</time></span>
            </div>
            <div class="postcard_bar"></div>
            </div>
            <div class="postcard_body">
                <p>{{$lieu->description}}</p>
            </div>
            <div class="postcard_bot_body">
                <ul class="informations">
                    <li><i class="fas fa-map"></i>{{ $lieu->reg }}</li>
                    @if ($lieu->cat == 'Monuments')
                    <li><i class="fas fa-monument"></i>{{ $lieu->cat }}</li>
                    @elseif ($lieu->cat == 'Restaurants')
                    <li><i class="fas fa-utensils"></i>{{ $lieu->cat }}</li>
                    @elseif ($lieu->cat == 'Divertissements')
                    <li><i class="fas fa-theater-masks"></i>{{ $lieu->cat }}</li>
                    @endif
                    <li>Prix : {{ $lieu->prix }} <i class="fas fa-yen-sign"></i></li>
                    <li><i class="fas fa-comment"></i>{{ $lieu->commentaires_reponses_count }}</li>
                </ul>
                <ul class="button_location">
                    <li>
                        <a href="{{ route('lieux.show', $lieu->id) }}" class="btn btn-outline-dark btn-sm">View Post</a>
                    </li>
                    <li>
                        @can('update', $lieu)
                        <a href="{{route('lieux.edit', $lieu->id)}}" class="btn btn-outline-dark btn-sm">Editer</a>
                        @endcan
                    </li>
                    <li>@can('delete', $lieu)
                        <form action="{{ route('lieux.destroy', $lieu->id) }}" method="POST">
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
</div>
@endsection