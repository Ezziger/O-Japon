@foreach($commentaires as $commentaire)
<div class="display-comment" @if($commentaire->parent_id != null) style="margin-left:30px;" @endif>
    posté par : <strong>{{ $commentaire->user->prenom }} {{ $commentaire->user->nom }}</strong>, le {{ $commentaire->created_at }}
    <p>{{ $commentaire->commentaire }}</p>
    <form method="post" action="{{ route('commentaires.store') }}" @if ($commentaire->parent_id > 1) style="display: none;" @endif>
        @csrf
        <div class="form-group">
            <input id="commentaire{{$commentaire->id}}" type="text" name="commentaire" class="form-control" style="display:none" />
            <input type="hidden" name="lieu_id" value="{{ $lieu_id }}" />
            <input type="hidden" name="parent_id" value="{{ $commentaire->id }}" />
        </div>
        <div><a onclick="document.getElementById('commentaire{{$commentaire->id}}').style.display= 'block'">Répondre</a>
            <button type="submit">Poster</button></div>
    </form>
    @include('lieux.displayComment', ['commentaires' => $commentaire->replies])
</div>
@endforeach