@foreach($commentaires as $commentaire)

<!---------- Affichage du comentaire ---------->
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
                <button class="commentEdit" type="button"><a id="{{ $commentaire->id }}" onclick='editing("{{ $commentaire->id }}")'><i class="far fa-edit"></i></a> </button>
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
        <div class="row">
            <div class="col ">
                <!-- Affichage du formulaire pour poster une réponse -->

                <form method="post" action="{{ route('commentaires.store') }}" @if ($commentaire->parent_id > 1) style="display: none;" @endif>
                    @csrf
                    <div class="commentaireForm">
                        <div class="form-group">
                            <input id="commentaire{{$commentaire->id}}" type="text" name="commentaire" class="form-control" style="display:none" placeholder="Répondre a ce commentaire ..." />
                            <input type="hidden" name="lieu_id" value="{{ $lieu_id }}" />
                            <input type="hidden" name="parent_id" value="{{ $commentaire->id }}" />
                        </div>
                        <div class="commentaireBtn">
                            <!-- Affichage du champ input -->
                            <a onclick="document.getElementById('commentaire{{$commentaire->id}}').style.display= 'block'">Répondre</a>
                            <input type="submit" value="Poster">
                        </div>
                    </div>
                </form>

                <!--------------- FORMULAIRE D'EDITION D'UN COMMENTAIRE -------------->
                <form id="formEdit{{$commentaire->id}}" class="EditFormPosition" method="post" action="{{route('commentaires.update', $commentaire)}}" style="display: none;">
                    <h4 class="text-center">Modifier votre commentaire</h4>
                    @csrf
                    @method('PATCH')
                    <div class="form-group formWrapper">
                        <input type="textarea" class="form-control" name="commentaire" value=" {{ $commentaire->commentaire }}">
                        <input type="hidden" name="lieu_id" value="{{ $lieu->id }}" />
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <input type="submit" class="editCommentBtn" value="Enregister vos modifications" />
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@include('lieu.displayComment', ['commentaires' => $commentaire->replies])
@endforeach