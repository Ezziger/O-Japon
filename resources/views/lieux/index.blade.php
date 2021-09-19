@extends('dashboard')

@section('content')

<div class="container">
@guest
@foreach($lieux as $lieu)
<article class="postcard light">
    <img class="postcard_img" src="{{ $lieu->image }}" alt="{{ $lieu->nom }}">
    <div class="postcard_details">
        <h1 class="">{{ $lieu->nom }}</h1>
        <div class="postcard_creation small">
        <i class="fas fa-calendar-alt"></i>
        <span> Posté par {{ $lieu->name }}, le <time>{{ $lieu->created_at->format('Y-m-d') }}</time></span>
        </div>
        <div class="postcard_bar"></div>
        <div>            
            <p><!--Description ??? --></p>
        </div>
        <ul class="informations">
            <li><i class="fas fa-map"></i>{{ $lieu->reg }}</li>
            <li><i class="fas fa-monument"></i>{{ $lieu->cat }}</li> <!--<i class="fas fa-utensils"></i> categorie Restaurant // <i class="fas fa-basketball-ball"></i> categorie Loisir -->
            <li><i class="fas fa-yen-sign"></i>{{ $lieu->prix }}</li>
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
        <h1>{{ $lieu->nom }}</h1>
        <div class="postcard_creation small">
        <i class="fas fa-calendar-alt"></i>
        <span> Posté par {{ $lieu->name }}, le <time>{{ $lieu->created_at->format('Y-m-d') }}</time></span>
        </div>
        <div class="postcard_bar"></div>
        <div class="postcard_body">            
            <p><!--Description ??? --></p>
        </div>
        <div class="postcard_bot_body">
        <ul class="informations">
            <li><i class="fas fa-map"></i>{{ $lieu->reg }}</li>
            <li><i class="fas fa-monument"></i>{{ $lieu->cat }}</li> <!--<i class="fas fa-utensils"></i> categorie Restaurant // <i class="fas fa-basketball-ball"></i> categorie Loisir -->
            <li><i class="fas fa-yen-sign"></i>{{ $lieu->prix }}</li>
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
<!-- {!! $lieu->map !!} -->
@endsection