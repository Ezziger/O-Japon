@extends('layouts.app')

@section('content')

<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Liste des commentaires</h2>
            </div>
        </div>
    </div>
    @foreach($commentaires as $commentaire)
    <div class="container commentaireWrapper" @if($commentaire->parent_id != null) style="width:95%;" @endif>
        <!--Top Part-->
        <div class="row display-comment">
            <div class="col-md-3">
                <!-- Avatar du posteur -->
            </div>
            <div class="col-md-9">
                <span>posté par : <strong>{{ $commentaire->user->prenom }} {{ $commentaire->user->nom }}</strong>, le {{ $commentaire->created_at }}</span>
            </div>
        </div>
        <!--Bot Wrapper-->
        <div class="bottomWrapper" @if($commentaire->parent_id != null) style="background: linear-gradient(135deg, rgba(250,220,230,0) 0%, rgba(250,220,230,0.5) 75%, rgba(250,220,230,1) 100%);" @endif>
            <!--Middle Part-->
            <div class="row commentContent">
                <div class="col middlePart">
                    <p id="commentaire">{{ $commentaire->commentaire }}</p>
                    <!-- Bouton de suppression du commentaire -->

                    @can('delete', $commentaire)
                    <form method="POST" action="{{ route('commentaires.destroy', $commentaire) }}">
                        @csrf
                        @method('DELETE')
                        <button class="commentDelete" type="submit"><i class="far fa-times-circle"></i></button>
                    </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    @endforeach
</main>

@endsection