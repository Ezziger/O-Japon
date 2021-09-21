@foreach($commentaires as $commentaire)

<!-- Affichage du comentaire -->
<div class="display-comment" @if($commentaire->parent_id != null) style="margin-left:30px;" @endif>
    <p>posté par : <strong>{{ $commentaire->user->prenom }} {{ $commentaire->user->nom }}</strong>, le {{ $commentaire->created_at }}</p>
    <p>{{ $commentaire->commentaire }}</p>

<!-- Affichage du formulaire pour poster une réponse -->

    <form method="post" action="{{ route('commentaires.store') }}" @if ($commentaire->parent_id > 1) style="display: none;" @endif>
        @csrf
        <div class="form-group">
            <input id="commentaire{{$commentaire->id}}" type="text" name="commentaire" class="form-control" style="display:none" />
            <input type="hidden" name="lieu_id" value="{{ $lieu_id }}" />
            <input type="hidden" name="parent_id" value="{{ $commentaire->id }}" />
        </div>
        <div>
            <button type="submit">Poster</button>
            <!-- Affichage du champ input -->
            <a onclick="document.getElementById('commentaire{{$commentaire->id}}').style.display= 'block'">Répondre</a>
        </div>
    </form>

    <!-- Affichage du bouton d'edition -->
        <div class="form-group">
            <input id="editCom{{$commentaire->id}}" type="text" name="commentaire" class="form-control" style="display:none" />
            <input type="hidden" name="lieu_id" value="{{ $lieu_id }}" />
            <input type="hidden" name="parent_id" value="{{ $commentaire->id }}" />
        </div>
        <div>
            <button type="button"><a onclick="document.getElementById('editCom{{$commentaire->id}}').style.display= 'block'"><i class="far fa-edit"></i></a>
</button>
        </div>
        <!-- Bouton de suppression du commentaire -->
    
        @can('delete', $commentaire)        
    <form method="POST" action="{{ route('commentaires.destroy', $commentaire->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit"><i class="far fa-times-circle"></i></button>
    </form>
    @endcan

    @include('lieux.displayComment', ['commentaires' => $commentaire->replies])
</div>
@endforeach