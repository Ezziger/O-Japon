@extends('dashboard')

@section('content')
<h2>Nom : {{$user->nom}}</h2>
<h2>Prenom : {{$user->prenom}}</h2>
<h2>Email : {{$user->email}}</h2>
<a href="{{route('user.edit', $user)}}" class="btn btn-outline-dark btn-sm">Editer</a>

@foreach($user->commentaires as $commentaire)

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
            </div>
        </div>

    </div>
</div>

@endforeach
@endsection