<script>
    function displayField() { 
    document.getElementsByClassName('toto').style.display='block';
}
</script>

@foreach($commentaires as $commentaire)
    <div class="display-comment" @if($commentaire->parent_id != null) style="margin-left:30px;" @endif>
        posté par : <strong>{{ $commentaire->user->prenom }} {{ $commentaire->user->nom }}</strong>, le {{ $commentaire->created_at }}
        <p>{{ $commentaire->commentaire }}</p>
        <form method="post" action="{{ route('commentaires.store') }}" @if ($commentaire->parent_id > 1) style="display: none;" @endif>
            @csrf
            <div class="form-group">
            <button onclick="displayField()">Test</button>                
            <input type="text" name="commentaire" class="form-control toto" style="display:none;" />
                <input type="hidden" name="lieu_id" value="{{ $lieu_id }}" />
                <input type="hidden" name="parent_id" value="{{ $commentaire->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('lieux.displayComment', ['commentaires' => $commentaire->replies])
    </div>
@endforeach