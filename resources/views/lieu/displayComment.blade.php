@foreach($commentaires as $commentaire)

<!---------- Affichage du comentaire ---------->
<div class="container commentaireWrapper">
    <div class="row display-comment" @if($commentaire->parent_id != null) style="margin-left:30px;" @endif>
        <div class="col-md-3">
            <!-- Avatar du posteur -->
        </div>
        <div class="col-md-9">
            <p>posté par : <strong>{{ $commentaire->user->prenom }} {{ $commentaire->user->nom }}</strong>, le {{ $commentaire->created_at }}</p>
        </div>
    </div>
    <div class="row commentContent">
        <div class="col">
            <p id="commentaire">{{ $commentaire->commentaire }}</p>
            <button  class="commentEdit" type="button"><a id="{{ $commentaire->id }}" onclick="editing('{{ $commentaire->commentaire }}', '{{ $commentaire->id }}')"><i class="far fa-edit"></i></a> </button>
            <!-- Bouton de suppression du commentaire -->
            
            @can('delete', $commentaire)
            <form method="POST" action="{{ route('commentaires.destroy', $commentaire->id) }}">
                @csrf
                @method('DELETE')
                <button class="commentDelete" type="submit"><i class="far fa-times-circle"></i></button>
            </form>
            @endcan
        </div>
    </div>
    <div class="row">
        <div class="col d-flex">
            <!-- Affichage du formulaire pour poster une réponse -->
            
            <form method="post" action="{{ route('commentaires.store') }}" @if ($commentaire->parent_id > 1) style="display: none;" @endif>
                @csrf
                <div>
                    <input type="submit" value="Poster">
                    <!-- Affichage du champ input -->
                    <a onclick="document.getElementById('commentaire{{$commentaire->id}}').style.display= 'block'">Répondre</a>
                </div>
                <div class="form-group">
                    <input id="commentaire{{$commentaire->id}}" type="text" name="commentaire" class="form-control" style="display:none" />
                    <input type="hidden" name="lieu_id" value="{{ $lieu_id }}" />
                    <input type="hidden" name="parent_id" value="{{ $commentaire->id }}" />
                </div>
            </form>
            
            
            
        </div>
    </div>
</div>
    @include('lieu.displayComment', ['commentaires' => $commentaire->replies])
    @endforeach