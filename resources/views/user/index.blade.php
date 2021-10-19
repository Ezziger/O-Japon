@extends('dashboard')

@section('content')

<main>
    <ul class="list-group">
        @foreach($users as $user)
            <li class="list-group-item">{{ $user->prenom }}</li>
            <form action="{{ route('user.destroy', $user) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-dark btn-sm" type="submit">Supprimer l'utilisateur</button>
            </form>
        @endforeach
    </ul>
</main>

@endsection