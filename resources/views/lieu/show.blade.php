@extends('dashboard')

@section('title')
{{$lieu->nom}}
@endsection

@section('metadescription')
{{$lieu->meta_description}}
@endsection


@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-7 d-flex justify-content-center">
            <div class="card">
                <div class="face front ">
                    <img src="{{ $lieu->image }}" alt="Photo du {{$lieu->nom}}">
                    <h2>{{$lieu->nom}}</h2>
                </div>
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
        <div class="col-md-5 d-flex flex-column align-items-center">
            <h4>Display Comments</h4>
            @include('lieu.displayComment', ['commentaires' => $lieu->commentaires, 'lieu_id' => $lieu->id])
        </div>
    </div>
    <div class="row">
        <div class="col">
            <!--------------- FORMULAIRE D'AJOUT D'UN COMMENTAIRE -------------->
            <h4>Add comment</h4>
            <form id="formAdd" method="post" action="{{ route('commentaires.store') }}">
                @csrf
                <div id="comment">
                    <div class="form-group">
                        <textarea class="form-control" name="commentaire"></textarea>
                        <input type="hidden" name="lieu_id" value="{{ $lieu->id }}" />
                    </div>
                    <div class="form-group d-flex justify-content-end mt-2">
                        <input type="submit" class="btn btn-dark" value="Add Comment" />
                    </div>
            </form>

            <!--------------- FORMULAIRE D'EDITION D'UN COMMENTAIRE -------------->
            <form id="formEdit" style="display: none;" method="post" action="">
                <div class="form-group">
                    @csrf
                    <input type="textarea" class="form-control" name="commentaire" value="${commentaire}">
                    <input type="hidden" name="commentaire_id" value="${id}" />
                </div>
                <div class="form-group">
                    <input id="" type="submit" class="btn btn-success" value="Mettre à jour" />
                </div>
            </form>
        </div>
    </div>
</div>

@endsection