@extends('dashboard')

@section('title')
{{$lieu->nom}}
@endsection

@section('metadescription')
{{$lieu->meta_description}}
@endsection


@section('content')

<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 d-flex justify-content-center">
                <div class="row">
                    <div class="card">
                    <div class="col-lg-3">
                        <div class="face front ">
                            <img src="{{ $lieu->image }}" alt="Photo du {{$lieu->nom}}">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="face back">
                            <div class="contenu">
                                <h2>{{$lieu->nom}}</h2>
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
                                </ul>
                                <p>{{$lieu->description}}</p>
                                <p>{!! $lieu->map !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-6 d-flex flex-column align-items-end commentaireSection">
                <h4 class="d-flex justify-content-center w-100">Affichage des commentaires</h4>
                @include('lieu.displayComment', ['commentaires' => $lieu->commentaires, 'lieu_id' => $lieu->id])
            </div>
        </div>
    </div>
        <div class="row">
            <div id="comment" class="col ajoutForm">
                <!--------------- FORMULAIRE D'AJOUT D'UN COMMENTAIRE -------------->
                <form id="formAdd" method="post" action="{{ route('commentaires.store') }}">
                    <h4>Ajouter votre commentaire</h4>
                    @csrf
                    <div class="form-group formWrapper">
                        <textarea class="form-control" name="commentaire"></textarea>
                        <input type="hidden" name="lieu_id" value="{{ $lieu->id }}" />
                    </div>
                    <div class="form-group d-flex justify-content-end mt-2">
                        <input type="submit" class="btn btn-outline-dark btn-sm" value="Add Comment" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection