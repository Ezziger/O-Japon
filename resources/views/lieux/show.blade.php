@extends('dashboard')

@section('title')
{{$lieu->nom}}
@endsection

@section('metadescription')
{{$lieu->meta_description}}
@endsection


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center text-success">{{$lieu->nom}}</h3>
                    <img src="{{ $lieu->image }}" class="card-img-top" alt="{{ $lieu->nom }}">
                    <p>{{ $lieu->categorie->nom}}</p>
                    <p>{{ $lieu->region->nom }}</p>
                    <p>{!! $lieu->map !!}</p>

                    <hr />
                    <h4>Display Comments</h4>

                    @include('lieux.displayComment', ['commentaires' => $lieu->commentaires, 'lieu_id' => $lieu->id])

                    <hr />

                    <h4>Add comment</h4>
                        <form id="formAdd" method="post" action="{{ route('commentaires.store') }}">
                        @csrf
                        <div id="comment">
                            <div class="form-group">
                                <textarea class="form-control" name="commentaire"></textarea>
                                <input type="hidden" name="lieu_id" value="{{ $lieu->id }}" />
                            </div>
                            <div class="form-group">
                                <input  type="submit" class="btn btn-success" value="Add Comment" />
                            </div>
                        </form>

                    <p>**********************************</p>
      
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
    </div>
</div>
@endsection