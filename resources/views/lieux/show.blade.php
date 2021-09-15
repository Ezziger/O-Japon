@extends('dashboard')

   
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center text-success">{{$lieu->nom}}</h3>
                    <img src="{{ $lieu->image }}" class="card-img-top" alt="{{ $lieu->nom }}">
                    <hr />
                    <h4>Display Comments</h4>

                    @include('lieux.displayComment', ['commentaires' => $lieu->commentaires, 'lieu_id' => $lieu->id])

                    <hr />

                    <h4>Add comment</h4>
                    <form method="post" action="{{ route('commentaires.store') }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="commentaire"></textarea>
                            <input type="hidden" name="lieu_id" value="{{ $lieu->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Add Comment" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection