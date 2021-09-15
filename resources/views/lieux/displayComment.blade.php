@foreach($commentaires as $commentaire)
    <div class="display-comment" @if($commentaire->parent_id != null) style="margin-left:40px;" @endif>
        <strong>{{ $commentaire->user->name }}</strong>
        <p>{{ $commentaire->commentaire }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('commentaires.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="commentaire" class="form-control" />
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